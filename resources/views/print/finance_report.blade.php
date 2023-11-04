<!DOCTYPE html>
<html lang="en">
<head>
  <title>Finance Report</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="<?php echo asset(''); ?>admin-assets/css/style.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
    <table class="table table-bordered">
    <thead>
        <tr>
          <th style="text-align:center;" colspan="6">
           Finance Report
          </th>
        </tr>
    <thead>
        <tr>
            <th>#</th>
            <th>Vendor</th>
            <th>Total Orders</th>
            <th>Sub Total</th>
            <th>Coupon Value</th>
            <th>Shipping Charge</th>
            <th>Service Charge</th>
            <th>Total</th> 
        </tr>
    </thead>
    <tbody>
        <?php
        $total = 0;
        ?>
        @foreach($datas as $key => $row)
        <tr style="font-weight:bold !important;font-size:18px;">
            <td>{{$key + 1}}</td>
            <td>{{\App\Http\Controllers\Admin\ReportController::viewvendor($row['vendor_id'])}}</td>
            <td>{{$row['total_orders']}} </td>
            <td>{{$row['sub_total']}} </td>
            <td>{{$row['discount_value']}} </td>
            <td>{{$row['shipping_charge']}} </td>
            <td>{{$row['service_charge']}} </td>
            <td>{{$row['total']}} </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
  </div>

</div>


</div>

</body>
</html>
