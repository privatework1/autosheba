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

        <form id="createCategoryForm" role="form" action="{{ route('vendor-site-categories.store') }}" method="POST">
          <fieldset class="scheduler-border">
            <legend class="scheduler-border">Add Categories</legend>
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="category_name">Category Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category name" autocomplete="off" required>
                @if ($errors->has('category_name'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('category_name') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="category_type">Category Type1 <span class="text-success" id="addVendorCategoryType" style="font-size:18px;"><i class="fas fa-plus-circle"></i></span></label>
                <select class="form-control" id="vendor_category_type" name="category_type" required>
                  <option value="" disabled selected hidden>Select Category Type</option>
                  @if(count($allCategoryType)>0)
                    @foreach($allCategoryType as $categoryType)
                      <option value="{{ $categoryType->id }}">{{ $categoryType->category_type  }}</option>
                    @endforeach
                  @endif
                </select>
                @if ($errors->has('category_type'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('category_type') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="category_details">Category Details</label>
                <div class="controls">
                    <textarea class="form-control" id="category_details" name="category_details" rows="3" placeholder="Category Details"></textarea>
                </div>
                @if ($errors->has('category_details'))
                    <small class="text-danger font-weight-bold errortext">{{ $errors->first('category_details') }}</small>
                @endif
              </div>
            </div>
            <button type="submit" class="pl-3 pr-3">Save</button>  <a href="{{ route('vendor-site-categories.index') }}"><button type="button" class="pl-3 pr-3">View</button></a>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
@endsection
