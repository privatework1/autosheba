
<?php
$allCategory = App\Category::orderBy('created_at', 'DESC')->get();
$brands = App\Brand::orderBy('created_at', 'DESC')->get();
?>

<div class="side_bar">
    <div class="side_con">
        <h2>Search by Category</h2>
    </div>
    <ul>
        @foreach($allCategory as $category)
            <li><a href="{{ url('/').'/items'.'/'.$category->category_name}}">{{$category->category_name}}</a></li>
        @endforeach

    </ul>

    <div class="side_con">
        <h2>Search by Brand</h2>
    </div>
    <ul>
        @foreach($brands as $brand)
            <li><a href="{{ url('/').'/branditems'.'/'.$brand->brand_name}}">{{$brand->brand_name}}</a></li>
        @endforeach

    </ul>
</div>