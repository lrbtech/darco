@extends('vendor.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="/app-assets/css/pages/app-chat.css">
@endsection
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-area-wrapper">
    <div class="sidebar-left">
        <div class="sidebar">
        <!-- app chat user profile left sidebar start -->

  <!-- app chat user profile left sidebar ends -->
  <!-- app chat sidebar start -->
  <div class="chat-sidebar card">
    <span class="chat-sidebar-close">
      <i class="bx bx-x"></i>
    </span>
    <!-- <div class="chat-sidebar-search">
      <div class="d-flex align-items-center">
        <div class="chat-sidebar-profile-toggle">
          <div class="avatar">
            <img src="/images/portrait/small/avatar-s-11.jpg" alt="user_avatar" height="36" width="36">
          </div>
        </div>
        <fieldset class="form-group position-relative has-icon-left mx-75 mb-0">
          <input type="text" class="form-control round" id="chat-search" placeholder="Search">
          <div class="form-control-position">
            <i class="bx bx-search-alt text-dark"></i>
          </div>
        </fieldset>
      </div>
    </div> -->
    <div class="chat-sidebar-list-wrapper pt-2">
      
    <h6 class="px-2 pb-25 mb-0">Enquiry ID : {{$enquiry->id}}</h6>
    <hr>
    <h6 class="px-2 pb-25 mb-0">Customer Name : {{$customer->first_name}} {{$customer->last_name}}</h6>
    <h6 class="px-2 pb-25 mb-0">Mobile : {{$customer->mobile}}</h6>
    <h6 class="px-2 pb-25 mb-0">Email : {{$customer->email}}</h6>
    <br>
    <br>
    </div>
  </div>
  <!-- app chat sidebar ends -->
				</div>
			</div>
			<div class="content-right">
          <div class="content-overlay"></div>
				<div class="content-wrapper">
          <div class="content-header row">
          </div>
          <div class="content-body">
            <!-- app chat overlay -->
<div class="chat-overlay"></div>
<!-- app chat window start -->
<section class="chat-window-wrapper">
  <div class="chat-start d-none">
    <span class="bx bx-message chat-sidebar-toggle chat-start-icon font-large-3 p-3 mb-1"></span>
    <h4 class="d-none d-lg-block py-50 text-bold-500">Select a contact to start a chat!</h4>
    <button class="btn btn-light-primary chat-start-text chat-sidebar-toggle d-block d-lg-none py-50 px-1">Start
      Conversation!</button>
  </div>
  <div class="chat-area ">
    <!-- chat card start -->
    <div class="card chat-wrapper shadow-none">
      <div class="card-content">
        <div style="height:450px;overflow:scroll;" class="card-body chat-container">
          <div id="chat_customer" class="chat-content">
            
            
          </div>
        </div>
      </div>
      <div class="card-footer chat-footer border-top px-2 pt-1 pb-0 mb-1">
      <form id="chat_form" class="d-flex align-items-center" action="javascript:void(0);">
        {{csrf_field()}}
          <!-- <i class="bx bx-face cursor-pointer"></i>
          <i class="bx bx-paperclip ml-1 cursor-pointer"></i> -->
          <input type="hidden" value="{{$enquiry->id}}" name="enquiry_id" id="enquiry_id">
          <input type="hidden" value="{{$enquiry->customer_id}}" name="customer_id" id="customer_id">
          <input autocomplete="off" type="text" name="message" id="message" class="form-control chat-message-send mx-1" placeholder="Type your message here...">
          <button type="button" onclick="VendorChatSave()" class="btn btn-primary glow send d-lg-flex"><i class="bx bx-paper-plane"></i>
            <span class="d-none d-lg-block ml-1">Send</span></button>
        </form>
      </div>
    </div>
    <!-- chat card ends -->
  </div>
</section>
<!-- app chat window ends -->
<!-- app chat profile right sidebar start -->
<!-- app chat profile right sidebar ends -->
          </div>
        </div>
			</div>
		</div>
	  </div>
  <!-- END: Content-->
@endsection
@section('extra-js')
<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="/app-assets/js/scripts/datatables/datatable.js"></script>

<script src="/app-assets/js/scripts/pages/app-chat.js"></script>  
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script type="text/javascript"> 
$('body').addClass('chat-application');
$('body').addClass('fixed-navbar');
// $('.chat-to-customer').addClass('active');
viewChat("<?php echo $enquiry->id; ?>");
Pusher.logToConsole = true;
// var channel_name = $('#channel_name').val();
var pusher = new Pusher('f139250e3d9a08f0c8d2', {
  cluster: 'ap2'
});
var channel = pusher.subscribe("<?php echo $enquiry->id; ?>");
channel.bind('chat-event', function(data) {
  console.log(data);
  viewChat("<?php echo $enquiry->id; ?>");
});

//viewChat(<?php echo $enquiry->id; ?>);
function viewChat(id)
{
  $.ajax({
    url : '/vendor/get-customer-chat/'+id,
    type: "GET",
    success: function(data)
    {
      $('#chat_customer').html(data.html);
      chatContainer.scrollTop($(".chat-container > .chat-content").height());
    }
  });
}

function VendorChatSave(){
  var formData = new FormData($('#chat_form')[0]);
  $.ajax({
    url : '/vendor/save-customer-chat',
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    dataType: "JSON",
    success: function(data)
    {
      //console.log(data);                
      $("#chat_form")[0].reset();
      toastr.success('Chat Send Successfully', 'Successfully Update');
      //viewChat(data);
    },
    error: function (data, errorThrown) {
      var errorData = data.responseJSON.errors;
      $.each(errorData, function(i, obj) {
        toastr.error(obj[0]);
      });
    }
  });
}
</script>
@endsection

