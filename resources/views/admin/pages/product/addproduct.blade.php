@extends('admin.layouts.app')
@section('content')
<div class="container-fluid pl-4">
  <div class="row">
    <div class="col-md-6">
      @if ($errors->has('success'))
        <div class="alert alert-success mt-2" role="alert">
          {{ $errors->first('success') }}
        </div>
      @endif
      <h4>Add Product</h4>
      <hr/>
      <form id="createProductForm" role="form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" autocomplete="off" required>
            @if ($errors->has('product_name'))
              <small class="text-danger font-weight-bold errortext">{{ $errors->first('product_name') }}</small>
            @endif
          </div>

          <div class="form-group">
            <label for="product_category">Product Category</label>
            <select class="form-control" id="product_category" name="product_category" required>
              <option value="">Select Product Category</option>
              @if(count($allCategory)>0)
                @foreach($allCategory as $category)
                  <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                @endforeach
              @endif
            </select>
            @if ($errors->has('product_category'))
              <small class="text-danger font-weight-bold errortext">{{ $errors->first('product_category') }}</small>
            @endif
          </div>

          <div class="form-group" id="subCategoryDiv" style="display:none;">
            <label for="product_subcategory">Product SubCategory</label>
            <select class="form-control" id="product_subcategory" name="product_subcategory" required>
            </select>
            @if ($errors->has('product_subcategory'))
              <small class="text-danger font-weight-bold errortext">{{ $errors->first('product_subcategory') }}</small>
            @endif
          </div>

          <div class="form-group">
            <label for="product_price">Product Price</label>
            <input type="number" class="form-control" id="product_price" name="product_price" placeholder="Enter Product Price" autocomplete="off" required>
            @if ($errors->has('product_price'))
              <small class="text-danger font-weight-bold errortext">{{ $errors->first('product_price') }}</small>
            @endif
          </div>

          <div class="form-group">
            <label for="product_details">Product Details</label>
            <div class="controls">
                <textarea class="form-control" id="product_details" name="product_details" rows="3" placeholder="Product Details"></textarea>
            </div>
            @if ($errors->has('product_details'))
                <small class="text-danger font-weight-bold errortext">{{ $errors->first('product_details') }}</small>
            @endif
          </div>

          <div class="form-group">
            <label for="productImages">Product Image</label>
            <input type="file" class="form-control-file" id="productImages" name="productImages[]" multiple>
            @if ($errors->has('productImages'))
                <small class="text-danger font-weight-bold errortext">{{ $errors->first('productImages') }}</small>
            @endif
          </div>
        </div>
        <button type="submit" name="submit" id="createProductFormBtn" class="btn btn-success">
          Save 
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
