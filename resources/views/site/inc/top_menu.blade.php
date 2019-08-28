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
        <li class="has-child"> <a href="catalog.html">Category</a> <i class="fa fa-angle-down"></i>
            <ul>
                @foreach($allCategory as $category)
                <li><a href="{{ url('/').'/items'.'/'.$category->category_name}}">{{ $category->category_name }}</a></li>
                @endforeach

            </ul>
        </li>
        <li class="has-child"> <a href="#">Product List</a> <i class="fa fa-angle-down"></i>
            <ul>

                @foreach($allSubCategory as $subcategory)
                <li><a href="{{ url('/').'/subitems'.'/'.$subcategory->subcategory_name}}">{{ $subcategory->subcategory_name }}</a></li>
                @endforeach


            </ul>
        </li>
        <li class="has-child"> <a href="#">Brands</a> <i class="fa fa-angle-down"></i>
            <ul>
                @foreach($brands as $brand)
                <li><a href="{{ url('/').'/branditems'.'/'.$brand->brand_name}}">{{$brand->brand_name}}</a></li>
                @endforeach

            </ul>
        </li>
        <li> <a href="contacts.html">Service</a> </li>


    </ul>
</nav>