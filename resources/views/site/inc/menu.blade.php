<?php
$photos=App\Banner::all();
$allCategory = App\Category::orderBy('created_at', 'DESC')->get();
$brands = App\Brand::orderBy('created_at', 'DESC')->get();
$allSubCategory = App\SubCategory::orderBy('created_at', 'DESC')->get();
$items = App\Item::orderBy('created_at', 'DESC')->get();
?>

<nav id="top-menu">
    <ul>
        <!--<li class="active">
                  <a href="index.html">Home</a>
              </li>-->


        @if( count($allCategory)>0)
            @foreach($allCategory as $category)
                <li class="has-child">
                    <a href="{{ url('/').'/items'.'/'.$category->category_name}}">
                        {{ $category->category_name }}

                    </a>
                    @if(count($allSubCategory)>0)
                        @foreach($allSubCategory as $subcategory)
                            @if( $subcategory->category_id == $category->id )
                                <i class="fa fa-angle-down"></i>   @break;
                            @endif
                        @endforeach
                    @endif

                    <ul>
                        @if(count($allSubCategory)>0)
                            @foreach($allSubCategory as $subcategory)
                                @if( $subcategory->category_id == $category->id )
                                    <li><a href="{{ url('/').'/items'.'/'.$category->category_name.'/'.$subcategory->subcategory_name}}">{{ $subcategory->subcategory_name }}</a></li>
                                @endif
                            @endforeach
                        @endif

                    </ul>
                </li>
            @endforeach
        @endif




        <li class="has-child"> <a href="blog.html">Brands</a> <i class="fa fa-angle-down"></i>
            <ul>
                @if(!empty($brands))
                    @foreach($brands as $brand)
                        <li><a href="{{ url('/').'/items'.'/'.$brand->brand_name}}">{{$brand->brand_name}}</a></li>
                    @endforeach
                @endif

            </ul>
        </li>
        <li> <a href="contacts.html">Service</a> </li>


    </ul>
</nav>