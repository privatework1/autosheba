@extends('site.pages.customerProfile.layouts.app')
@section('content')
<!-- Main Content - start -->
<div class="row">
  <div class="col-md-6">
    @if(Session::has('message'))
      <span class="btn btn-secondary">{{Session::get('message')}}</span>
    @endif
    <br/>


    <form role="form" action="{{url('customerChangePassword')}}" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="currentPassword">Current Password <span class="text-danger">*</span></label>
        <input type="password" class="form-control" name="old_password" id="currentPassword" placeholder="Current Password" required>
      </div>

      <div class="form-group">
        <label for="password">Password <span class="text-danger">*</span></label>
        <input type="password" class="form-control" name="new_password" id="password" placeholder="Password" required>
      </div>

      <div class="form-group">
        <label for="password_confirm">Current Password <span class="text-danger">*</span></label>
        <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confirm Password" required>
      </div>
      <button type="submit" class="btn-primary">Change Password</button>
    </form>
  </div>
</div>
<!-- Main Content - end -->
@endsection
