
@extends('site.layouts.app')
@section('main_content')

        <!-- ========================= SECTION ITEMS ========================= -->

<!-- Breadcrumbs -->

<div class="cont maincont">
  <h1><span>Catalog</span></h1>


  <!-- Catalog Items - start -->

  <!--Side bar start-->

  @include('site.inc.left-sidebar')

          <!--Side Bar end-->

  <div class="section-list">

    @if(count($findSubCategoryItem)>0)
      @foreach ($findSubCategoryItem as $subCategoryItem)
        <div class="sectls"> <a href="{{ url('/itemdetails').'/'.$subCategoryItem->id }}" class="sectls-img">
            <img src="{{ url('/uploads/ItemImages').'/'.$subCategoryItem->item_images[0] }}" alt="item Image.jpg" alt=""> </a>

          <div class="sectls-cont">
            <div class="sectls-ttl-wrap">
              <p><a href="#">Helmets</a></p>
              <h3><a href="{{ url('/itemdetails').'/'.$subCategoryItem->id }}">{{ $subCategoryItem->item_name }}</a></h3>
            </div>
            <div class="sectls-price-wrap">
              <p>Price</p>
              <p class="sectls-price">${{ $subCategoryItem->sale_price }}</p>
            </div>
            <div class="sectls-qnt-wrap">
              <p>Code</p>
              <p class="sectls-price">{{ $subCategoryItem->model_no }}</p>

            </div>
            <div class="sectls-qnt-wrap">
              <p>Size</p>
              <p class="sectls-price">{{ $subCategoryItem->item_size }}</p>

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
            <p class="sectls-id"> &nbsp; &nbsp; &nbsp;id {{$subCategoryItem->model_no}}</p>
            <p class="sectls-id">

            <p class="sectls-add">Total : ${{ $subCategoryItem->sale_price }}</p>
            </p>
            <p class="sectls-add"> <a href="{{ url('/itemdetails').'/'.$subCategoryItem->id }}">Add to cart</a> </p>

            <!--<p class="sectls-favorites">
                  <a href="#"></a>
              </p>
              <p class="sectls-compare">
                  <a href="#"></a>
              </p>-->
          </div>
        </div>
      @endforeach
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
