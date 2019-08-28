@extends('site.layouts.app')
@section('main_content')
  <div class="cont maincont">
    <style>
      input[type=password] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
      }
    </style>

    <!--Side bar start-->

    @include('site.inc.left-sidebar')







      <div class="row">
      <div class="col-75">
        <div class="container">

          <div class="row">
            <div class="col-25">

              <h4><span>Register and save time!</span></h4>
              <p>Register with us for future convenience:</p>
              <br>
              <p><i class="fa fa-check-circle text-primary"></i> Fast and easy check out</p>
              <p><i class="fa fa-check-circle text-primary"></i> Easy access to your order history and status</p>
              <br>

              <h4>Registration form</h4>

              <br>
              <form id="createCustomerForm" role="form" action="{{ url('/register/customers') }}" method="POST">

                {{ csrf_field() }}
              <label>First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" autocomplete="off" required>
                @if ($errors->has('first_name'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_name') }}</small>
                @endif

                <label>Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" autocomplete="off" required>
                @if ($errors->has('last_name'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('last_name') }}</small>
                @endif

                <label for="customer_name">UserName <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter customer name" autocomplete="off" required>
                @if ($errors->has('customer_name'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_name') }}</small>
                @endif

                <label for="customer_email">Email <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="customer_email" name="customer_email" placeholder="Enter customer email" autocomplete="off" required>
                @if ($errors->has('customer_email'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_email') }}</small>
                @endif

                <label for="customer_phone">Phone <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Enter customer phone" autocomplete="off" required>
                @if ($errors->has('customer_phone'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_phone') }}</small>
                @endif

                <label for="password">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter customer password" autocomplete="off" required>
                @if ($errors->has('password'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('password') }}</small>
                @endif

                <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                <input type="password" class="" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" autocomplete="off" required>
                @if ($errors->has('password_confirmation'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('password_confirmation') }}</small>
                @endif

                <label for="">Address <span class="text-danger">*</span></label>
                <textarea class="form-control" style="width:100%;" rows="5" cols="30" id="password" name="address"  placeholder="" autocomplete="off" required></textarea>


                <button type="submit" name="submit" id="createCustomerFormBtn" class="btn btn-success w-100">
                  Register
                </button>
                </form>


            </div>
          <div class="col-25">
            <form id="customerLogin" role="form" action="{{ url('login/customers') }}" method="post">
              {{ csrf_field() }}
              <h2><span>Login</span></h2>
              <p>Already registered? Please log in below:</p>


              <label>Email address</label>
              <input class="" type="text" name="email" placeholder="Email Address">

              <label>Password</label>
              <input class="" type="password" name="password" placeholder="Password Here">

              <p><a href="#">Forgot your password?</a></p>
              <button class="btn" type="submit">Login</button>
            </form>
          </div>

          </div>

        </div>
      </div>
    </div>














    </div>


@endsection

