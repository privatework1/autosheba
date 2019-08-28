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

                 <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Single Delivery</legend>
                        <div class="box-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="brand_name">Name: <i>{{$single_delivery_data->name}}</i></label>

                            </div>

                            <div class="form-group">
                                <label for="brand_name">Email: <i>{{$single_delivery_data->email}}</i></label>

                            </div>

                            <div class="form-group">
                                <label for="brand_name">Mobile: <i>{{$single_delivery_data->email}}</i></label>

                            </div>

                            <div class="form-group">
                                <label for="brand_details">Address: <i>{{$single_delivery_data->address}}</i></label>


                            </div>


                            <div class="form-group">
                                <label for="brand_name">Date and Time {{$single_delivery_data->complete_process_date_time}}</label>

                            </div>


                        </div>
                     <a href="{{url('/vendororderstatus')}}" class="btn btn-secondary">Back</a>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
