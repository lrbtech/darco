<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    private function generateSkuValue(){
        $sku_value = mt_rand( 1000000000, 9999999999);
        if(DB::table( 'products' )->where( 'sku_value', $sku_value )->exists()){
            $this->generateSkuValue();
        }
        else{
            return $sku_value;
        }
    }

    public function updateproductprice($id,Request $request){
        
        $product = product::find($id);
        $product->sales_price = $request->sales_price;
        $product->stock = $request->stock;
        $product->save();

        $response = array( 
            'status' => 1, 
            'msg' => 'Product data has been updated successfully.', 
            'data' => $product 
        ); 

        return response()->json($response, 200);  
    }


    public function addproduct(){
        $category = category::where('status',0)->where('parent_id',0)->get();
        $brand = brand::where('status',0)->orderBy('brand','ASC')->get();
        $attributes = attributes::where('status',0)->orderBy('id','DESC')->get();
        $product_group = product_group::where('vendor_id',Auth::guard('vendor')->user()->id)->orderBy('id','DESC')->get();
        $language = language::all();
        return view('vendor.add_product',compact('category','attributes','product_group','brand','language'));
    }

    public static function viewproductAttr($id){
        $product_attributes = product_attributes::where('product_id',$id)->get();
        $html='';
        foreach($product_attributes as $row){
            $attributes = attributes::find($row->attribute_id);
            $field = attribute_fields::where('attribute_id',$row->attribute_id)->get();
            $html.='<div id="view_attributes'.$row->attribute_id.'" class="col-md-6">
                <div class="form-group">
                    <label class="attributes'.$row->attribute_id.'">Select '.$attributes->attribute_name.'   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="float:right;" href="#" onclick="AttrDelete('.$row->id.','.$row->attribute_id.')">Remove</a></label>
                    <select required id="attributes_data'.$row->attribute_id.'" name="attributes_data'.$row->attribute_id.'" class="form-control">
                        <option value=" ">SELECT</option>';
                        foreach($field as $field1){
                            if($field1->id == $row->attribute_field_id){
                                $html.='<option selected value="'.$field1->id.'">'.$field1->attributes_value.'</option>';
                            }
                            else{
                                $html.='<option value="'.$field1->id.'">'.$field1->attributes_value.'</option>';
                            }
                        }
            $html .='</select>
                </div>
            </div>';
        }
        echo $html;
    }

    public function productAttr($id){
        $attributes = attributes::find($id);
        $field = attribute_fields::where('attribute_id',$id)->get();
        $html='<div id="view_attributes'.$id.'" class="col-md-6">
            <div class="form-group">
                <label class="attributes'.$id.'">Select '.$attributes->attribute_name.'   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="float:right;" href="#" onclick="removeAttr('.$id.')">Remove</a></label>
                <select required id="attributes_data'.$id.'" name="attributes_data'.$id.'" class="form-control">
                    <option value="">SELECT</option>';
                    foreach($field as $row){
                    $html.='<option value="'.$row->id.'">'.$row->attributes_value.'</option>';
                    }
        $html .='</select>
            </div>
        </div>';
        return response()->json($html);
    }

    public function saveproduct(Request $request){
        $this->validate($request, [
            'product_name'=>'required|unique:products,product_name,NULL,id,vendor_id,'.Auth::guard('vendor')->user()->id,
            'category'=>'required',
            'sales_price'=>'required',
            'stock'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'The Product 1st image field is required',
        ]);

        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
            for ($x=0; $x<count($name_array); $x++) 
            {
                if($size_array[$x] > 10000000){
                    $message = 'Sorry! Maximum allowed size for an image is 10MB Change '.($x+2).' Image';
                    return response()->json(['message' => $message,'status'=>2], 200);
                }
            }
        }

        foreach(explode(',', $request->attrdata) as $attr) {
            $variable = 'attributes_data'.$attr;
            $attr_id = $request->$variable;
            $field = attribute_fields::find($attr_id);

            $q =DB::table('product_attributes');
            $q->where('product_group',$request->product_group);
            $q->where('attribute_id',$attr);
            $q->where('attribute_field_id',$attr_id);
            // $q->groupBy('product_group','attribute_id','attribute_field_id');
            // $q->select('product_group','attribute_id','attribute_field_id');
            $old_attribute = $q->count();
            
            if($old_attribute > 0){
                $message = 'Attribute : '.$field->attributes_value.' Already used this Product Group';
                return response()->json(['message' => $message,'status'=>2], 200);
            }

        }

        $product = new product;
        $sku_value =  $this->generateSkuValue();
        $product->sku_value = $sku_value;
        $product->vendor_id = Auth::guard('vendor')->user()->id;
        $product->product_group = $request->product_group;
        $product->product_name = $request->product_name;
        $product->product_name_arabic = $request->product_name_arabic;
        $product->category = $request->category;
        $product->subcategory = $request->subcategory;
        $product->subsubcategory = $request->subsubcategory;
        $product->brand = $request->brand;
        $product->mrp_price = $request->mrp_price;
        $product->sales_price = $request->sales_price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->specifications = $request->specifications;
        // $product->description_arabic = $request->description_arabic;
        // $product->specifications_arabic = $request->specifications_arabic;
        $product->mobile_description = $request->mobile_description;
        $product->mobile_specifications = $request->mobile_specifications;
        $product->height_weight_size = $request->height_weight_size;
        $product->shipping_charge = $request->shipping_charge;
        $product->shipping_description = $request->shipping_description;

        $product->stock_status = $request->stock_status;
        $product->shipping_enable = $request->shipping_enable;
        $product->return_policy = $request->return_policy;
        $product->return_days = $request->return_days;
        $product->return_description = $request->return_description;
        $product->assured_seller = $request->assured_seller;
        $product->delivery_available = $request->delivery_available;
        $product->rest_assured_seller = $request->rest_assured_seller;
        $product->most_trusted = $request->most_trusted;

        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('product_image/'), $upload_image);
            $product->image = $upload_image;
            }
        }

        $product->save();

        foreach(explode(',', $request->attrdata) as $attr) {
            $variable = 'attributes_data'.$attr;
            $attr_id = $request->$variable;
            $field = attribute_fields::find($attr_id);

            $product_attributes = new product_attributes;
            $product_attributes->vendor_id = Auth::guard('vendor')->user()->id;
            $product_attributes->product_id = $product->id;
            $product_attributes->product_group = $product->product_group;
            $product_attributes->attribute_id = $attr;
            $product_attributes->attribute_field_id = $attr_id;
            $product_attributes->attribute_value = $field->attributes_value;
            $product_attributes->save();
        }
        

        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
            for ($x=0; $x<count($name_array); $x++) 
            {
                if($name_array[$x] != ""){
                    $product_images = new product_images;

                    $image = $name_array[$x];
                    $image_info = explode(".", $name_array[$x]); 
                    $image_type = end($image_info);
                    $input['imagename'] = rand().time().'.'.$image_type;
                    $destinationPath = public_path('/product_image');
                    $img = Image::make($tmp_name_array[$x]);

                    // $img->resize(1200, 600, function ($constraint) {
                    //     $constraint->aspectRatio();
                    // })->insert('upload_files/logo_watermark.png','bottom-right', 50, 30)
                    // ->save($destinationPath.'/'.$input['imagename']);

                    $img->save($destinationPath.'/'.$input['imagename']);

                    $product_images->vendor_id = Auth::guard('vendor')->user()->id;
                    $product_images->product_id = $product->id;
                    $product_images->image = $input['imagename'];
                    $product_images->save();
                }
    	    }
        }

        for ($x=0; $x<count($_POST['value']); $x++) 
    	{
    		$product_specifications = new product_specifications;
            $product_specifications->product_id = $product->id;
	        $product_specifications->label = $_POST['label'][$x];
            $product_specifications->value = $_POST['value'][$x];

	        if($_POST['value'][$x]!=""){
	        	$product_specifications->save();
	    	}
    	}

        return response()->json(['message'=>'Your Product is Save Successfully','status'=>0], 200); 
    }

    public function updateproduct(Request $request){
        $this->validate($request, [
            'product_name'=>'required|unique:products,product_name,'.$request->id.',id,vendor_id,'.Auth::guard('vendor')->user()->id,
            'sales_price'=>'required',
            'category'=>'required',
            'stock'=>'required',
            'image' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);

        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
            for ($x=0; $x<count($name_array); $x++) 
            {
                if($size_array[$x] > 10000000){
                    $message = 'Sorry! Maximum allowed size for an image is 10MB Change '.($x+2).' Image';
                    return response()->json(['message' => $message,'status'=>2], 200);
                }
            }
        }
        
        $product = product::find($request->id);
        $product->product_group = $request->product_group;
        $product->product_name = $request->product_name;
        $product->product_name_arabic = $request->product_name_arabic;
        $product->category = $request->category;
        $product->subcategory = $request->subcategory;
        $product->subsubcategory = $request->subsubcategory;
        $product->brand = $request->brand;
        $product->mrp_price = $request->mrp_price;
        $product->sales_price = $request->sales_price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->specifications = $request->specifications;
        // $product->description_arabic = $request->description_arabic;
        // $product->specifications_arabic = $request->specifications_arabic;
        $product->mobile_description = $request->mobile_description;
        $product->mobile_specifications = $request->mobile_specifications;
        $product->height_weight_size = $request->height_weight_size;
        $product->shipping_charge = $request->shipping_charge;
        $product->shipping_description = $request->shipping_description;

        $product->stock_status = $request->stock_status;
        $product->shipping_enable = $request->shipping_enable;
        $product->return_policy = $request->return_policy;
        $product->return_days = $request->return_days;
        $product->return_description = $request->return_description;
        $product->assured_seller = $request->assured_seller;
        $product->delivery_available = $request->delivery_available;
        $product->rest_assured_seller = $request->rest_assured_seller;
        $product->most_trusted = $request->most_trusted;

        if($request->image!=""){
            $old_image = "product_image/".$product->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('product_image/'), $upload_image);
            $product->image = $upload_image;
            }
        }

        $product->save();

        $old_product_attributes = product_attributes::where('product_id',$product->id)->get();

        foreach($old_product_attributes as $attr) {
            $variable = 'attributes_data'.$attr->attribute_id;
            $attr_id = $request->$variable;
            $field = attribute_fields::find($attr_id);

            $product_attributes = product_attributes::find($attr->id);
            $product_attributes->vendor_id = Auth::guard('vendor')->user()->id;
            $product_attributes->product_id = $product->id;
            $product_attributes->product_group = $product->product_group;
            $product_attributes->attribute_id = $attr->attribute_id;
            $product_attributes->attribute_field_id = $attr_id;
            $product_attributes->attribute_value = $field->attributes_value;
            $product_attributes->save();
        }
        
        foreach(explode(',', $request->attrdata) as $attr) {
            if($attr != ''){
                $variable = 'attributes_data'.$attr;
                $attr_id = $request->$variable;
                $field = attribute_fields::find($attr_id);

                $product_attributes = new product_attributes;
                $product_attributes->vendor_id = Auth::guard('vendor')->user()->id;
                $product_attributes->product_id = $product->id;
                $product_attributes->product_group = $product->product_group;
                $product_attributes->attribute_id = $attr;
                $product_attributes->attribute_field_id = $attr_id;
                $product_attributes->attribute_value = $field->attributes_value;
                $product_attributes->save();
            }
        }

        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
            for ($x=0; $x<count($name_array); $x++) 
            {
                if($_POST['image_id'][$x]!=""){
                    $product_images = product_images::find($_POST['image_id'][$x]);
                    if($name_array[$x] != ""){
                        $old_image = "product_image/".$product_images->image;
                        if (file_exists($old_image)) {
                            @unlink($old_image);
                        }
                        $image = $name_array[$x];
                        $image_info = explode(".", $name_array[$x]); 
                        $image_type = end($image_info);
                        $input['imagename'] = rand().time().'.'.$image_type;
                        $destinationPath = public_path('/product_image');
                        $img = Image::make($tmp_name_array[$x]);

                        // $img->resize(1200, 600, function ($constraint) {
                        //     $constraint->aspectRatio();
                        // })->insert('upload_files/logo_watermark.png','bottom-right', 50, 30)
                        // ->save($destinationPath.'/'.$input['imagename']);

                        $img->save($destinationPath.'/'.$input['imagename']);
                        $product_images->image = $input['imagename'];
                    }
                    $product_images->save();
                }
                else{
                    if($name_array[$x] != ""){
                        $product_images = new product_images;
                        $image = $name_array[$x];
                        $image_info = explode(".", $name_array[$x]); 
                        $image_type = end($image_info);
                        $input['imagename'] = rand().time().'.'.$image_type;
                        $destinationPath = public_path('/product_image');
                        $img = Image::make($tmp_name_array[$x]);

                        // $img->resize(1200, 600, function ($constraint) {
                        //     $constraint->aspectRatio();
                        // })->insert('upload_files/logo_watermark.png','bottom-right', 50, 30)
                        // ->save($destinationPath.'/'.$input['imagename']);

                        $img->save($destinationPath.'/'.$input['imagename']);

                        $product_images->vendor_id = Auth::guard('vendor')->user()->id;
                        $product_images->product_id = $product->id;
                        $product_images->image = $input['imagename'];
                        $product_images->save();
                    }
                }
            }
        }

        $old_product_specifications = product_specifications::where('product_id',$product->id)->delete();
        for ($x=0; $x<count($_POST['value']); $x++) 
    	{
    		$product_specifications = new product_specifications;
            $product_specifications->product_id = $product->id;
	        $product_specifications->label = $_POST['label'][$x];
            $product_specifications->value = $_POST['value'][$x];

	        if($_POST['value'][$x]!=""){
	        	$product_specifications->save();
	    	}
    	}

        return response()->json(['message'=>'Your Product is Update Successfully','status'=>0], 200);  
    }

    public function deleteproductimage($id){
        $product_images = product_images::find($id);
        $old_image = "product_image/".$product_images->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
        $product_images->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function deleteproductattribute($id){
        $old_product_attributes = product_attributes::find($id);
        $old_product_attributes->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


    public function product(){
        $product = product::where('vendor_id',Auth::guard('vendor')->user()->id)->orderBy('id','DESC')->get();
        $category = category::where('status',0)->where('parent_id',0)->get();
        $language = language::all();
        return view('vendor.product',compact('product','category','language'));
    }

    public function editproduct($id){
        $product = product::find($id);
        $attributes = attributes::where('status',0)->orderBy('id','DESC')->get();
        $brand = brand::where('status',0)->orderBy('brand','ASC')->get();
        $product_group = product_group::where('vendor_id',Auth::guard('vendor')->user()->id)->orderBy('id','DESC')->get();
        $category = category::where('status',0)->where('parent_id',0)->get();
        $product_images = product_images::where('product_id',$id)->get();
        $product_attributes = product_attributes::where('product_id',$id)->get();
        $language = language::all();
        $product_specifications = product_specifications::where('product_id',$id)->get();
        return view('vendor.edit_product',compact('product','category','product_images','attributes','product_group','product_attributes','brand','language','product_specifications'));
    }
    
    public function deleteproduct($id,$status){
        $product = product::find($id);
        $product->status = $status;
        $product->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    

    public function saveattributes(Request $request){
        $this->validate($request, [
            // 'attribute_name'=>'required|unique:attributes,attribute_name,NULL,id,vendor_id,'.Auth::guard('vendor')->user()->id,
            'attribute_name'=>'required',
        ]);

        $attributes = new attributes;
        $attributes->vendor_id = Auth::guard('vendor')->user()->id;
        $attributes->attribute_name = $request->attribute_name;
        $attributes->save();

        return response()->json('successfully save'); 
    }

    public function updateattributes(Request $request){
        $this->validate($request, [
            // 'attribute_name'=>'required|unique:attributes,attribute_name,'.$request->id.',id,vendor_id,'.Auth::guard('vendor')->user()->id,
            'attribute_name'=>'required',
        ]);
        
        $attributes = attributes::find($request->id);
        $attributes->attribute_name = $request->attribute_name;
        $attributes->save();

        return response()->json('successfully update'); 
    }

    public function attributes(){
        $attributes = attributes::where('vendor_id',Auth::guard('vendor')->user()->id)->orderBy('id','DESC')->get();
        $language = language::all();
        return view('vendor.attributes',compact('attributes','language'));
    }

    public function editattributes($id){
        $attributes = attributes::find($id);
        return response()->json($attributes); 
    }
    
    public function deleteattributes($id){
        $attributes = attributes::find($id);
        $attributes->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }



    public function saveattributefields(Request $request){
        $this->validate($request, [
            // 'attributes_value'=>'required|unique:attribute_fields,attributes_value,NULL,id,vendor_id,'.Auth::guard('vendor')->user()->id,
            'attributes_value'=>'required',
        ]);

        $attribute_fields = new attribute_fields;
        $attribute_fields->vendor_id = Auth::guard('vendor')->user()->id;
        $attribute_fields->attribute_id = $request->attribute_id;
        $attribute_fields->attributes_value = $request->attributes_value;
        $attribute_fields->save();

        return response()->json('successfully save'); 
    }

    public function updateattributefields(Request $request){
        $this->validate($request, [
            // 'attributes_value'=>'required|unique:attribute_fields,attributes_value,'.$request->id.',id,vendor_id,'.Auth::guard('vendor')->user()->id,
            'attributes_value'=>'required',
        ]);
        
        $attribute_fields = attribute_fields::find($request->id);
        $attribute_fields->attribute_id = $request->attribute_id;
        $attribute_fields->attributes_value = $request->attributes_value;
        $attribute_fields->save();

        return response()->json('successfully update'); 
    }

    public function attributefields($id){
        $attribute_fields = attribute_fields::where('vendor_id',Auth::guard('vendor')->user()->id)->where('attribute_id',$id)->orderBy('id','DESC')->get();
        $attribute_id = $id;
        $language = language::all();
        return view('vendor.attribute_fields',compact('attribute_fields','attribute_id','language'));
    }

    public function editattributefields($id){
        $attribute_fields = attribute_fields::find($id);
        return response()->json($attribute_fields); 
    }
    
    public function deleteattributefields($id){
        $attribute_fields = attribute_fields::find($id);
        $attribute_fields->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


    public function saveproductgroup(Request $request){
        $this->validate($request, [
            'group_name'=>'required|unique:product_groups,group_name,NULL,id,vendor_id,'.Auth::guard('vendor')->user()->id,
        ]);

        $product_group = new product_group;
        $product_group->vendor_id = Auth::guard('vendor')->user()->id;
        $product_group->group_name = $request->group_name;
        $product_group->save();

        return response()->json('successfully save'); 
    }

    public function updateproductgroup(Request $request){
        $this->validate($request, [
            'group_name'=>'required|unique:product_groups,group_name,'.$request->id.',id,vendor_id,'.Auth::guard('vendor')->user()->id,
        ]);
        
        $product_group = product_group::find($request->id);
        $product_group->group_name = $request->group_name;
        $product_group->save();

        return response()->json('successfully update'); 
    }

    public function productgroup(){
        $product_group = product_group::where('vendor_id',Auth::guard('vendor')->user()->id)->orderBy('id','DESC')->get();
        $language = language::all();
        return view('vendor.product_group',compact('product_group','language'));
    }

    public function editproductgroup($id){
        $product_group = product_group::find($id);
        return response()->json($product_group); 
    }
    
    public function deleteproductgroup($id){
        $product_group = product_group::find($id);
        $product_group->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }




}
