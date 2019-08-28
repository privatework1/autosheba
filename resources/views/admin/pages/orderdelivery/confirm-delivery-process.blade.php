@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid pl-4">
        <div class="row">
            <div class="col-md-6">
                @if ($errors->has('success'))
                    <div class="alert alert-success mt-2" role="alert">
                        {{ $errors->first('success') }}
                    </div>
                @endif

                <h4>Confirm Delivery Process</h4>

                <form id="" role="form" action="{{ url('delivery-process/'.$orderid) }}" method="POST" enctype="multipart/form-data">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Delivery Process Form</legend>
                        <div class="box-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="brand_name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="" name="name" placeholder="Enter Name" autocomplete="off" required>

                            </div>

                            <div class="form-group">
                                <label for="brand_name">Email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="" name="email" placeholder="Enter Email" autocomplete="off" required>

                            </div>

                            <div class="form-group">
                                <label for="brand_name">Mobile <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="" name="mobile" placeholder="Enter Mobile" autocomplete="off" required>

                            </div>

                            <div class="form-group">
                                <label for="brand_details">Address</label>
                                <div class="controls">
                                    <textarea class="form-control" id="" name="address" rows="3" placeholder="Address Here"></textarea>
                                </div>

                            </div>


                        </div>
                        <button type="submit" class="pl-3 pr-3">Save</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
