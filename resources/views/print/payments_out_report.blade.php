<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sales Report</title>
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
           Sales Report
          </th>
        </tr>
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Vendor</th>
            <th>Total</th>
            <th>Service Charge</th>
            <th>Commission</th>
            <th>Payable Amount</th>
            <th>Status</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $total = 0;
        ?>
        @foreach($orders as $key => $row)
        <tr style="font-weight:bold !important;font-size:18px;">
            <td>{{$row->id}}</td>
            <td>{{date('d-m-Y',strtotime($row->date))}}</td>
            <td>{{\App\Http\Controllers\Admin\ReportController::viewvendor($row->vendor_id)}}</td>
            <td>{{$row->total}} </td>
            <td>{{$row->service_charge}} </td>
            <td>{{$row->commission_amount}} </td>
            <?php $payable_amount = ($row->total - $row->commission_amount) - $row->service_charge; ?>
            <td>{{$payable_amount}} </td>
            <td>
                <?php 
                if($row->paid_status == 0){
                    echo 'Un Paid';
                }
                elseif($row->paid_status == 1){
                    echo 'Paid';
                }
                ?>
            </td>
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
