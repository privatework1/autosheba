@extends('admin.layouts.app')
@section('content')
  <div class="container-fluid pl-4">
    <div class="row">
      <div class="col">
        <h4>View Brands Page</h4>
        <div class="table-responsive">
          <table class="table table-bordered"  width="100%" cellspacing="0">
            <thead>
              <tr>
                <th><b>Brands Info Column</b></th>
                <th><b>Brands Details</b></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Brand Name</td>
                <td>{{ $brand->brand_name}}</td>
              </tr>

              @if($brand->brand_details != null)
                <tr>
                  <td>Brand Details</td>
                  <td>{{ $brand->brand_details}}</td>
                </tr>
              @endif

              @if($brand->brand_images != null)
                <tr>
                  <td>Brand Images</td>
                  <td>
                    <div class="row">
                      @foreach($brand->brand_images as $image)
                        <div class="col-md-2">
                          <img src="{{ asset('uploads/BrandImages').'/'.$image }}" alt="Brand Image" width="60px" height="60px">
                        </div>
                      @endforeach
                    </div>
                  </td>
                </tr>
              @endif
            </tbody>
          </table>
          <a href="{{ route('brands.index') }}"> <button type="button" class="pl-3 pr-3">Back</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection
