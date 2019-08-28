@extends('site.pages.customerProfile.layouts.app')
@section('content')
<!-- Main Content - start -->
<div class="row">
  <div class="col">
    <div>

        @if(Session::has('message'))
            <span class="btn btn-success">{{Session::get('message')}}</span>
            <br/>

            <?php
            $orderinfo=DB::table('orders')->where('customer_id',Session::get('customerId'))->first();
            echo "Order Code: ".$orderinfo->order_code;
            ?>
        @endif

    </div>
    <span>Account Information</span> <span><a href="{{url('editcustomerProfile/'.base64_encode(Session::get('customerId')))}}" class="btn-info btn-sm">Edit</a></span>
    <br/><br/>

      <?php
      $customerInfo=DB::table('customers')->where('id',Session::get('customerId'))->first();
      ?>

    <table class="table table-bordered">
        <thead class="table-info">
            <tr>
                <th scope="col">Account Column</th>
                <th scope="col">Account Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><b>Name</b></td>
                <td>{{ $customerInfo->name }}</td>
            </tr>
            <tr>
                <td><b>Email</b></td>
                <td>{{ $customerInfo->email }}</td>
            </tr>
            <tr>
                <td><b>Phone</b></td>
                <td>{{ $customerInfo->phone }}</td>
            </tr>
            <tr>
                <td><b>Address</b></td>
                <td>{{$customerInfo->address }}</td>
            </tr>
        </tbody>
    </table>
  </div>
</div>
<!-- Main Content - end -->
@endsection
