@extends('site.layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6 mt-3">
        <h4>Login</h4>
        <hr/>
        <form class="card-body" id="createCustomerForm" role="form" action="{{ url('/registerFromOrderConfirm/customers') }}" method="post">
          <div class="box-body bg-light">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="customer_name">Name</label>
              <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter customer name" autocomplete="off">
              @if ($errors->has('customer_name'))
                <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_name') }}</small>
              @endif
            </div>

            <div class="form-group">
              <label for="customer_email">Email</label>
              <input type="text" class="form-control" id="customer_email" name="customer_email" placeholder="Enter customer email" autocomplete="off">
              @if ($errors->has('customer_email'))
                <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_email') }}</small>
              @endif
            </div>

            <div class="form-group">
              <label for="customer_phone">Phone</label>
              <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Enter customer phone" autocomplete="off">
              @if ($errors->has('customer_phone'))
                <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_phone') }}</small>
              @endif
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter customer password" autocomplete="off">
              @if ($errors->has('password'))
                <small class="text-danger font-weight-bold errortext">{{ $errors->first('password') }}</small>
              @endif
            </div>

            <div class="form-group">
              <label for="password_confirmation">Confirm Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" autocomplete="off">
              @if ($errors->has('password_confirmation'))
                <small class="text-danger font-weight-bold errortext">{{ $errors->first('password_confirmation') }}</small>
              @endif
            </div>
          </div>
          <button type="submit" name="submit" id="createCustomerFormBtn" class="btn btn-success">
            Register
          </button>
        </form>
        <br/>
        {{--<h4>Don't Have An Account?</h4>--}}
        {{--<a href="{{ url('/registerFromOrderConfirm/customers') }}"><button type="button" class="btn btn-success w-50"> Create Account</button></a>--}}
      {{----}}

      </div>
      <div class="col-md-6 mt-3">
        @if(count($cartProducts) > 0)
          <div class="row">
            <div class="col">
              <h4>Order Summery</h4>
              <hr/>
              <div class="table-responsive">
                <table class="table">
                  <thead class="thead-light">
                  <tr>
                    <th>SL.</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Item</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Sub Total</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sl = 1;
                  $total = 0;
                  ?>
                  @foreach($cartProducts as $cartProduct)
                    <tr>
                      <td>{{ $sl }}</td>
                      <td><img src="{{ url('/') }}/uploads/ItemImages/{{ $cartProduct->options->image }}" width="80px" height="80px"></td>
                      <td>{{ $cartProduct->name }}</td>
                      <td>{{ $cartProduct->qty }}</td>
                      <td>{{ $cartProduct->qty*$cartProduct->price }} Tk</td>
                    </tr>
                    <?php
                    $sl++;
                    $total = $total + ($cartProduct->qty*$cartProduct->price);
                    ?>
                  @endforeach
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right">Total</td>
                    <td><?php echo $total;?></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        @else
          <div class="row">
            <div class="col">
              <h4>Your Shopping Cart is empty.</h4>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection
