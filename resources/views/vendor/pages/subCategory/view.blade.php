@extends('vendor.layouts.app')
@section('content')
  <div class="container-fluid pl-4">
    <div class="row">
      <div class="col">
        <h4>View Sub-Categories Page</h4>
        <div class="table-responsive">
          <table class="table table-bordered"  width="100%" cellspacing="0">
            <thead>
              <tr>
                <th><b>Sub-Categories Info Column</b></th>
                <th><b>Sub-Categories Details</b></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Sub-Category Name</td>
                <td>{{ $subcategory->subcategory_name}}</td>
              </tr>

              <tr>
                <td>Category Name</td>
                <td>{{ $category->category_name}}</td>
              </tr>

              @if($subcategory->subcategory_details != null)
                <tr>
                  <td>Sub-Category Details</td>
                  <td>{{ $subcategory->subcategory_details}}</td>
                </tr>
              @endif
            </tbody>
          </table>
          <a href="{{ route('vendor-site-subcategories.index') }}"> <button type="button" class="pl-3 pr-3">Back</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection
