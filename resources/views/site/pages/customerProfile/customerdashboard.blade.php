@extends('site.pages.customerProfile.layouts.app')
@section('content')
<!-- Main Content - start -->
<div class="row">
  <div class="col">
    @if(Session::has('customerId'))
       <?php
            $customer=DB::table('customers')->where('id',Session::get('customerId'))->first();
      ?>
      @endif
    <h1>Welcome {{$customer->first_name." ".$customer->last_name}}</h1>
  </div>
</div>
<!-- Main Content - end -->
@endsection
