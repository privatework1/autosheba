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

        <form id="createCustomerForm" role="form" action="{{ route('b2bcustomers.store') }}" method="POST" enctype="multipart/form-data">
          <fieldset class="scheduler-border">
            <legend class="scheduler-border">Add Customer</legend>
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="customer_name">Customer Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter Customer Name" autocomplete="off" required>
                @if ($errors->has('customer_name'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_name') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="tag_line">Tag Line</label>
                <input type="text" class="form-control" id="tag_line" name="tag_line" placeholder="Enter Tag Line" autocomplete="off">
                @if ($errors->has('tag_line'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('tag_line') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="customer_address">Address <span class="text-danger">*</span></label>
                <textarea class="form-control" id="customer_address" name="customer_address" rows="3" placeholder="Enter Customer Address" required></textarea>
                @if ($errors->has('customer_address'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_address') }}</small>
                @endif
              </div>

              <div class="form-group">
                  <label for="customer_code">Code <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="customer_code" readonly name="customer_code" value="<?php echo str_random(5); ?>" placeholder="Enter Customer Code" autocomplete="off" required>
                  @if ($errors->has('customer_code'))
                    <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_code') }}</small>
                  @endif
                </div>

              <div class="form-group">
                <label for="customer_website">Website</label>
                <input type="text" class="form-control" id="customer_website" name="customer_website" placeholder="Enter Website Url" autocomplete="off">
                @if ($errors->has('customer_website'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_website') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="contact_person">Contact Person</label>
                <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter Contact Person" autocomplete="off">
                @if ($errors->has('contact_person'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('contact_person') }}</small>
                @endif
              </div>

              <div class="form-group">
                  <label for="customer_position">Position</label>
                  <input type="text" class="form-control" id="customer_position" name="customer_position" placeholder="Enter Customer Position" autocomplete="off">
                  @if ($errors->has('customer_position'))
                    <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_position') }}</small>
                  @endif
                </div>

              <div class="form-group">
                <label for="customer_phone">Phone No</label>
                <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Enter Customer Phone" autocomplete="off">
                @if ($errors->has('customer_phone'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_phone') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="customer_mobile">Mobile No <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="customer_mobile" name="customer_mobile" placeholder="Enter Customer Mobile" autocomplete="off" required>
                @if ($errors->has('customer_mobile'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_mobile') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="customer_email">Email</label>
                <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Enter Customer Email" autocomplete="off">
                @if ($errors->has('customer_email'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_email') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="customer_title">Title</label>
                <input type="text" class="form-control" id="customer_title" name="customer_title" placeholder="Enter Customer Title" autocomplete="off">
                @if ($errors->has('customer_title'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_title') }}</small>
                @endif
              </div>

              <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="is_company" name="is_company" value="Yes"/>
                    <label class="form-check-label" for="is_company">Is a Company</label>
                </div>

                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="Yes"/>
                  <label class="form-check-label" for="is_active">Active</label>
                </div>
              </div>

              <div class="form-group">
                <label for="customerLogo">Customer Logo</label>
                <input type="file" class="form-control-file" id="customerLogo" name="customerLogo">
                @if ($errors->has('customerLogo'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('customerLogo') }}</small>
                @endif
              </div>
            </div>
            <button type="submit" class="pl-3 pr-3">Save</button>  <a href="{{ route('b2bcustomers.index') }}"><button type="button" class="pl-3 pr-3">View</button></a>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
@endsection
