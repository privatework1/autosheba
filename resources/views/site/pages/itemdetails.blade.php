@extends('site.layouts.app')
@section('main_content')
        <style>
          .myslider ul li{
            list-style: none;;
          }
        </style>



        <!-- Breadcrumbs -->
<div class="b-crumbs-wrap">
  <div class="cont b-crumbs">
    <ul>
      <li> <a href="index.html">Motor</a></li>
      <li> <a href="catalog.html">Catalog</a></li>
      <li> <a href="catalog.html">Helmets</a></li>
      <li> <span>Motorcycle sport helmet</span></li>
    </ul>
  </div>
</div>

<div class="cont maincont">

  <!--Side bar start-->

  @include('site.inc.left-sidebar')



  <div class="prod">

  <!-- Product Slider - start -->
  <div class="prod-slider-wrap">
    <div class="flexslider prod-slider" id="prod-slider">
      <ul class="slides">

        @if(!empty($item->item_images))


          @foreach($item->item_images as $image)
        <li>
          <!-- <a> & <img> Without Spaces -->
          <a data-fancybox-group="prod" class="fancy-img" href="">
            <img src="{{asset('uploads/ItemImages/'.$image)}}" alt="" style=""></a>
        </li>
          @endforeach
          @endif




      </ul>
    </div>
    <div class="flexslider prod-thumbs" id="prod-thumbs">
      <ul class="slides">
        @if(!empty($item->item_images))
          @foreach($item->item_images as $image)
            <li> <img src="{{asset('uploads/ItemImages/'.$image)}}" alt=""> </li>
          @endforeach
          @endif

      </ul>
    </div>
  </div>




  <!-- Product Slider - end -->

  <!-- Product Content - start -->
  <div class="prod-cont">
    <div class="prod-desc">
      <p class="prod-desc-ttl"><span>Description</span></p>
      <p id="smalltext">{{substr($item->item_description,0,10)}} <a id="prod-showdesc" href="#" class="read-more">read more</a></p>
      <p id="bigtext">
        {{$item->item_description}}

        <a id="prod-showdesc" href="#" class="read-less">read less</a></p>

    </div>
    <div class="prod-props">
     <div class="row">
       <div class="col-75">
         {!! base64_decode($item->item_feature) !!}
       </div>
     </div>
    </div>

    <form role="form" action="{{ url('/cart-add') }}" method="post">
      {{ csrf_field() }}
    <div class="prod-info">
      <div class="prod-price-wrap">
        <p>Price</p>
        <p class="prod-price">${{$item->sale_price}}</p>
      </div>
      <div class="prod-qnt-wrap">
        <p>Size</p>
        @if(!empty($sizes))
          <select name="item_size">
            @foreach($sizes as $size)
              <option value="{{$size}}">{{$size}}</option>
            @endforeach

          </select>
        @endif
      </div>
      <div class="prod-qnt-wrap">
        <p>Quantity</p>

          <input type="number" name="qty" min="1" value="1" style="width:50%;">
      </div>
      <div class="prod-total-wrap">
        {{--<p>Total</p>--}}
        {{--<p class="prod-total">$3900</p>--}}
      </div>
      <!--<div class="prod-shipping-wrap">
                <p>Shipping</p>
                <p class="prod-shipping">Free</p>
            </div>-->
    </div>
    <div class="prod-actions">
      <div class="prod-rating-wrap">
        <p class="prod-rating"> <i class="fa fa-star-o" title="5"></i><i class="fa fa-star-o" title="4"></i><i class="fa fa-star-o" title="3"></i><i class="fa fa-star-o" title="2"></i><i class="fa fa-star-o" title="1"></i> </p>
        <p><span class="prod-rating-count">89</span> reviews</p>
      </div>
      <!--<p class="prod-compare">
                <a href="#"></a>
            </p>
            <p class="prod-favorites">
                <a href="#"></a>
            </p>-->
      <input type="hidden" name="itemById" value="{{ $item->id }}">
      <button type="submit" name="submit" class="btn bg-info pull-right">Add to Cart</button>
    </div>
      </form>




  </div>
  <!-- Product Content - end -->

</div>
        <!-- Product - end -->


        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script>
    $(window).load(function(){
    $("#bigtext").css("display","none");
    $('.read-more').click(function() {
      $('#smalltext').hide();
      $('#bigtext').show();
    });

      $('.read-less').click(function() {
        $('#bigtext').hide();
        $('#smalltext').show();
      });
  })

  </script>




@endsection
