@extends('vendor.layouts.app')
@section('content')
  <div class="container-fluid pl-4">
    <div class="row">
      <div class="col">
        <h4>View Item Page</h4>
        <div class="table-responsive">
          <table class="table table-bordered"  width="100%" cellspacing="0">
            <thead>
              <tr>
                <th><b>Item's Info Column</b></th>
                <th><b>Items Details</b></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Item Name</td>
                @if($item->item_name != '')
                  <td>{{ $item->item_name }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Item Category</td>
                @if($item->item_category != '')
                  <td>{{ $item->item_category }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Item Type</td>
                @if($item->item_type != '')
                  <td>{{ $item->item_type }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Item Subcategory</td>
                @if($item->item_subcategory != '')
                  <td>{{ $item->item_subcategory }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Item Supplier</td>
                @if($item->item_supplier != '')
                  <td>{{ $item->item_supplier }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Cost Price</td>
                @if($item->cost_price != '')
                  <td>{{ $item->cost_price }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Sale Price</td>
                @if($item->sale_price != '')
                  <td>{{ $item->sale_price }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Tax Rate</td>
                @if($item->tax_rate != '')
                  <td>{{ $item->tax_rate }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Reorder Quantity</td>
                @if($item->reorder_quantity != '')
                  <td>{{ $item->reorder_quantity }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Item Description</td>
                @if($item->item_description != '')
                  <td>{{ $item->item_description }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Warrenty</td>
                @if($item->warrenty != '')
                  <td>{{ $item->warrenty }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Warrenty Type</td>
                @if($item->warrenty_type != '')
                  <td>{{ $item->warrenty_type }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Warrenty End Date</td>
                @if($item->warrenty_end_date != '')
                  <td>{{ $item->warrenty_end_date }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Warrenty Details</td>
                @if($item->warrenty_details != '')
                  <td>{{ $item->warrenty_details }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Item Color</td>
                @if($item->color != '')
                  <td>{{ $item->color }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Item Part of</td>
                @if($item->part_of != '')
                  <td>{{ $item->part_of }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Item Model No</td>
                @if($item->model_no != '')
                  <td>{{ $item->model_no }}</td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>

              <tr>
                <td>Item Images</td>
                @if($item->item_images != '')
                  <td>
                    <div class="row">
                      @foreach($item->item_images as $image)
                        <div class="col-md-2">
                          <img src="{{ asset('uploads/ItemImages').'/'.$image }}" alt="Item Image" width="100px" height="100px">
                        </div>
                      @endforeach
                    </div>
                  </td>            
                @else
                  <td>No Data Found.</td>
                @endif
              </tr>
            </tbody>
          </table>
          <a href="{{ route('vendor-site-items.index') }}"> <button type="button">Back</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection