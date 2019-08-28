@extends('vendor.layouts.app')
@section('content')
  <div class="container-fluid pl-4">
    <div class="row">
      <div class="col">
        <h4>View Categories Page</h4>
        <div class="table-responsive">
          <table class="table table-bordered"  width="100%" cellspacing="0">
            <thead>
            <tr>
              <th><b>Categories Info Column</b></th>
              <th><b>Categories Details</b></th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>Category Name</td>
              <td>{{ $category->category_name}}</td>
            </tr>

            @if($categoryType != null)
              <tr>
                <td>Category Type</td>
                <td>{{ $categoryType->category_type}}</td>
              </tr>
            @endif

            @if($category->category_details != null)
              <tr>
                <td>Category Details</td>
                <td>{{ $category->category_details}}</td>
              </tr>
            @endif
            </tbody>
          </table>
          <a href="{{ route('vendor-site-categories.index') }}"> <button type="button">Back</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection
