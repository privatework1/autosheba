@extends('vendor.layouts.app')
@section('content')
  <div class="container-fluid pl-4">
    <div class="row">
      <div class="col-md-6">
        @if ($errors->has('success'))
          <div class="alert alert-success mt-2" role="alert">
            {{ $errors->first('success') }}
          </div>
        @endif

        <form id="createsubCategoryForm" role="form" action="{{ route('vendor-site-subcategories.store') }}" method="POST">
          <fieldset class="scheduler-border">
            <legend class="scheduler-border">Add Sub-Categories</legend>
            <div class="box-body">
              {{ csrf_field() }}
              
              <div class="form-group">
                <label for="subcategory_name">Sub-Category Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="Enter Subcategory Name" autocomplete="off" required>
                @if ($errors->has('subcategory_name'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('subcategory_name') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="category">Category Name<span class="text-danger">*</span></label>
                <select class="form-control" id="category" name="category" required>
                    <option value="" disable selected hidden>Select Category</option>
                    @if(count($allCategory)>0)
                    @foreach($allCategory as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                    @endif
                </select>
                @if ($errors->has('category'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('category') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="subcategory_details">Sub-Category Details</label>
                <div class="controls">
                    <textarea class="form-control" id="subcategory_details" name="subcategory_details" rows="3" placeholder="Category Details"></textarea>
                </div>
                @if ($errors->has('subcategory_details'))
                    <small class="text-danger font-weight-bold errortext">{{ $errors->first('subcategory_details') }}</small>
                @endif
              </div>
            </div>
          <button type="submit" class="pl-3 pr-3">Save</button>  <a href="{{ route('vendor-site-subcategories.index') }}"><button type="button" class="pl-3 pr-3">View</button></a>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
@endsection
