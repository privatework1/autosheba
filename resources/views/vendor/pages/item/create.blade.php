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

        <form id="createItemForm" role="form" action="{{ route('vendor-site-items.store') }}" method="POST" enctype="multipart/form-data">
          <fieldset class="scheduler-border">
            <legend class="scheduler-border">Add Item</legend>
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="item_name">Item Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Enter Item Name" autocomplete="off" required>
                @if ($errors->has('item_name'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('item_name') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="item_category">Item Category <span class="text-danger">*</span></label>
                <select class="form-control" id="vendor-site-item_category" name="item_category" required>
                  <option value="" disabled selected hidden>Select Category</option>
                  @if(count($allCategory)>0)
                    @foreach($allCategory as $category)
                      <option value="{{ $category->id }}">{{ $category->category_name  }}</option>
                    @endforeach
                  @endif
                </select>
                @if ($errors->has('item_category'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('item_category') }}</small>
                @endif
              </div>

              <div class="form-group" id="itemTypeDiv" style="display:none;">
                <label for="item_type">Item Type <span class="text-danger">*</span></label>
                <select class="form-control" id="item_type" name="item_type">
                  <option value="" disabled selected hidden>Select Item Type</option>
                </select>
                @if ($errors->has('item_type'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('item_type') }}</small>
                @endif
              </div>

              <div class="form-group" id="subCategoryDiv" style="display:none;">
                <label for="item_subcategories">Item Sub-Categories <span class="text-danger">*</span></label>
                <select class="form-control" id="item_subcategories" name="item_subcategories">
                  <option value="" disabled selected hidden>Select Sub-Categories</option>
                </select>
                @if ($errors->has('item_subcategories'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('item_subcategories') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="cost_price">Cost Price <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="cost_price" name="cost_price" placeholder="Enter Cost Price" autocomplete="off" required>
                @if ($errors->has('cost_price'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('cost_price') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="sell_price">Sell Price <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="sell_price" name="sell_price" placeholder="Enter Sell Price" autocomplete="off" required>
                @if ($errors->has('sell_price'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('sell_price') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="tax_rate">Tax Rate <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="tax_rate" name="tax_rate" placeholder="Enter Tax Rate" autocomplete="off" required>
                @if ($errors->has('tax_rate'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('tax_rate') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="reorder_quantity">Re-Order Quantity <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="reorder_quantity" name="reorder_quantity" placeholder="Enter Re-Order Quantity" autocomplete="off" required>
                @if ($errors->has('reorder_quantity'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('reorder_quantity') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="item_description">Item Description</label>
                <div class="controls">
                    <textarea class="form-control" id="item_description" name="item_description" rows="3" placeholder="Enter Item Description"></textarea>
                </div>
                @if ($errors->has('item_description'))
                    <small class="text-danger font-weight-bold errortext">{{ $errors->first('item_description') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="item_supplier">Item Supplier <span class="text-danger">*</span></label>
                <select class="form-control" id="item_supplier" name="item_supplier" required>
                  <option value="" disabled selected hidden>Select Item Supplier</option>
                  @if(count($allVendor)>0)
                    @foreach($allVendor as $vendor)
                      <option value="{{ $vendor->id }}">{{ $vendor->vendor_name  }}</option>
                    @endforeach
                  @endif
                </select>
                @if ($errors->has('item_supplier'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('item_supplier') }}</small>
                @endif
              </div>

              <div class="form-group mt-2">
                <label class="control-label input-label" for="warrenty">Warrenty Period <span class="text-danger">*</span></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input checkboxSingle checkBoxYes" type="checkbox" id="warrentyConfirmation1" name="warrenty" value="yes"/>
                    <label class="form-check-label" for="warrentyConfirmationYes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input checkboxSingle" type="checkbox" id="warrentyConfirmation2" name="warrenty" value="no">
                    <label class="form-check-label" for="warrentyConfirmationNo">No</label>
                </div>
                @if ($errors->has('warrenty'))
                    <small class="text-danger font-weight-bold errortext">{{ $errors->first('warrenty') }}</small>
                @endif
              </div>

              <div class="checkBoxEnableDiv">
                <div class="form-group mt-2">
                  <label class="control-label input-label" for="warrenty_type">Warrenty Type <span class="text-danger">*</span></label>
                  <div class="controls">
                      <input type="text" class="form-control warrentyRequired" id="warrenty_type" name="warrenty_type" placeholder="Warrenty Type"/>
                  </div>
                  @if ($errors->has('warrenty_type'))
                      <small class="text-danger font-weight-bold errortext">{{ $errors->first('warrenty_type') }}</small>
                  @endif
                </div>

                <div class="form-group mt-2">
                  <label class="control-label input-label" for="warrentyEndDate">End Date <span class="text-danger">*</span></label>
                  <div class="controls">
                      <input type="date" class="form-control warrentyRequired" id="warrentyEndDate" name="warrentyEndDate" placeholder="End Date" />
                  </div>
                  @if ($errors->has('warrentyEndDate'))
                      <small class="text-danger font-weight-bold errortext">{{ $errors->first('warrentyEndDate') }}</small>
                  @endif
                </div>

                <div class="form-group mt-2">
                  <label class="control-label input-label" for="warrentyCondition">Warrenty Condition</label>
                  <div class="controls">
                      <textarea class="form-control warrentyRequired" id="warrentyCondition" name="warrentyCondition" rows="3" placeholder="Warrenty Condition"></textarea>
                  </div>
                  @if ($errors->has('warrentyCondition'))
                      <small class="text-danger font-weight-bold errortext">{{ $errors->first('warrentyCondition') }}</small>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <label for="item_color">Color<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="color" name="item_color" placeholder="Enter Item Color" autocomplete="off" required>
                @if ($errors->has('item_color'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('item_color') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="item_part_of">Part Of <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="item_part_of" name="item_part_of" placeholder="Enter Item Part Of" autocomplete="off" required>
                @if ($errors->has('item_part_of'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('item_part_of') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="item_model_no">Model No. <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="item_model_no" name="item_model_no" placeholder="Enter Model No" autocomplete="off" required>
                @if ($errors->has('item_model_no'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('item_model_no') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="itemImages">Item Image</label>
                <input type="file" class="form-control-file" id="itemImages" name="itemImages[]" multiple>
                @if ($errors->has('itemImages'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('itemImages') }}</small>
                @endif
              </div>
            </div>
            <button type="submit" class="pl-3 pr-3">Save</button>  <a href="{{ route('vendor-site-items.index') }}"><button type="button" class="pl-3 pr-3">View</button></a>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
@endsection
