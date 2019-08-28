@extends('admin.layouts.app')
@section('content')
  <div class="container-fluid pl-4">
    <div class="row">
      <div class="col">
        <h4>View Vendor Page</h4>
        <div class="table-responsive">
          <table class="table table-bordered"  width="100%" cellspacing="0">
            <thead>
              <tr>
                <th><b>Vendors Info Column</b></th>
                <th><b>Vendors Details</b></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Vendor Name</td>
                @if($vendor->vendor_name != '')
                  <td>{{ $vendor->vendor_name }}</td>
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Vendor Password/Code</td>
                @if($vendor->vendor_password != '')
                  <td>{{ $vendor->vendor_password }}</td>
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Tag Line</td>
                @if($vendor->vendor_tag_line != '')
                  <td>{{ $vendor->vendor_tag_line }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Vendor Address</td>
                @if($vendor->vendor_address != '')
                  <td>{{ $vendor->vendor_address }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Vendor Website</td>
                @if($vendor->vendor_website != '')
                  <td>{{ $vendor->vendor_website }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Vendor Authorized Person Name</td>
                @if($vendor->vendor_authorized_person_name != '')
                  <td>{{ $vendor->vendor_authorized_person_name }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Vendor Contact Reference</td>
                @if($vendor->vendor_contact_reference != '')
                  <td>{{ $vendor->vendor_contact_reference }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Vendor Phone</td>
                @if($vendor->vendor_phone != '')
                  <td>{{ $vendor->vendor_phone }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Vendor Mobile</td>
                @if($vendor->vendor_mobile != '')
                  <td>{{ $vendor->vendor_mobile }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Vendor Fax</td>
                @if($vendor->vendor_fax != '')
                  <td>{{ $vendor->vendor_fax }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Vendor Email</td>
                @if($vendor->vendor_email != '')
                  <td>{{ $vendor->vendor_email }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Vendor Title</td>
                @if($vendor->vendor_title != '')
                  <td>{{ $vendor->vendor_title }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Vendor Is a Company</td>
                @if($vendor->vendor_is_company != '')
                  <td>{{ $vendor->vendor_is_company }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Vendor Is Customer</td>
                @if($vendor->vendor_is_customer != '')
                  <td>{{ $vendor->vendor_is_customer }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Vendor Is a Supplier</td>
                @if($vendor->vendor_is_supplier != '')
                  <td>{{ $vendor->vendor_is_supplier }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Vendor Is Approved</td>
                @if($vendor->vendor_is_approved_vendor != '')
                  <td>{{ $vendor->vendor_is_approved_vendor }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Active</td>
                @if($vendor->vendor_status != '')
                  <td>{{ $vendor->vendor_status }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Vendor Logo</td>
                @if($vendor->vendor_logo != '')
                  <td>
                    <div class="row">
                      <div class="col-md-2">
                        <img src="{{ asset('uploads/Vendor').'/'.$vendor->vendor_logo }}" alt="Vendor Logo" width="60px" height="60px">
                      </div>
                    </div>
                  </td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>
            </tbody>
          </table>
          <a href="{{ route('vendors.index') }}"> <button type="button">Back</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection