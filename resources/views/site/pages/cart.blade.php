@extends('site.layouts.app')
@section('main_content')
  <div class="cont maincont">

    <!--Side bar start-->
    @include('site.inc.left-sidebar')
    <div class="section-list cart-list">
      <?php
      $sl = 1;
      $total = 0;
      ?>
      @foreach($cartItems as $cartItem)
      <div class="sectls"> <a href="product.html" class="sectls-img">
          <img src="{{ url('/') }}/uploads/ItemImages/{{ $cartItem->options->image }}" alt="">
        </a>
        <div class="sectls-cont">
          <div class="sectls-ttl-wrap">
            <p><a href="#">{{ $cartItem->options->size }}</a></p>
            <h3><a href="#">{{$cartItem->name}}</a></h3>
          </div>
          <div class="sectls-price-wrap">
            <p>Price</p>
            <p class="sectls-price">{{$cartItem->price}} </p>
          </div>
          <div class="sectls-qnt-wrap">
            <p>Quantity</p>
            <p class="qnt-wrap sectls-qnt">
              <input type="number" max="10" min="1"
                     value="{{$cartItem->qty}}" class="qty-fill"
                     id="upCart{{$cartItem->id}}">

              <input type="hidden" value="{{$cartItem->rowId}}"
                     id="rowID{{$cartItem->id}}"/>
            </p>
          </div>
          <div class="sectls-total-wrap">
            <p>Amount</p>
            <p class="sectls-total">{{ $cartItem->qty*$cartItem->price }}</p>

          </div>


        </div>

        <div class="sectls-info">

          <div class="sectls-rating-wrap">
            <p class="sectls-rating"> <i class="fa fa-star-o" title="5"></i><i class="fa fa-star-o" title="4"></i><i class="fa fa-star-o" title="3"></i><i class="fa fa-star-o" title="2"></i><i class="fa fa-star-o" title="1"></i> </p>
            <p><span class="sectls-rating-count">89</span> reviews</p>
          </div>
          <p class="sectls-id">Size: {{$cartItem->options->size}}</p>
          <p class="sectls-add"> <a href="{{ url('/cart-remove/'.$cartItem->rowId) }}">Remove from cart</a> </p>
          <p class="sectls-favorites"> <a href="#"></a> </p>
          <p class="sectls-compare"> <a href="#"></a> </p>
        </div>
        <?php
        $sl++;
        $total = $total + ($cartItem->qty*$cartItem->price);
        ?>

      </div>
        @endforeach







       <div class="MyTotal" style="">
         <a class="" style="float:right;">Total: {{ $total}}</a>

         <br/>
         <br/>
         </div>




    </div>


     <div class="mainDiv" style="">
       <div style="float:right;">
         <a href="{{ url('/order_confirm') }}" class="btn btn-warning">
           Proceed To Checkout
         </a>

       </div>

       <div>
         <a href="{{ url('/') }}" class="btn btn-info">
           Continue Shopping
         </a>
       </div>

     </div>





    </div>

  </div>


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {


      @foreach($cartItems as $item)
      $("#upCart{{$item->id}}").on('change', function () {


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

