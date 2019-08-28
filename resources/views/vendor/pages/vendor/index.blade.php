@extends('vendor.layouts.app')
@section('content')
  <div class="container-fluid">
    <div class="col-md-12 mt-3">
      <h4>Manage Vendor</h4>
      <hr/>
      <div class="table-responsive">
        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>SL.</th>
              <th>Vendor Name</th>
              <th>Vendor Address</th>
              <th>Authorized Person Name</th>
              <th>Vendor Mobile No.</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $sl=1; ?>
            @if(count($vendors)>0)
              @foreach($vendors as $vendor)
                <tr>
                  <td><?php echo $sl; ?></td>
                  <td>{{ $vendor->vendor_name }}</td>
                  <td>{{ $vendor->vendor_address }}</td>
                  <td>{{ $vendor->vendor_authorized_person_name }}</td>
                  <td>{{ $vendor->vendor_mobile }}</td>
                  <td >
                    <div class="btn-group" role="group">
                      <a href="{{ route('vendors.show', $vendor->id) }}"> <button class="btn btn-success btn-sm"><i class="fas fa-eye"></i> View</button></a>&nbsp;
                      <a href="{{ url('/') }}/vendors/{{$vendor->id}}/edit"><button class="btn btn-warning btn-sm"><i class="far fa-edit"></i></button></a>&nbsp;
                      <form role="form" action="{{ route('vendors.destroy', $vendor->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to delete vendor link?');" ><i class="far fa-trash-alt"></i></button>
                      </form>
                    </div>
                  </td>
                </tr>
                <?php $sl++; ?>
              @endforeach
            @else
              <tr>
                <td>No Vendor Found.</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
