@extends('site.layouts.app')

@section('main_content')
        <?php
                use App\Item;
        ?>
@include('site.inc.slider')
        <!-- Special Deals Items -->
<div class="specials-wrap">
  <div class="cont specials">
    <h2>New Product</h2>

    <div class="specials-list">







                {{ csrf_field() }}
                <div id="post_data"></div>







    </div>
    {{--<p class="special-more"> <a href="#">show more</a> </p>--}}
  </div>
</div>

<!-- Get a Special Deals -->
<div class="getspec-wrap">
  <div class="cont getspec">
    <div id="slider">
      <figure>


          @foreach($banners as $banner)
              <h3>{{$banner->title}}</h3>
          <img src="{{ $banner->banner_image }}" alt="slider">

              @endforeach

      </figure>
    </div>
  </div>
</div>

<!-- Popular Items -->
<div class="populars-wrap">
  <div class="cont populars">
    <h2>Popular</h2>
    {{--<p class="populars-count">7 ITEMS</p>--}}
    <div class="populars-list">

        @if(!empty($finalorders))
            @foreach ($finalorders as $orders)
            <?php
        $populars=DB::table('order_details')->where('order_id',$orders->id)->get();

             ?>

            @foreach($populars as $popular)
            <?php
                    $popularitem=Item::where('item_name',$popular->item_name)->first();

                //$popularitem=DB::table('items')->where('id',$popular->item_id)->first();




            ?>
                <div class="popular"> <a href="{{ url('/itemdetails').'/'.$popularitem->id }}" class="popular-link">
                  <p class="popular-img">
                      @if(!empty($popularitem->item_images))

                          <img src="{{asset('uploads/ItemImages/'.$popularitem->item_images[0])}}" alt="">
                      @endif
                  </p>
                  <h3><span>{{$popular->item_name}}</span></h3>
                </a>
                <p class="popular-info"> <a href="#" class="popular-categ">{{$popularitem->model_no}}</a> <span class="popular-price">${{$popularitem->sale_price}}</span> <a href="{{ url('/itemdetails').'/'.$popularitem->id }}" class="popular-add">+ Add to cart</a> </p>
              </div>
            @endforeach
        @endforeach

            @endif



    </div>

  </div>
</div>


<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){

        var _token = $('input[name="_token"]').val();

        load_data('', _token);

        function load_data(id="", _token)
        {
            $.ajax({
                url:"{{ route('loadmore.load_data') }}",
                method:"POST",
                data:{id:id, _token:_token},
                success:function(data)
                {

                    $('#load_more').remove();



                    $('#post_data').append(data);

                }
            })
        }

        $(document).on('click', '#load_more_button', function(){
            var id = $(this).data('id');
            $('#load_more_button').append('<b>Loading...</b>');
            load_data(id, _token);
        });

    });
    </script>
@endsection
