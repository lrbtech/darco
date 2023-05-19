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
        return view('vendor.chat_to_customer',compact('customer','enquiry'));
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
      $vendor_customer_chat->message_from = 1;
      $vendor_customer_chat->save();

      //$this->sendChatNotification($vendor_customer_chat->id);

      $dateTime = new Carbon($vendor_customer_chat->created_at, new \DateTimeZone('Asia/Kuwait'));
      $message =  array(
        'message'=> $request->message,
        'message_from'=> '1',
        'date'=> $dateTime->diffForHumans(),
        'channel_name'=> $request->enquiry_id,
      );

      event(new ChatEvent($message));

      return response()->json($request->enquiry_id); 
    }

    public function getCustomerChat($id){
      $chat = vendor_customer_chat::where('enquiry_id',$id)->get();
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
        $output=''; 
        foreach($chat as $row){
          $dateTime = new Carbon($row->updated_at, new \DateTimeZone('Asia/Kuwait'));
          if($row->message_from == 0){
          $output.='<div class="chat chat-left">
            <div class="chat-body">
              <div class="chat-message">
                <p>'.$row->message.'</p>
                <span style="left:10px !important;" class="chat-time">'.$dateTime->diffForHumans().'</span>
              </div>
            </div>
          </div>';
          }
          else{
          $output.='<div class="chat">
            <div class="chat-body">
              <div class="chat-message">
                <p>'.$row->message.'</p>
                <span class="chat-time">'.$dateTime->diffForHumans().'</span>
              </div>
            </div>
          </div>';
          }
        }

      $output.='<script src="/app-assets/js/scripts/pages/app-chat.js"></script>
      <script>
      chatContainer.scrollTop($(".chat-container > .chat-content").height());
      </script>';
         
      return response()->json(['html'=>$output],200); 
    }



}
