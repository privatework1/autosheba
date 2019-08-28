@extends('vendor.layouts.app')
@section('content')
  <div class="container-fluid">
    <div class="col-md-12 mt-3">
      <h4>Manage Sub-Category</h4>
      <hr/>
      <div class="table-responsive">
        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>SL.</th>
              <th>Category ID</th>
              <th>Sub-Category Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $sl=1; ?>
            @if(count($subcategories)>0)
              @foreach($subcategories as $subcategory)
                <tr>
                  <td><?php echo $sl; ?></td>
                  <td>{{ $subcategory->category_id }}</td>
                  <td>{{ $subcategory->subcategory_name }}</td>
                  <td >
                    <div class="btn-group" role="group">
                        <a href="{{ route('vendor-site-subcategories.show', $subcategory->id) }}"> <button class="btn btn-success btn-sm"><i class="fas fa-eye"></i> View</button></a>&nbsp;
                      <a href="{{ url('/') }}/vendor-site-subcategories/{{$subcategory->id}}/edit"><button class="btn btn-warning btn-sm"><i class="far fa-edit"></i></button></a>&nbsp;
                      <form role="form" action="{{ route('vendor-site-subcategories.destroy', $subcategory->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to delete this subcategory?');" ><i class="far fa-trash-alt"></i></button>
                      </form>
                    </div>
                  </td>
                </tr>
                <?php $sl++; ?>
              @endforeach
            @else
              <tr>
                <td>No Sub-Categories Found.</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
