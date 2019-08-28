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
        <h4>Edit Company</h4>
        <hr/>
        <form id="editCompanyForm" role="form" action="{{ route('companies.update', $company->id) }}" method="post">
          <div class="box-body">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
              <label for="company_name">Company Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name" value="{{ $company->company_name }}" autocomplete="off" required>
              @if ($errors->has('company_name'))
                <small class="text-danger font-weight-bold errortext">{{ $errors->first('company_name') }}</small>
              @endif
            </div>
          </div>
          <button type="submit" name="submit" id="editCompanyFormBtn" class="btn btn-success">
            Update 
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection
