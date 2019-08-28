@extends('vendor.layouts.app')
@section('content')
  <div class="container-fluid">
    <div class="col-md-12 mt-3">
      <h4>Manage Brands</h4>
      <hr/>
      <div class="table-responsive">
        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>SL.</th>
              <th>Brand Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $sl=1; ?>
            @if(count($brands)>0)
              @foreach($brands as $brand)
                <tr>
                  <td><?php echo $sl; ?></td>
                  <td>{{ $brand->brand_name }}</td>
                  <td >
                    <div class="btn-group" role="group">
                      <a href="{{ route('vendor-site-brands.show', $brand->id) }}"> <button class="btn btn-success btn-sm"><i class="fas fa-eye"></i> View</button></a>&nbsp;
                      <a href="{{ url('/') }}/vendor-site-brands/{{$brand->id}}/edit"><button class="btn btn-warning btn-sm"><i class="far fa-edit"></i></button></a>&nbsp;
                      <form role="form" action="{{ route('vendor-site-brands.destroy', $brand->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to delete Brand?');" ><i class="far fa-trash-alt"></i></button>
                      </form>
                    </div>
                  </td>
                </tr>
                <?php $sl++; ?>
              @endforeach
            @else
              <tr>
                <td>No Brand Found.</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
