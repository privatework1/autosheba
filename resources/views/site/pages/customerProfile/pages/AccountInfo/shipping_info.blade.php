@extends('site.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-3">
              <h4>Shipping Register Form</h4>
              <a href="{{url('/order_confirm')}}" class="text-right btn btn-outline-secondary">Login Here</a>
                <hr/>
                <form class="form-register" id="" action="{{url('/shipping')}}" method="post">
                    {{ csrf_field() }}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="customer_firstName">First Name</label>
                            <input type="text" class="form-control" id="customer_firstName" name="customer_firstName" placeholder="First Name" autocomplete="off" required>
                            @if ($errors->has('customer_firstName'))
                                <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_firstName') }}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="customer_lastName">Last Name</label>
                            <input type="text" class="form-control" id="customer_lastName" name="customer_lastName" placeholder="Last Name" autocomplete="off" required>
                            @if ($errors->has('customer_lastName'))
                                <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_lastName') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="customer_email">Email</label>
                        <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Email" autocomplete="off" required>
                        @if ($errors->has('customer_email'))
                            <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_email') }}</small>
                        @endif
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="customer_phone">Phone</label>
                        <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Phone" autocomplete="off" required>
                        @if ($errors->has('customer_phone'))
                            <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_phone') }}</small>
                        @endif
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="customer_address">Address</label>
                        <div class="controls">
                            <textarea class="form-control" id="customer_address" name="customer_address" rows="3" placeholder="Address" required></textarea>
                        </div>
                        @if ($errors->has('customer_address'))
                            <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_address') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btn" class="form-control btn btn-success" value="Register">
                    </div>
                </form>
                <br/>

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
                                        <td>
                                            <?php echo $total;

                                            ?></td>
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
