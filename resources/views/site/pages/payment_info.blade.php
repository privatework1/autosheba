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

            input[type=email] {
                width: 100%;
                margin-bottom: 20px;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }

            select{
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
            <a href="{{url('/order_confirm')}}" class="btn-outline-secondary">Back</a>

        </div>
        <div class="row">

            <div class="col-75" style="margin-top:10%;">
                <h4>Payment Form</h4>
               <hr/>
                @if(count($cartProducts) > 0)
                <form class="form-register" id="" action="{{url('/payment')}}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="customer_address">Payment Type</label>
                        <div class="controls">
                            <select name="payment_type" class="form-control paymentType" required>
                                <option value="">Select Option</option>
                                @foreach($payment_type as $type)
                                    <option value="{{$type->payment_type_name}}">{{$type->payment_type_name}}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>

                    <div id="bankinfo"></div>

                    <div class="form-group">
                        <input type="submit" name="btn" class="form-control btn btn-info" value="Place Order">
                    </div>
                </form>
                @else
                    <h1>Please At First Shopping to Cart</h1>
                @endif
            </div>



            <div class="col-35">
                <div class="container">
                    <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{$cartCount}}</b></span></h4>
                    <br>
                    <?php
                    $sl = 1;
                    $total = 0;
                    ?>
                    @foreach($cartProducts as $cartProduct)
                        <p style="padding:5px 0"><a href="#">{{ $cartProduct->name }}</a> <span class="price">${{$cartProduct->price}}</span></p>
                        <?php
                        $sl++;
                        $total = $total + ($cartProduct->qty*$cartProduct->price);
                        ?>
                    @endforeach

                    <hr>
                    <p>Total <span class="price" style="color:black"><b>$<?php echo $total;Session::put('orderTotal',$total);?></b></span></p>
                </div>
            </div>


        </div>


        </div>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


    <script>

        $('.paymentType').on('change', function()
        {
            $id=this.value;
            alert($id);

            $.ajax({
                url:"{{url('/paymenttype')}}/"+$id,
                success:function(data){
                    $("#bankinfo").html(data);
                }
            })
        });
    </script>



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
