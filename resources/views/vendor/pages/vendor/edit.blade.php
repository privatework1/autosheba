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

        <form id="editVendorForm" role="form" action="{{ route('vendor-site.update', $vendor->id) }}" method="POST" enctype="multipart/form-data">
          <fieldset class="scheduler-border">
            <legend class="scheduler-border">Edit Vendor</legend>
            <div class="box-body">
              {{ method_field('PUT') }}
              {{ csrf_field() }}
              <div class="form-group">
                <label for="vendor_name">Vendor Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="vendor_name" name="vendor_name" placeholder="Enter Vendor Name" autocomplete="off" value="{{ $vendor->vendor_name }}" required>
                @if ($errors->has('vendor_name'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('vendor_name') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="tag_line">Tag Line</label>
                <input type="text" class="form-control" id="tag_line" name="tag_line" placeholder="Enter Tag Line" autocomplete="off" value="{{ $vendor->vendor_tag_line }}">
                @if ($errors->has('tag_line'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('tag_line') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="vendor_address">Address <span class="text-danger">*</span></label>
                <textarea class="form-control" id="vendor_address" name="vendor_address" rows="3" placeholder="Enter Vendor Address" required>{{ $vendor->vendor_address }}</textarea>
                @if ($errors->has('vendor_address'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('vendor_address') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="vendor_website">Website</label>
                <input type="text" class="form-control" id="vendor_website" name="vendor_website" placeholder="Enter Website Url" autocomplete="off" value="{{ $vendor->vendor_website }}">
                @if ($errors->has('vendor_website'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('vendor_website') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="authorized_person">Authorized Person Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="authorized_person" name="authorized_person" placeholder="Enter Authorized Person Name" autocomplete="off" value="{{ $vendor->vendor_authorized_person_name }}"  required>
                @if ($errors->has('authorized_person'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('authorized_person') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="contact_reference">Contact Reference</label>
                <input type="text" class="form-control" id="contact_reference" name="contact_reference" placeholder="Enter Contact Reference" autocomplete="off" value="{{ $vendor->vendor_contact_reference }}">
                @if ($errors->has('contact_reference'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('contact_reference') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="vendor_phone_no">Phone No</label>
                <input type="text" class="form-control" id="vendor_phone_no" name="vendor_phone_no" placeholder="Enter Vendor Phone No." autocomplete="off" value="{{ $vendor->vendor_phone }}">
                @if ($errors->has('vendor_phone_no'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('vendor_phone_no') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="vendor_mobile_no">Mobile No <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="vendor_mobile_no" name="vendor_mobile_no" placeholder="Enter Vendor Mobile No." autocomplete="off" value="{{ $vendor->vendor_mobile }}" required>
                @if ($errors->has('vendor_mobile_no'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('vendor_mobile_no') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="vendor_fax">Fax</label>
                <input type="text" class="form-control" id="vendor_fax" name="vendor_fax" placeholder="Enter Vendor Fax" autocomplete="off" value="{{ $vendor->vendor_fax }}">
                @if ($errors->has('vendor_fax'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('vendor_fax') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="vendor_email">Email</label>
                <input type="email" class="form-control" id="vendor_email" name="vendor_email" placeholder="Enter Vendor Email" autocomplete="off" value="{{ $vendor->vendor_email }}">
                @if ($errors->has('vendor_email'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('vendor_email') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="vendor_title">Title</label>
                <input type="text" class="form-control" id="vendor_title" name="vendor_title" placeholder="Enter Vendor Title" autocomplete="off" value="{{ $vendor->vendor_title }}">
                @if ($errors->has('vendor_title'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('vendor_title') }}</small>
                @endif
              </div>

              <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="is_company" name="is_company" value="{{ $vendor->vendor_is_company }}" <?php if($vendor->vendor_is_company == 'Yes'){echo "checked";}?>/>
                    <label class="form-check-label" for="is_company">Is a Company</label>
                </div>

                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="is_customer" name="is_customer" value="{{ $vendor->vendor_is_customer }}" <?php if($vendor->vendor_is_customer == 'Yes'){echo "checked";}?>/>
                  <label class="form-check-label" for="is_customer">Customer</label>
                </div>

                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="is_supplier" name="is_supplier" value="{{ $vendor->vendor_is_supplier }}" <?php if($vendor->vendor_is_supplier == 'Yes'){echo "checked";}?>/>
                  <label class="form-check-label" for="is_supplier">Supplier</label>
                </div>

                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="is_approved_vendor" name="is_approved_vendor" value="{{ $vendor->vendor_is_approved_vendor }}" <?php if($vendor->vendor_is_approved_vendor == 'Yes'){echo "checked";}?>/>
                  <label class="form-check-label" for="is_approved_vendor">Is approved vendor</label>
                </div>

                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="{{ $vendor->vendor_status }}" <?php if($vendor->vendor_status == 'Yes'){echo "checked";}?>/>
                  <label class="form-check-label" for="is_active">Active</label>
                </div>
              </div>

              <div class="form-group">
                <label for="vendorLogo">Vendor Logo</label>
                <input type="file" class="form-control-file" id="vendorLogo" name="vendorLogo">
                @if ($errors->has('vendorLogo'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('vendorLogo') }}</small>
                @endif
              </div>

              @if($vendor->vendor_logo != null)
                <div class="form-group">
                  <label for="vendorLogo">Current Vendor Logo</label>
                  <div class="row">
                    <div class="col-md-3">
                      <img src="{{ asset('uploads/Vendor').'/'.$vendor->vendor_logo }}" alt="Vendor Logo" width="80px" height="80px">
                    </div>
                  </div>
                </div>
              @endif
            </div>
            <button type="submit" class="pl-3 pr-3">Update</button>  <a href="{{ route('vendor-site.index') }}"><button type="button" class="pl-3 pr-3">View</button></a>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
@endsection
