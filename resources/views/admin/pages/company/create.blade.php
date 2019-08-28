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
        <h4>Add Company</h4>
        <hr/>
        <form id="createCompanyForm" role="form" action="{{ route('companies.store') }}" method="POST">
          <div class="box-body">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="company_name">Company Name</label>
              <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name" autocomplete="off">
              @if ($errors->has('company_name'))
                <small class="text-danger font-weight-bold errortext">{{ $errors->first('company_name') }}</small>
              @endif
            </div>
          </div>
          <button type="submit" name="submit" id="createCompanyFormBtn" class="btn btn-success">
            Create 
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection
