@extends('site.pages.customerProfile.layouts.app')
@section('content')

<!-- Main Content - start -->
@if(!empty($shipping))
  <div class="row">
    <div class="col">
      @if(Session::has('message'))
       <span class="btn btn-success">{{Session::get('message')}}</span>
      @endif

      <form class="form-register" id="" action="{{url('/customershipping_update')}}" method="post">
        {{ csrf_field() }}

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="customer_firstName">First Name</label>
            <input type="text" class="form-control" id="customer_firstName" name="customer_firstName" value="{{$shipping->first_name}}" placeholder="First Name" autocomplete="off" required>
            @if ($errors->has('customer_firstName'))
              <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_firstName') }}</small>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label for="customer_lastName">Last Name</label>
            <input type="text" class="form-control" id="customer_lastName" name="customer_lastName" value="{{$shipping->last_name}}" placeholder="Last Name" autocomplete="off" required>
            @if ($errors->has('customer_lastName'))
              <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_lastName') }}</small>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="customer_email">Email</label>
          <input type="email" class="form-control" id="customer_email" name="customer_email" value="{{$shipping->email}}" placeholder="Email" autocomplete="off" required>
          @if ($errors->has('customer_email'))
            <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_email') }}</small>
          @endif
        </div>
        <br/>
        <div class="form-group">
          <label for="customer_phone">Phone</label>
          <input type="text" class="form-control" id="customer_phone" name="customer_phone" value="{{$shipping->phone}}" placeholder="Phone" autocomplete="off" required>
          @if ($errors->has('customer_phone'))
            <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_phone') }}</small>
          @endif
        </div>

        {{--<div class="form-group">--}}
        {{--<label for="customer_phone">Password</label>--}}
        {{--<input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" required>--}}
        {{--@if ($errors->has('password'))--}}
        {{--<small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_password') }}</small>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--<br/>--}}


        <div class="form-group">
          @if(!empty($shipping))
            (Division:{{$shipping->division_name}},
            District:{{$shipping->district_name}}
            )
          @endif
          <label for="customer_phone">Division</label>
          <select name="division_id" class="form-control divisionTodistrict" onchange="divisionTodistrict(this.value)" required>
            @if(!empty($shipping))
              @foreach($divisions as $division)
                <option value="{{$division->id}}" {{$division->id==$shipping->division_id?'selected':''}}>{{$division->division_name}}</option>

              @endforeach



            @else
            @endif
          </select>
        </div>


        <div id="shippingDistrictInfo">
          @if(!empty($shipping))

            <div class="form-group">

              <label for="customer_phone">District</label>
              <input readonly type="text" name="" class="form-control" value="{{$shipping->district_name}}">
            </div>

            <div class="form-group">

              <label for="customer_phone">Delivery Process</label>
              <input readonly type="text" name="" class="form-control" value="{{$shipping->shipping_method_name}}">
            </div>
          @endif
        </div>

        <div id="districtInfo"></div>

        <div class="form-group">
          <label for="customer_address">Address</label>
          <div class="controls">
            <textarea class="form-control" id="customer_address" name="address" rows="3" placeholder="Address" required>@if(!empty($shipping)){{$shipping->address}}@endif</textarea>
          </div>
          @if ($errors->has('customer_address'))
            <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_address') }}</small>
          @endif
        </div>


        <div class="form-group">
          <input type="submit" name="btn" class="form-control btn btn-success" value="Update">
        </div>
      </form>
    </div>
  </div>
@else
        <h1>Please At First Shopping</h1>
@endif
<!-- Main Content - end -->
@endsection

<script>

  {{--$('.divisionTodistrict').on('change', function()--}}
  {{--{--}}
  {{--$id=this.value;--}}

  {{--$.ajax({--}}
  {{--url:"{{url('/divisionTodistrict')}}/"+$id,--}}
  {{--success:function(data){--}}
  {{--$("#districtInfo").html(data);--}}
  {{--}--}}
  {{--})--}}
  {{--});--}}

  function divisionTodistrict(str){

    if(str!=""){
      $.ajax({
        url:"{{url('/divisionTodistrict')}}/"+str,
        success:function(data){
          $('#shippingDistrictInfo').html("");
          $("#districtInfo").html(data);

        }
      })
    }
    else{
      $("#districtInfo").html("");
    }

  }


</script>
