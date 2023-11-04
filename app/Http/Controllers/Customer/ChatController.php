<?php

namespace App\Http\Controllers\Customer;

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
        $this->middleware('auth');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }
    public function chat($id){
        $language = language::all();
        $enquiry = vendor_enquiry::find($id);
        $vendor = vendor::find($enquiry->vendor_id);
        if($enquiry->type == 0){
          $enquiry_info = vendor_project::find($enquiry->project_idea_book_id);
        }
        else{
          $enquiry_info = idea_book::find($enquiry->project_idea_book_id);
        }
        return view('customer.chat',compact('vendor','enquiry','language','enquiry_info'));
    }

    public function savevendorchat(Request $request){
        $request->validate([
            'message'=>'required',
        ]);
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
        $vendor_customer_chat = new vendor_customer_chat;
        $vendor_customer_chat->message = $request->message;
        $vendor_customer_chat->vendor_id = $request->vendor_id;
        $vendor_customer_chat->enquiry_id = $request->enquiry_id;
        $vendor_customer_chat->customer_id = Auth::user()->id;
        $vendor_customer_chat->date = date('Y-m-d');
        $vendor_customer_chat->time = date('h:i A');
        $vendor_customer_chat->message_from = 0;
        $vendor_customer_chat->save();
    
        return response()->json($request->enquiry_id); 
      }
  
    public function viewvendorchatcount($id){
      $chat_count = vendor_customer_chat::where('enquiry_id',$id)->where('message_from',1)->where('read_status',0)->count();
      return response()->json($chat_count); 
    }
  
  
    public function getvendorchat($id){
        $chat = vendor_customer_chat::where('enquiry_id',$id)->get();
          date_default_timezone_set("Asia/Kuwait");
          date_default_timezone_get();

          $get_chat = vendor_customer_chat::where('enquiry_id',$id)->where('read_status',0)->where('message_from',1)->get();

          foreach($get_chat as $row){
            $upchat = vendor_customer_chat::find($row->id);
            $upchat->read_status = 1;
            $upchat->save();
          }
          $output=''; 
          foreach($chat as $row){
            $dateTime = new Carbon($row->updated_at, new \DateTimeZone('Asia/Kuwait'));
            if($row->message_from == 1){
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
