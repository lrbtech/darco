<style type="text/css" media="all">
#lineItem tr:nth-child(even) {
  background-color: #fafaf8;
}
#lineItem td{
  vertical-align: middle;
}
</style>
<?php
$url = asset('');
?>
<html style="border: 0; margin: 0; padding: 0;">
<head>
  <title>Invoice</title>
</head>
<body style="border: 0; margin: 0; padding: 0;">
<table border="0" cellspacing="0" cellpadding="0" width="100%" style="padding:0; margin: 0 auto;font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px;border-top: 8px solid #2D87BA; background: white;">
  <tbody>
    <tr>
      <td valign="top">
        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="">
          <tbody>
            <tr>
              <td valign="top">
                <div style="height:180px; overflow: hidden;">
                  <div style="padding-top:40px; padding-left: 40px; float: left; width: 30%">
                    <!-- <h2 style="font-weight:bold; font-size: 32px; color: #2d87ba; max-width: 85%; line-height: 1.1; margin: 10px 0 0; padding: 0; float: left">
                    Invoice
                    </h2> -->
                    <img style="width:100px;" src="{{ public_path('website_assets/images/logo-light.png') }}">
                  </div>
                  <div style="color:black; text-align: right; padding-top:40px; padding-right: 40px; float: right;">
                    <span style="color:black;font-weight:bold;">
                      <b>{{$vendor->business_name}}</b><br>
                    </span>
                    <span style="color:black;font-weight:bold;">
                      <b>{{$vendor->email}}</b><br>
                    </span>
                    <span style="color:black;font-weight:bold;">
                      <b>{{$vendor->mobile}}</b><br>
                    </span>
                    <span id="tmp_org_address">
                    {{$vendor->address}}
                    </span>
                  </div>
                </div>
                
                <table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin-bottom: 20px">
                  <tbody>
                    <tr>
                      <td valign="top" width="60%" style="color:#000; padding: 20px 10px 20px 40px; background: #EDEDED; border-right: 2px solid white;">
                        <h3 style="font-size: 13px;"><label id="tmp_billing_address_label">BILL TO</label>:</h3>
                        <p style="font-size: 14px">
                          <b>{{$billing_address->contact_person}}</b><br>
                          <span style="width:100px;" id="tmp_billing_address" style="white-space: pre-wrap;">{{$billing_address->address_line1}} , {{$billing_address->address_line2}}
                          </span>
                          <br><span id="tmp_billing_address" style="white-space: pre-wrap;">{{$billing_address->contact_mobile}}<br>{{$customer->email}}
                          </span>
                        </p>
                        <!--h3 style="font-size: 14px">SHIP TO:</h3>
                        <p style="font-size: 14px"><b>${Invoices.Shipping Street}</b><br>${Invoices.Shipping City}<br>${Invoices.Shipping State}<br>${Invoices.Shipping Country}<br>${Invoices.Shipping Code}</p-->
                      </td>
                      <td width="10%" valign="top" style="color:#fff; padding: 20px 40px 20px 0; background: #2d87ba;text-align: right;">
                        <!-- <p style="font-size: 14px">Due date:</p>
                        <h3 style="font-size: 18px"><span id="tmp_due_date">DueDate</span></h3> -->
                        
                      </td>
                      <td width="30%" valign="top" style="color:#000; padding: 20px 10px; background: #dde9ef; border-right: 2px solid white;">
                        <p style="font-size: 14px">Order Date:</p>
                        <h3 style="font-size: 14px">{{date('d-m-Y',strtotime($orders->date))}}</h3>
                        <p style="font-size: 14px">Order ID:</p>
                        <h3 style="font-size: 13px;word-wrap:break-word;max-width: 170px"><span id="tmp_entity_number"><b> #{{$orders->id}}</b></span></h3>
                      </td>
                      
                    </tr>
                  </tbody>
                </table>
                <table border="0" cellspacing="0" cellpadding="0" width="100%" style="font-family: Verdana, Arial, Helvetica, sans-serif;color:#000; font-size: 12px;">
                  <thead style="text-transform: uppercase;color:#fff; padding: 10px 10px 10px 10px; background: #2d87ba; border-right: 2px solid white;">
                    <tr>
                      <td style="font-weight:bold;border-bottom:1px solid #EDEDED;  padding: 7px 5px 7px 40px;width:60%;">Description</td>
                      <td style="font-weight:bold;border-bottom:1px solid #EDEDED;  padding: 7px 5px 7px 40px;width:15%;">Qty</td>
                      <td style="font-weight:bold;border-bottom:1px solid #2d87ba; padding: 7px 40px 7px 0px; text-align: right;width:25%;">Price</td>
                    </tr>
                  </thead>
                  <tbody id="lineItem">
                    @foreach($order_items as $row)
                    <tr>
                        <td style="border-bottom:1px solid #EDEDED; padding: 7px 5px 7px 40px; font-size: 12px;">
                            <span style="word-wrap: break-word;">{{$row->product_name}}</span>
                            <br>
                            <span style="word-wrap: break-word;"><?php echo $row->product_attributes; ?></span>
                        </td>
                        <td style="border-bottom:1px solid #EDEDED; padding: 7px 5px 7px 40px; font-size: 12px;">
                            <span style="word-wrap: break-word;">{{$row->qty}}</span><br>
                        </td>
                        <td valign="top" style="border-bottom:1px solid #2d87ba; padding: 7px 40px 7px 0; font-size: 12px; text-align: right;">KWD {{$row->price}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tbody>
                    <tr>
                        <td colspan="2" style="padding: 7px 40px 7px 5px; text-align: right;" id="tmp_total">Sub Total</td>
                        <td style="padding: 7px 40px 7px 5px; text-align: right;" id="tmp_total"><b>KWD {{$orders->sub_total}}</b></td>
                    </tr>
                    @if($orders->discount_value > 0)
                    <tr>
                        <td colspan="2" style="padding: 7px 40px 7px 5px; text-align: right;" id="tmp_total">Discount({{$orders->coupon_code}})</td>
                        <td style="padding: 7px 40px 5px 5px; text-align: right; color: green">KWD {{$orders->discount_value}}</td>
                    </tr>        
                    @endif  
                    <tr>
                        <td colspan="2" style="padding: 7px 40px 7px 5px; text-align: right;" id="tmp_total">Tax( {{$orders->tax_percentage}}% )</td>
                        <td style="padding: 7px 40px 5px 5px; text-align: right; color: green">KWD {{$orders->tax_amount}}</td>
                    </tr>  
                    @if($orders->shipping_charge > 0)
                    <tr>
                        <td colspan="2" style="padding: 7px 40px 7px 5px; text-align: right;" id="tmp_total">Shipping</td>
                        <td style="padding: 7px 40px 5px 5px; text-align: right; color: green">KWD {{$orders->shipping_charge}}</td>
                    </tr>        
                    @endif  
                    <tr>
                      <td colspan="2" style="border-bottom:1px solid #EDEDED; border-bottom:1px solid #dde9ef;border-top:1px solid #dde9ef;padding: 10px 5px; color:#2d87ba; font-size: 13px;padding: 7px 40px 7px 5px;text-align: right"><b>Total</b></td>
                      <td style="border-bottom:1px solid #2d87ba;border-top:1px solid #2d87ba;padding: 10px 40px 10px 0; text-align: right; color:#2d87ba; font-size: 13px"  id="tmp_balance_due"><b>KWD {{$orders->total}}</b></td>
                    </tr>
                    <tr>
                      <td colspan="3" style="border-bottom:1px solid #EDEDED; padding: 10px 5px;border-bottom:1px solid #dde9ef;border-top:1px solid #dde9ef;">
                        <!-- @if($orders->payment_status == 0)
                          <h4 style="color: #FF0000;font-size: 24px;margin-left: 100px;">UN PAID</h4>
                        @else -->
                          <h4 style="color: #32CD32;font-size: 24px;margin-left: 100px;">PAID</h4>
                        <!-- @endif -->
                      </td>
                      <!-- <td style="border-bottom:1px solid #EDEDED; border-bottom:1px solid #dde9ef;border-top:1px solid #dde9ef;padding: 5px 5px; color:#2d87ba; font-size: 13px">
                        @if($orders->payment_status == 1)
                        @if($orders->payment_type == 0)
                          <h5 style="color: #32CD32;font-size: 14px;margin-left: 100px;">Cash on Delivery (COD)</h5>
                        @endif
                        @endif
                      </td> -->
                    </tr>
                  </tbody>
                </table>

<style media="print">
    #invoice-footer {
        width: 100%;
        display: block;
        position: fixed;
        bottom: 0;
    }
</style>
<style media="screen">
    #invoice-footer { 
        position: fixed;
        margin-top: -5em;
        height: 5em;
        clear: both;
        margin-left: 30px;
        margin-right: 20px;
    }
</style>
                <div id="invoice-footer" style="margin-top: 200px; padding: 0 0 0 20px; border-top:1px solid #dadada; page-break-inside: avoid;">
                  <div style="color:gray;padding: 0px 0px 0 0px;">
                    <!-- <h3 style="margin: 0 0 0px; font-size: 13px; color: #2d87ba;"><label id="tmp_terms_label">Terms and Conditions</label></h3> -->
                    <p style="color:#000;font-size: 12px; font-family: Verdana, Helvetica, Arial, sans-serif;" wrap="soft">
                    All information in the Service is provided "as is", with no guarantee of completeness, accuracy, timeliness or of the results obtained from the use of this information, and without warranty of any kind, express or implied, including, but not limited to warranties of performance, merchantability and fitness for a particular purpose.
                    <br>
                    The Company will not be liable to You or anyone else for any decision made or action taken in reliance on the information given by the Service or for any consequenti
                    <br>
                    If you have any questions about this Disclaimer, You can contact Us:
                    <br>
                    By email: info@darstore.org</p>
                    <!-- <pre style="color:#000; padding: 0px 20px 0 0; display: block; font-size: 12px; font-family: Verdana, Helvetica, Arial, sans-serif;" wrap="soft">2.Manufacturer warranty only.</pre> -->
                  </div>
                </div>
                
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>
