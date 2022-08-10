<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\vendor;
use App\Models\vendor_project;
use App\Models\User;
use App\Models\shipping_address;
use App\Models\orders;
use App\Models\order_items;
use App\Models\order_attributes;
use App\Models\product_attributes;
use App\Models\product_images;
use App\Models\attributes;
use App\Models\attribute_fields;
use App\Models\product_group;
use App\Models\coupon;
use Hash;
use DB;
use Mail;
use Auth;
use Cart;
use MyFatoorah\Library\PaymentMyfatoorahApiV2;

class MyFatoorahController extends Controller {

    public $mfObj;

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * create MyFatoorah object
     */
    public function __construct() {
        $this->mfObj = new PaymentMyfatoorahApiV2(config('myfatoorah.api_key'), config('myfatoorah.country_iso'), config('myfatoorah.test_mode'));
    }

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Create MyFatoorah invoice
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        try {
            $paymentMethodId = 0; // 0 for MyFatoorah invoice or 1 for Knet in test mode

            $curlData = $this->getPayLoadData();
            $data     = $this->mfObj->getInvoiceURL($curlData, $paymentMethodId);

            $response = ['IsSuccess' => 'true', 'Message' => 'Invoice created successfully.', 'Data' => $data];
        } catch (\Exception $e) {
            $response = ['IsSuccess' => 'false', 'Message' => $e->getMessage()];
        }
        return response()->json($response);
    }

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * 
     * @param int|string $orderId
     * @return array
     */
    private function getPayLoadData($orderId = null) {
        $callbackURL = route('myfatoorah.callback');

        return [
            'CustomerName'       => 'FName LName',
            'InvoiceValue'       => '10',
            'DisplayCurrencyIso' => 'KWD',
            'CustomerEmail'      => 'test@test.com',
            'CallBackUrl'        => $callbackURL,
            'ErrorUrl'           => $callbackURL,
            'MobileCountryCode'  => '+965',
            'CustomerMobile'     => '12345678',
            'Language'           => 'en',
            'CustomerReference'  => $orderId,
            'SourceInfo'         => 'Laravel ' . app()::VERSION . ' - MyFatoorah Package ' . MYFATOORAH_LARAVEL_PACKAGE_VERSION
        ];
    }

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Get MyFatoorah payment information
     * 
     * @return \Illuminate\Http\Response
     */
    public function callback() {
        try {
            $paymentId = request('paymentId');
            $data      = $this->mfObj->getPaymentStatus($paymentId, 'PaymentId');

            if ($data->InvoiceStatus == 'Paid') {
                $orders = orders::find($data->CustomerReference);
                $orders->payment_id = $paymentId;
                $orders->invoicestatus = $data->InvoiceStatus;
                $orders->invoicereference = $data->InvoiceReference;
                $orders->payment_status = 1;
                $orders->save();

                $this->htmloutput('Transcation Success',$paymentId,$orders->total);

                $msg = 'Invoice is paid.';
            } else if ($data->InvoiceStatus == 'Failed') {
                $orders = orders::find($data->CustomerReference);
                $orders->payment_id = $paymentId;
                $orders->invoicestatus = $data->InvoiceStatus;
                $orders->invoicereference = $data->InvoiceReference;
                $orders->payment_status = 0;
                $orders->save();

                $order_items = order_items::where('order_id',$data->CustomerReference)->where('status',0)->get();
                foreach($order_items as $row){
                    $qty = $row->qty;
                    $pro_id = $row->product_id;
                    
                    $product = product::find($pro_id);
                    $product->stock = $product->stock + $qty;
                    $product->save();
                }

                $this->htmloutput('Payment Failed',$paymentId,$orders->total);

                $msg = 'Invoice is not paid due to ' . $data->InvoiceError;
            } else if ($data->InvoiceStatus == 'Expired') {
                $orders = orders::find($data->CustomerReference);
                $orders->payment_id = $paymentId;
                $orders->invoicestatus = $data->InvoiceStatus;
                $orders->invoicereference = $data->InvoiceReference;
                $orders->payment_status = 0;
                $orders->save();

                $order_items = order_items::where('order_id',$data->CustomerReference)->where('status',0)->get();
                foreach($order_items as $row){
                    $qty = $row->qty;
                    $pro_id = $row->product_id;
                    
                    $product = product::find($pro_id);
                    $product->stock = $product->stock + $qty;
                    $product->save();
                }

                $this->htmloutput('Payment Failed',$paymentId,$orders->total);

                $msg = 'Invoice is expired.';
            }

            //$response = ['IsSuccess' => 'true', 'Message' => $msg, 'Data' => $data];
        } catch (\Exception $e) {
            $response = ['IsSuccess' => 'false', 'Message' => $e->getMessage()];
        }
        // return response()->json($response);
    }


    // public function callback() {
    //     try {
    //         $paymentId = request('paymentId');
    //         $data      = $this->mfObj->getPaymentStatus($paymentId, 'PaymentId');

    //         if ($data->InvoiceStatus == 'Paid') {
    //             $msg = 'Invoice is paid.';
    //         } else if ($data->InvoiceStatus == 'Failed') {
    //             $msg = 'Invoice is not paid due to ' . $data->InvoiceError;
    //         } else if ($data->InvoiceStatus == 'Expired') {
    //             $msg = 'Invoice is expired.';
    //         }

    //         $response = ['IsSuccess' => 'true', 'Message' => $msg, 'Data' => $data];
    //     } catch (\Exception $e) {
    //         $response = ['IsSuccess' => 'false', 'Message' => $e->getMessage()];
    //     }
    //     return response()->json($response);
    // }

    public function htmloutput($message,$paymentid,$total) {
        $html_output='
        <html>
        <head>
            <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
        </head>
            <style>
            body {
                text-align: center;
                padding: 40px 0;
                background: #EBF0F5;
            }
            h1 {
                color: #88B04B;
                font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
                font-weight: 900;
                font-size: 40px;
                margin-bottom: 10px;
            }
            p {
                color: #404F5E;
                font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
                font-size:20px;
                margin: 0;
                }
            i {
                color: #9ABC66;
                font-size: 100px;
                line-height: 200px;
                margin-left:-15px;
            }
            .card {
                background: white;
                padding: 60px;
                border-radius: 4px;
                box-shadow: 0 2px 3px #C8D0D8;
                display: inline-block;
                margin: 0 auto;
            }
            </style>
            <body>
            <div class="card">';
            if($message == 'Transcation Success'){
                $html_output.='<div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                    <i class="checkmark">✓</i>
                </div>';
            }
            else{
                $html_output.='<div style="border-radius:200px; height:200px; width:200px; background:red; margin:0 auto;">
                    <i class="checkmark">X</i>
                </div>';
            }

            $html_output.='<h1>'.$message.'</h1> 
                <p>Transaction ID : '.$paymentid.';<br/>Amount Paid : KWD '.$total.'</p>
                <p><a href="/customer/orders">Click to Return Dashboard</a></p>
            </div>
            </body>
        </html>';
        echo $html_output;
    }

//-----------------------------------------------------------------------------------------------------------------------------------------
}
