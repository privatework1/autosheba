@extends('site.pages.customerProfile.layouts.app')
@section('content')
        <!-- Main Content - start -->
<div class="row">
    <div class="col">

        <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12 bg-info">
                <br/>
                <form id="" role="form" action="{{ url('/updatecustomerProfile/'.base64_encode(Session::get('customerId'))) }}" method="POST">
                    <div class="box-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="customer_name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter customer name" value="{{$editcustomer->name}}" autocomplete="off" required>
                            @if ($errors->has('customer_name'))
                                <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_name') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="customer_email">Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="customer_email" name="customer_email" value="{{$editcustomer->email}}" placeholder="Enter customer email" autocomplete="off" required>
                            @if ($errors->has('customer_email'))
                                <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_email') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="customer_phone">Phone <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="customer_phone" name="customer_phone" value="{{$editcustomer->phone}}" placeholder="Enter customer phone" autocomplete="off" required>
                            @if ($errors->has('customer_phone'))
                                <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_phone') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Address <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="password" name="address"  placeholder="" autocomplete="off" required>{{$editcustomer->address}}</textarea>

                        </div>


                    </div>
                    <button type="submit" name="submit" id="" class="btn btn-success w-100">
                        Update Profile
                    </button>

                </form>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- Main Content - end -->
@endsection
