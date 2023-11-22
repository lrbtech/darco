@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/tinymce/tinymce.min.css">

@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Master</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item active">Settings
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Basic Editor start -->
        <section id="basic">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Invoice Footer</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <form action="/admin/update-settings" class="form-horizontal" id="form" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id" value="{{$settings->id}}">
                        <div class="row">
                          <div class="form-group col-md-12">
                              <label>Footer Description</label>
                              <textarea name="footer_description" id="footer_description" class="form-control"><?php echo $settings->footer_description; ?></textarea>
                          </div>
                          <div class="form-group col-md-6">
                              <label>Address</label>
                              <textarea name="address" id="address" class="form-control"><?php echo $settings->address; ?></textarea>
                          </div>
                          <div class="form-group col-md-6">
                              <label>Phone</label>
                              <input type="text" value="{{$settings->phone}}" name="phone" id="phone" class="form-control">
                          </div>
                          <div class="form-group col-md-6">
                              <label>Email</label>
                              <input type="email" value="{{$settings->email}}" name="email" id="email" class="form-control">
                          </div>
                          <div class="form-group col-md-6">
                              <label>Contract File (only pdf)</label>
                              <input accept=".pdf" type="file" name="contract_file" id="contract_file" class="form-control">
                              <br>
                              @if($settings->contract_file != "")
                              <a target="_blank" hred="/upload_files/{{$settings->contract_file}}">View</a>
                              @endif
                          </div>
                          <div class="form-group col-md-6">
                              <label>Facebook Url</label>
                              <input type="text" value="{{$settings->facebook_url}}" name="facebook_url" id="facebook_url" class="form-control">
                          </div>
                          <div class="form-group col-md-6">
                              <label>Twitter Url</label>
                              <input type="text" value="{{$settings->twitter_url}}" name="twitter_url" id="twitter_url" class="form-control">
                          </div>
                          <div class="form-group col-md-6">
                              <label>Instagram Url</label>
                              <input type="text" value="{{$settings->instagram_url}}" name="instagram_url" id="instagram_url" class="form-control">
                          </div>
                          <div class="form-group col-md-6">
                              <label>Youtube Url</label>
                              <input type="text" value="{{$settings->youtube_url}}" name="youtube_url" id="youtube_url" class="form-control">
                          </div>
                          <div class="form-group col-md-6">
                              <label>Appstore Url</label>
                              <input type="text" value="{{$settings->appstore_url}}" name="appstore_url" id="appstore_url" class="form-control">
                          </div>
                          <div class="form-group col-md-6">
                              <label>Playstore Url</label>
                              <input type="text" value="{{$settings->playstore_url}}" name="playstore_url" id="playstore_url" class="form-control">
                          </div>
                          <div class="form-group col-md-12">
                              <textarea name="invoice_footer" id="invoice_footer" class="tinymce">
                              <?php echo $settings->invoice_footer; ?>
                              </textarea>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Basic Editor end -->

      </div>
    </div>
</div>
@endsection
@section('extra-js')
<script src="/app-assets/vendors/js/editors/tinymce/tinymce.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/editors/editor-tinymce.js" type="text/javascript"></script>


<script>
$('.settings').addClass('active');

</script>
@endsection