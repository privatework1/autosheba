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

        <form id="createBrandForm" role="form" action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
          <fieldset class="scheduler-border">
            <legend class="scheduler-border">Add Brand</legend>
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="brand_name">Brand Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter Brand Name" autocomplete="off" required>
                @if ($errors->has('brand_name'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('brand_name') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="brand_details">Brand Details</label>
                <div class="controls">
                    <textarea class="form-control" id="brand_details" name="brand_details" rows="3" placeholder="Brand Details"></textarea>
                </div>
                @if ($errors->has('brand_details'))
                    <small class="text-danger font-weight-bold errortext">{{ $errors->first('brand_details') }}</small>
                @endif
              </div>

              <div class="form-group">
                  <label for="brandImages">Brand Image</label>
                  <input type="file" class="form-control-file" id="brandImages" name="brandImages[]" multiple>
                  @if ($errors->has('brandImages'))
                      <small class="text-danger font-weight-bold errortext">{{ $errors->first('brandImages') }}</small>
                  @endif
                </div>
              </div>
            <button type="submit" class="pl-3 pr-3">Save</button>  <a href="{{ route('brands.index') }}"><button type="button" class="pl-3 pr-3">View</button></a>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
@endsection
