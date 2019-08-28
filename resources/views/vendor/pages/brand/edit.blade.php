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

        <form id="editBrandForm" role="form" action="{{ route('vendor-site-brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
          <fieldset class="scheduler-border">
            <legend class="scheduler-border">Edit Brand</legend>
            <div class="box-body">
              {{ method_field('PUT') }}
              {{ csrf_field() }}
              <div class="form-group">
                <label for="brand_name">Brand Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter Brand Name" autocomplete="off" value="{{ $brand->brand_name }}" required>
                @if ($errors->has('brand_name'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('brand_name') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="brand_details">Brand Details</label>
                <div class="controls">
                <textarea class="form-control" id="brand_details" name="brand_details" rows="3" placeholder="Brand Details"> {{ $brand->brand_details }}</textarea>
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

              @if($brand->brand_images != null)
                <div class="form-group">
                  <label for="brandImages">Current Brand Image</label>
                  <div class="row">
                    @foreach($brand->brand_images as $image)
                      <div class="col-md-3">
                        <img src="{{ asset('uploads/BrandImages').'/'.$image }}" alt="Brand Image" width="80px" height="80px">
                      </div>
                    @endforeach
                  </div>
                </div>
              @endif
            </div>
            <button type="submit" class="pl-3 pr-3">Update</button>  <a href="{{ route('vendor-site-brands.index') }}"><button type="button" class="pl-3 pr-3">View</button></a>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
@endsection
