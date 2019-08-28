@extends('admin.layouts.app')
@section('content')
  <div class="container-fluid">
    <div class="col-md-12 mt-3">
      <h4>Manage Product</h4>
      <hr/>
      <div class="table-responsive">
        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>SL.</th>
              <th>Product Code</th>
              <th>Product Name</th>
              <th>Product Category</th>
              <th>Product Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $sl=1; ?>
            @if(count($allProduct)>0)
              @foreach($allProduct as $product)
                <tr>
                  <td><?php echo $sl; ?></td>
                  <td>{{ $product->product_code }}</td>
                  <td>{{ $product->product_name }}</td>
                  <td>{{ $product->product_category }}</td>
                  <td>{{ $product->product_price }}</td>
                  <td >
                    <div class="btn-group" role="group">
                      <a href="{{ url('/') }}/products/{{$product->id}}/edit"><button class="btn btn-success btn-sm"><i class="far fa-edit"></i></button></a>&nbsp;
                      <form role="form" action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to delete product link?');" ><i class="far fa-trash-alt"></i></button>
                      </form>
                    </div>
                  </td>
                </tr>
                <?php $sl++; ?>
              @endforeach
            @else
              <tr>
                <td>No product Found.</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
