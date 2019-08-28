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
        <div class="col-65">
            <div class="container">
                <form class="form-register" id="" action="{{url('/shipping')}}" method="post">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <br>
                            <label for="fname"><i class="fa fa-user"></i>First Name</label>
                            <input type="text" class="form-control" id="customer_firstName" name="customer_firstName" placeholder="First Name" autocomplete="off" required>

                            <label for="fname"><i class="fa fa-user"></i>Last Name</label>
                            <input type="text" class="form-control" id="customer_firstName" name="customer_lastName" placeholder="First Name" autocomplete="off" required>

                            <label for="email"><i class="fa fa-envelope"></i> Phone</label>
                            <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Phone" autocomplete="off" required>

                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Email" autocomplete="off" required>


                            <label for=""><i class="fa fa-lock"></i> Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" required>

                            <div class="form-group">
                                <label for="customer_phone">Division</label>
                                <select name="division_id" class="form-control divisionTodistrict" onchange="divisionTodistrict(this.value)" required>
                                    <option value="">Select Division</option>
                                    @foreach($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->division_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div id="districtInfo"></div>

                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <textarea style="width: 100%;" class="form-control" id="customer_address" name="address" rows="3" placeholder="Address" required></textarea>



                        </div>

                    </div>
                    <label>
                        <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                    </label>
                    <input type="submit" value="Plece Order" class="btn">
                </form>
            </div>
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
                <p>Total <span class="price" style="color:black"><b>$<?php echo $total;?></b></span></p>
            </div>
        </div>
    </div>
</div>

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
                    $("#districtInfo").html(data);

                }
            })
        }
        else{
            $("#districtInfo").html("");
        }

    }


</script>

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
