@extends('website.layouts')
@section('extra-css')

@endsection
@section('content')
<main class="translate main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop <span></span> Wishlist
            </div>
        </div>
    </div>
    <div class="container mb-30 mt-50">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="mb-50">
                    <h1 class="heading-2 mb-10">Your Wishlist</h1>
                    <!-- <h6 class="text-body">There are <span class="text-brand">5</span> products in this list</h6> -->
                </div>
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <!-- <th class="custome-checkbox start pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                                    <label class="form-check-label" for="exampleCheckbox11"></label>
                                </th> -->
                                <th style="width:50%;" class="custome-checkbox start pl-30" scope="col" colspan="2">Product</th>
                                <th style="width:20%;" scope="col">Price</th>
                                <th style="width:20%;" scope="col">Stock Status</th>
                                <!-- <th scope="col">Action</th> -->
                                <th style="width:10%;" scope="col" class="end">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $row)
                            <tr class="pt-30">
                                <!-- <td class="custome-checkbox pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                    <label class="form-check-label" for="exampleCheckbox1"></label>
                                </td> -->
                                <td class="image product-thumbnail pt-40"><img src="/product_image/{{$row->image}}" alt="#" /></td>
                                <td class="product-des product-name">
                                    <h6><a class="product-name mb-10" href="/product-details/{{$row->id}}">{{$row->product_name}}</a></h6>
                                </td>
                                <td class="price" data-title="Price">
                                    <h3 class="text-brand">KWD {{$row->sales_price}}</h3>
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    @if($row->stock_status == '0')
                                    <span class="stock-status in-stock mb-0">In Stock </span>
                                    @else
                                    <span class="stock-status in-stock mb-0">Out of Stock </span>
                                    @endif
                                </td>
                                <!-- <td class="text-right" data-title="Cart">
                                    <button class="btn btn-sm">Add to cart</button>
                                </td> -->
                                <td class="action text-center" data-title="Remove">
                                    <a onclick="DeleteFavourite({{$row->id}})" href="#" class="text-body"><i class="fi-rs-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <!-- <th class="custome-checkbox start pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                                    <label class="form-check-label" for="exampleCheckbox11"></label>
                                </th> -->
                                <th style="width:50%;" class="custome-checkbox start pl-30" scope="col" colspan="2">Idea Book Title</th>
                                <th style="width:10%;" scope="col" class="end">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($idea_book as $row)
                            <tr class="pt-30">
                                <!-- <td class="custome-checkbox pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                    <label class="form-check-label" for="exampleCheckbox1"></label>
                                </td> -->
                                <td class="image product-thumbnail pt-40"><img src="/project_image/{{$row->image}}" alt="#" /></td>
                                <td class="product-des product-name">
                                    <h6><a class="product-name mb-10" href="/get-idea-details/{{$row->id}}">{{$row->title}}</a></h6>
                                </td>
                                <!-- <td class="text-right" data-title="Cart">
                                    <button class="btn btn-sm">Add to cart</button>
                                </td> -->
                                <td class="action text-center" data-title="Remove">
                                    <a onclick="DeleteFavouriteIdea({{$row->id}})" href="#" class="text-body"><i class="fi-rs-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('extra-js')
<script type="text/javascript">
function Delete(id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/customer/delete-favourites/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            Swal.fire({
                text: 'Successfully Removed',
                icon: "success",
            }).then(function() {
                location.reload();
            });
        }
      });
    } 
}
</script>
@endsection