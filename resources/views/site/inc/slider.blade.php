<?php
use App\Banner;
$sliders=Banner::where('type','=','slider')->get();

?>

<div class="frontslider-wrap">
    <div class="responisve-container">
        <div class="slider" id="front-slider">

            @foreach( $sliders as $photo )
            <div class="slide"> <img src="{{ $photo->banner_image }}"
                                     data-position="12,430" data-in="fade" data-delay="0" data-out="fade" alt="American Legends">
                <p 		class="caption1"
                          data-position="50,0" data-in="right" data-step="0" data-out="fade" data-delay="0">{{ $photo->title }}</p>
                <p 		class="caption2"
                          data-position="150,0" data-in="right" data-step="0" data-out="fade" data-delay="0">{{ $photo->descriptoin }}</p>
            </div>
                @endforeach


        </div>
    </div>
</div>