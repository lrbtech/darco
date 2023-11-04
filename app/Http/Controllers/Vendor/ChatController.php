<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\language;
use App\Models\User;
use App\Models\vendor_customer_chat;
use App\Models\vendor;
use App\Models\vendor_enquiry;
use App\Models\vendor_project;
use App\Models\idea_book;

use Hash;
use session;
use Auth;
use Carbon\Carbon;
use DB;
use App\Events\ChatEvent;
use App\Events\ChatAdmin;
use PDF;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }
    public function getChat($id){
        $language = language::all();
        return view("vendor.chat",compact('language'));
    }

    public function chatToCustomer($id){
      $enquiry = vendor_enquiry::find($id);
      $customer = User::find($enquiry->customer_id);
      if($enquiry->type == 0){
        $enquiry_info = vendor_project::find($enquiry->project_idea_book_id);
      }
      else{
        $enquiry_info = idea_book::find($enquiry->project_idea_book_id);
      }
      return view('vendor.chat_to_customer',compact('customer','enquiry','enquiry_info'));
    }

    public function saveCustomerChat(Request $request){
      $request->validate([
          'message'=>'required',
      ]);
      date_default_timezone_set("Asia/Kuwait");
      date_default_timezone_get();
      $vendor_customer_chat = new vendor_customer_chat;
      $vendor_customer_chat->message = $request->message;
      $vendor_customer_chat->customer_id = $request->customer_id;
      $vendor_customer_chat->enquiry_id = $request->enquiry_id;
      $vendor_customer_chat->vendor_id = Auth::guard('vendor')->user()->id;
      $vendor_customer_chat->date = date('Y-m-d');
      $vendor_customer_chat->time = date('h:i A');
      $vendor_customer_chat->message_from = 1;
      $vendor_customer_chat->save();


      // $dateTime = new Carbon($vendor_customer_chat->created_at, new \DateTimeZone('Asia/Kuwait'));
      // $message =  array(
      //   'message'=> $request->message,
      //   'message_from'=> '1',
      //   'date'=> $dateTime->diffForHumans(),
      //   'channel_name'=> $request->enquiry_id,
      // );

      // event(new ChatEvent($message));

      return response()->json($request->enquiry_id); 
    }

  public function viewcustomerchatcount($id){
    $chat_count = vendor_customer_chat::where('enquiry_id',$id)->where('message_from',0)->where('read_status',0)->count();
    return response()->json($chat_count); 
  }

  public static function viewmsgcount($id) {        
    $chat_count = vendor_customer_chat::where('enquiry_id',$id)->where('message_from',0)->where('read_status',0)->count();
    return $chat_count; 
  }

    public function getCustomerChat($id){
      $chat = vendor_customer_chat::where('enquiry_id',$id)->get();
      date_default_timezone_set("Asia/Kuwait");
      date_default_timezone_get();

      $get_chat = vendor_customer_chat::where('enquiry_id',$id)->where('read_status',0)->where('message_from',0)->get();

      foreach($get_chat as $row){
        $upchat = vendor_customer_chat::find($row->id);
        $upchat->read_status = 1;
        $upchat->save();
      }
      $output=''; 
      foreach($chat as $row){
        $dateTime = new Carbon($row->updated_at, new \DateTimeZone('Asia/Kuwait'));
        if($row->message_from == 0){
        $output.='
        <li class="sender">
            <p> '.$row->message.' </p>
            <span class="time">'.$dateTime->diffForHumans().'</span>
        </li>';
        }
        else{
        $output.='
        <li class="repaly">
            <p> '.$row->message.' </p>
            <span class="time">'.$dateTime->diffForHumans().'</span>
        </li>';
        }
      }

                
      return response()->json(['html'=>$output],200); 
    }

    



}
