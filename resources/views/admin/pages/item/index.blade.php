@extends('admin.layouts.app')
@section('content')
  <div class="container-fluid">
    <div class="col-md-12 mt-3">
      <h4>Manage Item</h4>
      <hr/>
      <div class="table-responsive">
        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>SL.</th>
              <th>Item Name</th>
              <th>Item Category</th>
              <th>Item Supplier</th>
              <th>Cost Price</th>
              <th>Feature</th>
              <th>Model No</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $sl=1; ?>
            @if(count($items)>0)
              @foreach($items as $item)
                <tr>
                  <td><?php echo $sl; ?></td>
                  <td>{{ $item->item_name }}</td>
                  <td>
                    @foreach ($categories as $category)
                      @if($category->id == $item->item_category)
                        {{ $category->category_name }}
                      @endif
                    @endforeach
                  </td>
                  <td>
                    @foreach ($vendors as $vendor)
                      @if($vendor->id == $item->item_supplier)
                        {{ $vendor->vendor_name }}
                      @endif
                    @endforeach
                  </td>
                  <td>{{ $item->cost_price }}</td>
                  <td>{!! base64_decode($item->item_feature) !!}</td>
                  <td>{{ $item->model_no }}</td>
                  <td >
                    <div class="btn-group" role="group">
                      <a href="{{ route('item.show', $item->id) }}"> <button class="btn btn-success btn-sm"><i class="fas fa-eye"></i> View</button></a>&nbsp;
                      <a href="{{ url('/') }}/item/{{$item->id}}/edit"><button class="btn btn-warning btn-sm"><i class="far fa-edit"></i></button></a>&nbsp;
                      <form role="form" action="{{ route('item.destroy', $item->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to this Item?');" ><i class="far fa-trash-alt"></i></button>
                      </form>
                    </div>
                  </td>
                </tr>
                <?php $sl++; ?>
              @endforeach
            @else
              <tr>
                <td>No Item Found.</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
