<?php

namespace App\Imports;

use App\Models\User;
use App\Models\product;
use App\Models\product_attributes;
use App\Models\product_specifications;
use App\Models\category;
use App\Models\attributes;
use App\Models\attribute_fields;
use App\Models\product_group;
use App\Models\product_images;
use App\Models\brand;
use App\Models\language;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use DB;
use Mail;
use Hash;
use Carbon\Carbon;
use Image;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;   

class VendorProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function model(array $row)
    {
        // return new upload_data([
        // ]);
        $request = $this->request;  
        
        $sku_value = mt_rand( 1000000000, 9999999999);
        if(DB::table( 'products' )->where( 'sku_value', $sku_value )->exists()){
            $this->generateSkuValue();
        }
        else{
            return $sku_value;
        }

        $get_product_group = product_group::where('group_name',$row['product_name_unique'])->where('vendor_id',Auth::guard('vendor')->user()->id)->first();

        $product_group_id = '';
        if(!empty($get_product_group)){
            $product_group_id = $get_product_group->id;
        }
        else{
            $product_group = new product_group;
            $product_group->vendor_id = Auth::guard('vendor')->user()->id;
            $product_group->group_name = $request->group_name;
            $product_group->save();

            $product_group_id = $product_group->id;
        }

        $product = new product;
        $product->date = date('Y-m-d');
        $product->vendor_id = Auth::guard('vendor')->user()->id;
        $product->product_group = $product_group_id;
        $product->product_name = $row['product_varient_name_english'];
        $product->product_name_arabic = $row['product_varient_name_arabic'];
        $product->category = $request->category;
        $product->subcategory = $request->subcategory;
        $product->subsubcategory = $request->subsubcategory;
        $product->brand = $row['brand'];
        $product->mrp_price = $row['mrp_price'];
        $product->sales_price = $row['sales_price'];
        $product->stock = $row['stock'];
        $product->mobile_description = $row['description'];
        $product->height_weight_size = $row['height_weight_size'];
        $product->shipping_charge = $row['shipping_charge'];
        $product->shipping_description = $row['shipping_description'];

        $product->stock_status = 0;
        $product->shipping_enable = 0;
        $product->return_policy = 0;
        $product->return_days = $row['return_days'];
        $product->return_description = $row['return_description'];
        $product->assured_seller = 0;
        $product->delivery_available = 0;
        $product->rest_assured_seller = 0;
        $product->most_trusted = 0;
        $product->save();
    }




}
