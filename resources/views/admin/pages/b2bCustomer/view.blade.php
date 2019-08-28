@extends('admin.layouts.app')
@section('content')
  <div class="container-fluid pl-4">
    <div class="row">
      <div class="col">
        <h4>View B2BCustomer Page</h4>
        <div class="table-responsive">
          <table class="table table-bordered"  width="100%" cellspacing="0">
            <thead>
              <tr>
                <th><b>B2BCustomer Info Column</b></th>
                <th><b>B2BCustomer Details</b></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Customer Name</td>
                @if($b2bCustomer->b2bCustomer_name != '')
                  <td>{{ $b2bCustomer->b2bCustomer_name }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Tag Line</td>
                @if($b2bCustomer->b2bCustomer_tag_line != '')
                  <td>{{ $b2bCustomer->b2bCustomer_tag_line }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Customer Address</td>
                @if($b2bCustomer->b2bCustomer_address != '')
                  <td>{{ $b2bCustomer->b2bCustomer_address }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Customer Code</td>
                @if($b2bCustomer->b2bCustomer_code != '')
                  <td>{{ $b2bCustomer->b2bCustomer_code }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Customer Website</td>
                @if($b2bCustomer->b2bCustomer_website != '')
                  <td>{{ $b2bCustomer->b2bCustomer_website }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Customer Contact Person</td>
                @if($b2bCustomer->b2bCustomer_contact_person != '')
                  <td>{{ $b2bCustomer->b2bCustomer_contact_person }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Customer Position</td>
                @if($b2bCustomer->b2bCustomer_position != '')
                  <td>{{ $b2bCustomer->b2bCustomer_position }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Customer Phone</td>
                @if($b2bCustomer->b2bCustomer_phone != '')
                  <td>{{ $b2bCustomer->b2bCustomer_phone }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Customer Mobile</td>
                @if($b2bCustomer->b2bCustomer_mobile != '')
                  <td>{{ $b2bCustomer->b2bCustomer_mobile }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Customer Email</td>
                @if($b2bCustomer->b2bCustomer_email != '')
                  <td>{{ $b2bCustomer->b2bCustomer_email }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Customer Title</td>
                @if($b2bCustomer->b2bCustomer_title != '')
                  <td>{{ $b2bCustomer->b2bCustomer_title }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Customer Is a Company</td>
                @if($b2bCustomer->b2bCustomer_is_company != '')
                  <td>{{ $b2bCustomer->b2bCustomer_is_company }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Active</td>
                @if($b2bCustomer->b2bCustomer_status != '')
                  <td>{{ $b2bCustomer->b2bCustomer_status }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Customer Logo</td>
                @if($b2bCustomer->b2bCustomer_logo != '')
                  <td>
                    <div class="row">
                      <div class="col-md-2">
                        <img src="{{ asset('uploads/b2bcustomer').'/'.$b2bCustomer->b2bCustomer_logo }}" alt="Customer Logo" width="60px" height="60px">
                      </div>
                    </div>
                  </td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>
            </tbody>
          </table>
          <a href="{{ route('b2bcustomers.index') }}"> <button type="button">Back</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection



