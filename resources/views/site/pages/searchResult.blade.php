@extends('site.layouts.app')
@section('main_content')

        <!-- ========================= SECTION ITEMS ========================= -->

<!-- Breadcrumbs -->

<div class="cont maincont">
  <h1><span>Search Item</span></h1>


  <!-- Catalog Items - start -->

  <!--Side bar start-->

  @include('site.inc.left-sidebar')

          <!--Side Bar end-->

  <div class="section-list">

    @if(count($allSearchEntity)>0)
      @foreach ($allSearchEntity as $searchEntity)
        <div class="sectls"> <a href="{{ url('/itemdetails').'/'.$searchEntity->id }}" class="sectls-img">
            <img src="{{ url('/uploads/ItemImages').'/'.$searchEntity->item_images[0] }}" alt="item Image.jpg" alt=""> </a>

          <div class="sectls-cont">
            <div class="sectls-ttl-wrap">
              <p><a href="#">Helmets</a></p>
              <h3><a href="{{ url('/itemdetails').'/'.$searchEntity->id }}">{{ $searchEntity->item_name }}</a></h3>
            </div>
            <div class="sectls-price-wrap">
              <p>Price</p>
              <p class="sectls-price">${{ $searchEntity->sale_price }}</p>
            </div>
            <div class="sectls-qnt-wrap">
              <p>Quantity</p>
              <p class="qnt-wrap sectls-qnt"> <a href="#" class="qnt-minus sectls-minus">-</a>
                <input type="text" value="1">
                <a href="#" class="qnt-plus sectls-plus">+</a> </p>
            </div>
            <div class="sectls-qnt-wrap">
              <p>Size</p>
              <p class="qnt-wrap sectls-qnt"> <a href="#" class="qnt-minus sectls-minus">-</a>
                <input type="text" value="1">
                <a href="#" class="qnt-plus sectls-plus">+</a> </p>
            </div>

            <!--<div class="sectls-total-wrap">
                  <p>Total</p>
                  <p class="sectls-total">$200</p>
              </div>-->
          </div>

          <div class="sectls-info">
            <!--<div class="sectls-rating-wrap">
                  <p class="sectls-rating">
                      <i class="fa fa-star-o" title="5"></i><i class="fa fa-star-o" title="4"></i><i class="fa fa-star-o" title="3"></i><i class="fa fa-star-o" title="2"></i><i class="fa fa-star-o" title="1"></i>
                  </p>
                  <p><span class="sectls-rating-count">89</span> reviews</p>
              </div>-->
            <p class="sectls-id"> &nbsp; &nbsp; &nbsp;id {{$searchEntity->model_no}}</p>
            <p class="sectls-id">

            <p class="sectls-add">Total : $200</p>
            </p>
            <p class="sectls-add"> <a href="#">Add to cart</a> </p>

            <!--<p class="sectls-favorites">
                  <a href="#"></a>
              </p>
              <p class="sectls-compare">
                  <a href="#"></a>
              </p>-->
          </div>
        </div>
      @endforeach
      @else
      <h4>No Item Found in your Search Entity.</h4>
    @endif


  </div>

</div>

<!-- Get a Special Deals -->
<div class="getspec-wrap">
  <div class="cont getspec">
    <div class="getspec-cont">
      <h3>Winter is coming</h3>
      <p>New snowmobile parts</p>
      <form action="#">
        <input type="text" placeholder="Email address">
        <input type="submit" value="Get a special deals">
      </form>
    </div>
    <a href="#" class="getspec-img"> <img src="http://placehold.it/573x319" alt=""> </a> </div>
</div>
<!-- ========================= SECTION ITEMS .END// ========================= -->
@endsection
