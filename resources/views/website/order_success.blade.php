@extends('website.layouts')
@section('extra-css')

@endsection
@section('content')

<div class="container mt-5 mb-5" id="orderSum">
   <div class="text-center p-5">
        <div class="row">
        <div class="col-sm-12">
            <span class="text-success"><i class="fas fa-badge-check" style="font-size: 60px;"></i></span><br><br>
            <h1 class="title text-success">Thanks for your Purchase !!</h1><br>
            <!-- <p class="f18">Your order id is 0000000034234023400</p> -->
            <p>We'll email you or confirmation with details and tracking information. </p>
            <p>For more information you need to contact. Please feel free to contact us admin@admin.com</p><br><br>

            <a href="/" class="btn btn-dark btn-lg">Countinue shopping</a>
        </div>
        </div>
    </div>
</div>

@endsection
@section('extra-js')
@endsection