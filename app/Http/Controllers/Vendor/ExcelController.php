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
use App\Imports\VendorProductImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }


    public function uploadexcel(){
        $category = category::where('status',0)->where('parent_id',0)->get();
        $brand = brand::where('status',0)->orderBy('brand','ASC')->get();
        $attributes = attributes::where('status',0)->orderBy('id','DESC')->get();
        $product_group = product_group::where('vendor_id',Auth::guard('vendor')->user()->id)->orderBy('id','DESC')->get();
        $language = language::all();
        return view('vendor.upload_excel',compact('category','attributes','product_group','brand','language'));
    }

    public function importexcel(Request $request)
    {
        $this->validate($request, [
        'excel_file'  => 'required|mimes:xls,xlsx',
        'category'  => 'required'
        ]);


        Excel::import(new VendorProductImport($request),request()->file('excel_file'));
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    




}
