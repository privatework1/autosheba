@extends('site.layouts.app')
@section('content')

<div class="cont maincont">



  <div class="row">
    <div class="col-lg-3">
      <nav>
        <div class="title-category bg-secondary white d-none d-lg-block" style="margin-top:-53px">
          <span>Categories</span>
        </div>
        <ul class="menu-category">
          @if(count($allCategory)>0)
            @foreach($allCategory as $category)
              <li class="has-submenu">
                <a href="{{ url('/').'/items'.'/'.$category->category_name}}">
                  {{ $category->category_name }}
                  @if(count($allSubCategory)>0)
                    @foreach($allSubCategory as $subcategory)
                      @if( $subcategory->category_id == $category->id )
                        <span class="mt-2"><i class="fas fa-angle-right pull-right"></i></span>
                        @break;
                      @endif
                    @endforeach
                  @endif
                </a>
                <ul class="submenu">
                  @if(count($allSubCategory)>0)
                    @foreach($allSubCategory as $subcategory)
                      @if( $subcategory->category_id == $category->id )
                        <li> <a href="{{ url('/').'/items'.'/'.$category->category_name.'/'.$subcategory->subcategory_name}}">{{ $subcategory->subcategory_name }} </a></li>
                      @endif
                    @endforeach
                  @endif
                </ul>
              </li>
            @endforeach
          @else
            <li>No Category Found.</li>
          @endif
        </ul>
      </nav>
    </div>



    <div class="col-lg-5 bg-info" style="margin-left:10%;">
      <h1>Registration Form</h1>
      <br/>
      <form id="createCustomerForm" role="form" action="{{ url('/register/customers') }}" method="POST">
        <div class="box-body">
          {{ csrf_field() }}


          <div class="form-group">
            <label for="customer_name">First Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" autocomplete="off" required>
            @if ($errors->has('first_name'))
              <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_name') }}</small>
            @endif
          </div>


          <div class="form-group">
            <label for="customer_name">Last Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" autocomplete="off" required>
            @if ($errors->has('last_name'))
              <small class="text-danger font-weight-bold errortext">{{ $errors->first('last_name') }}</small>
            @endif
          </div>




          <div class="form-group">
            <label for="customer_name">UserName <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter customer name" autocomplete="off" required>
            @if ($errors->has('customer_name'))
              <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_name') }}</small>
            @endif
          </div>

          <div class="form-group">
            <label for="customer_email">Email <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="customer_email" name="customer_email" placeholder="Enter customer email" autocomplete="off" required>
            @if ($errors->has('customer_email'))
              <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_email') }}</small>
            @endif
          </div>

          <div class="form-group">
            <label for="customer_phone">Phone <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Enter customer phone" autocomplete="off" required>
            @if ($errors->has('customer_phone'))
              <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_phone') }}</small>
            @endif
          </div>

          <div class="form-group">
            <label for="password">Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter customer password" autocomplete="off" required>
            @if ($errors->has('password'))
              <small class="text-danger font-weight-bold errortext">{{ $errors->first('password') }}</small>
            @endif
          </div>

          <div class="form-group">
            <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" autocomplete="off" required>
            @if ($errors->has('password_confirmation'))
              <small class="text-danger font-weight-bold errortext">{{ $errors->first('password_confirmation') }}</small>
            @endif
          </div>


          <div class="form-group">
            <label for="">Address <span class="text-danger">*</span></label>
            <textarea class="form-control" id="password" name="address"  placeholder="" autocomplete="off" required></textarea>

          </div>
        </div>
        <button type="submit" name="submit" id="createCustomerFormBtn" class="btn btn-success w-100">
          Register
        </button>
        <p class="mt-2"><span>Already Registered? Please <a href="{{ url('/login/customers') }}"> Log In Your Account.</a></span></p>
      </form>
    </div>





  </div>






        <!--login=========================================================-->
        @if ($errors->has('success'))
          <div class="alert alert-success mt-2" role="alert">
            {{ $errors->first('success') }}
          </div>
        @endif

























</div>

@endsection
