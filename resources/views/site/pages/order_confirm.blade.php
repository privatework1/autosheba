@extends('site.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 mt-3">
                <h4>Shipping Login</h4>
                <hr/>

                    <form role="form" action="{{ url('/shipping-login') }}" method="post">
                        <div class="form-row">
                            {{ csrf_field() }}
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="@if(Session::get('shippingId')){{Session::get('shippingEmail')}}@endif" placeholder="Enter Email" autocomplete="off" required>
                                @if ($errors->has('email'))
                                    <small class="text-danger font-weight-bold errortext">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="passwordLogin" name="password" value="@if(Session::get('shippingId')){{Session::get('shippingPassword')}}@endif" placeholder="Enter Password" autocomplete="off" required>
                                @if ($errors->has('password'))
                                    <small class="text-danger font-weight-bold errortext">{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Log in</button>
                    </form>






                <br/>
                <h4>Don't Have An Account?</h4>
                <a href="{{ url('/shipping') }}"><button type="button" class="btn btn-success w-50"> Create Account</button></a>
            </div>
            <div class="col-md-9 mt-3">
                @if(count($cartProducts) > 0)
                    <div class="row">
                        <div class="col">
                            <h4>Order Summery</h4>
                            <hr/>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>

                                            <th scope="col">Item Image</th>
                                            <th scope="col">Item</th>
                                            <th scope="col">Color</th>
                                            <th scope="col">BackgroundColor</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Sub Total(TK)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sl = 1;
                                            $total = 0; 
                                        ?>
                                        @foreach($cartProducts as $cartProduct)
                                            <tr>

                                                <td><img src="{{ url('/') }}/uploads/ItemImages/{{ $cartProduct->options->image }}" width="80px" height="80px"></td>
                                                <td>{{ $cartProduct->name }}</td>
                                                <td>{{ $cartProduct->options->color }}</td>
                                                <td><div style="width:30px;height: 30px;background:<?php echo $cartProduct->options->color;  ?>"></div></td>
                                                <td>{{ $cartProduct->price}}</td>
                                                <td>
                                                    {{--<form class="form-register" id="" action="{{url('/updatecart_quantity')}}" method="post">--}}
                                                        {{--{{csrf_field()}}--}}

                                                        {{--<input type="number" name="quantity" value="{{ $cartProduct->qty }}" min="1" style="width:40%;">--}}
                                                        {{--<input type="hidden" name="quantityId" value="{{ $cartProduct->rowId }}">--}}
                                                        {{--<input type="submit" name="submit" value="update" class="item_add hvr-outline-out button2">--}}
                                                        {{-- <button type="submit" name="submit" value="update" class="item_add hvr-outline-out button2">Update</button> --}}


                                                    {{--</form>--}}

                                                    <input type="number" max="10" min="1"
                                                           value="{{$cartProduct->qty}}" class="qty-fill"
                                                           id="upCart{{$cartProduct->id}}">

                                                    <input type="hidden" value="{{$cartProduct->rowId}}"
                                                           id="rowID{{$cartProduct->id}}"/>

                                                </td>
                                                <td>{{ $cartProduct->qty*$cartProduct->price }}</td>
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
                                            <td class="text-right"><b>Total</b></td>
                                            <td><?php echo $total;?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-right" colspan="4" style=""><b>Discount:</b></td>
                                            <td><?php
                                                $discount=0.00;
                                                echo $discount.' Tk';?></td>

                                        </tr>

                                        <tr>
                                            <td class="text-right" colspan="4" style=""><b>Grand Total:</b></td>
                                            <td><?php echo $total-$discount  .' Tk';?></td>

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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            @foreach($cartProducts as $item)
            $("#upCart{{$item->id}}").on('change keyup', function () {

                var newQty = $("#upCart{{$item->id}}").val();

                var rowID = $("#rowID{{$item->id}}").val();
                $.ajax({
                    url: '{{url('/cart/update')}}',
                    data: 'rowID=' + rowID + '&newQty=' + newQty,
                    type: 'get',
                    success: function (response) {
//            $("#CartMsg").show();
//            console.log(response);
//            $("#CartMsg").html(response);
                        // if true (1)
                        setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 100);

                    }


                });
            });
            @endforeach
        });
    </script>
@endsection
