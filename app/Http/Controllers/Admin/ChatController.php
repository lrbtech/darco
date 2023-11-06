<?php

namespace App\Http\Controllers\Admin;

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
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function chatlog(){
      return view('admin.chat_log');
    }

    public static function getallenquires(){
        $enquiry = vendor_enquiry::all();
        $output='';
        foreach($enquiry as $row){
        $customer = User::find($row->customer_id);
        $vendor = vendor::find($row->vendor_id);
    
        if($row->type == 0){
            $enquiry_info = vendor_project::find($row->project_idea_book_id);
        }
        else{
            $enquiry_info = idea_book::find($row->project_idea_book_id);
        }
        $output.='
        <a href="#" id="'.$row->id.'" value="'.$row->id.'" onclick="viewChat('.$row->id.')" class="chatclass d-flex align-items-center">
            <!--<div class="flex-shrink-0">
                <img class="img-fluid" src="https://upload.wikimedia.org/wikipedia/commons/d/d3/User_Circle.png" style="width:45px;" alt="user img">
            </div>-->
            <div class="flex-grow-1 ms-3">';
                $output.='<h3>Enquiry ID : '.$row->id.'</h3>';
                $output.='<p>Vendor : '.$vendor->first_name.' '.$vendor->last_name.'</p>';
                $output.='<p>Customer : '.$customer->first_name.' '.$customer->last_name.'</p>';
            $output.='</div>
        </a>';
        }
        echo $output;
    }


    public function newchatlogcount($id){
        $chat_count = vendor_customer_chat::where('enquiry_id',$id)->where('read_status',0)->count();
        return response()->json($chat_count); 
    }


    public function getchatlog($id){
      $chat = vendor_customer_chat::where('enquiry_id',$id)->get();
      date_default_timezone_set("Asia/Kuwait");
      date_default_timezone_get();

      $enquiry = vendor_enquiry::find($id);
        
        if($enquiry->type == 0){
            $enquiry_info = vendor_project::find($enquiry->project_idea_book_id);
        }
        else{
            $enquiry_info = idea_book::find($enquiry->project_idea_book_id);
        }

        $customer = User::find($enquiry->customer_id);
        $vendor = vendor::find($enquiry->vendor_id);


      $output='
      <div class="modal-dialog-scrollable">
        <div class="modal-content">
        <div class="msg-head">
            <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center">
                <span class="chat-icon"><img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg" alt="image title"></span>
                <div class="flex-shrink-0">
                    <img class="img-fluid" src="https://upload.wikimedia.org/wikipedia/commons/d/d3/User_Circle.png" style="width:45px;" alt="user img">
                </div>
                <div class="flex-grow-1 ms-3">';
                    if($enquiry->type == 0){
                    $output.='<h3>Professionals : '.$enquiry_info->project_name.'</h3>';
                    }else {
                    $output.='<h3>Get Design : '.$enquiry_info->title.'</h3>';
                    }
                    $output.='<p>Vendor : '.$vendor->first_name.' '.$vendor->last_name.'</p>
                    <p>Customer : '.$customer->first_name.' '.$customer->last_name.'</p>
                </div>
                </div>
            </div>
            <!-- <div class="col-4">
                <ul class="moreoption">
                <li class="navbar nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                </ul>
            </div> -->
            </div>
        </div>

        <div style="overflow:scroll;display: flex; flex-direction: column-reverse;" class="modal-body" id="modal-body">
            <div class="msg-body" id="msg-body">
            <ul id="chat_customer" class="chat-content">';

          
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

      $output.='
            </ul>
            </div>
        </div>

        </div>
    </div>';

                
      return response()->json(['html'=>$output],200); 
    }


    public function reloadchatlog($id){
        $chat = vendor_customer_chat::where('enquiry_id',$id)->get();
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
  
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
