@extends('site.layouts.app')
@section('main_content')

    <div class="cont maincont">

        @include('site.inc.left-sidebar')

        <div class="row">
            <div class="col-75" style="margin-top:10%;">

                {{--<a href="{{url('/order_confirm')}}">Login Here</a>--}}
                <h4>Shipping Method</h4>
                <hr/>
                <form class="form-register" id="" action="{{url('/shipping_method')}}" method="post">
                    {{ csrf_field() }}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="customer_firstName"></label>
                            <input type="radio" class="" id="" name="shipping_method" value="home_delivery"  autocomplete="off" required>Home Delivery
                            <input type="radio" class="" id="" name="shipping_method" value="office_collection"  autocomplete="off" required>Office Collection

                        </div>


                        <div class="form-group">
                            <input type="submit" name="btn" class="form-control btn btn-success" value="GoToPayment">
                        </div>
                    </div>
                </form>
                <br/>

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