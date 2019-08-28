@extends('admin.layouts.app')
@section('content')
  <div class="container-fluid">
    <div class="col-md-12 mt-3">
      <h4>Manage B2BCustomer</h4>
      <hr/>
      <div class="table-responsive">
        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>SL.</th>
              <th>Customer Name</th>
              <th>Customer Address</th>
              <th>Customer Code</th>
              <th>Customer Mobile</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $sl=1; ?>
            @if(count($b2bcustomers)>0)
              @foreach($b2bcustomers as $b2bcustomer)
                <tr>
                  <td><?php echo $sl; ?></td>
                  <td>{{ $b2bcustomer->b2bCustomer_name }}</td>
                  <td>{{ $b2bcustomer->b2bCustomer_address }}</td>
                  <td>{{ $b2bcustomer->b2bCustomer_code }}</td>
                  <td>{{ $b2bcustomer->b2bCustomer_mobile }}</td>
                  <td >
                    <div class="btn-group" role="group">
                      <a href="{{ route('b2bcustomers.show', $b2bcustomer->id) }}"> <button class="btn btn-success btn-sm"><i class="fas fa-eye"></i> View</button></a>&nbsp;
                      <a href="{{ url('/') }}/b2bcustomers/{{$b2bcustomer->id}}/edit"><button class="btn btn-warning btn-sm"><i class="far fa-edit"></i></button></a>&nbsp;
                      <form role="form" action="{{ route('b2bcustomers.destroy', $b2bcustomer->id) }}" method="POST">
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
                <td>No B2BCustomer Found.</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
