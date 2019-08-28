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

                <form id="" role="form" action="@if(!empty($deliverprocess)){{url('/final-delivery/'.$deliverprocess->id)}} @else {{ url('delivery-process/'.$orderid) }} @endif" method="POST" enctype="multipart/form-data">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Delivery Process Form</legend>
                        <div class="box-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="brand_name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="" name="name" value="@if(!empty($deliverprocess)){{$deliverprocess->name}}@endif" placeholder="Enter Name" autocomplete="off" required>

                            </div>

                            <div class="form-group">
                                <label for="brand_name">Email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="" name="email" value="@if(!empty($deliverprocess)){{$deliverprocess->email}}@endif" placeholder="Enter Email" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="brand_name">Mobile <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="" name="mobile" value="@if(!empty($deliverprocess)){{$deliverprocess->mobile}}@endif" placeholder="Enter Mobile" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="brand_details">Address</label>
                                <div class="controls">
                                    <textarea class="form-control" id="" name="address" rows="3" placeholder="Address Here">@if(!empty($deliverprocess)){{$deliverprocess->address}}@endif</textarea>
                                </div>
                            </div>

                            @if(!empty($deliverprocess))

                                <div class="form-group">
                                    <label for="brand_name">Date and Time <span class="text-danger">*</span></label>
                                    <input type="text" readonly class="form-control" id="" name="process_date_time" value="@if(!empty($deliverprocess)){{$deliverprocess->process_date_time}}@endif" placeholder="Enter Mobile" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                        <label for="brand_name">Day <span class="text-danger">*</span></label>
                                        <input type="text" readonly class="form-control" id="" name="process_day" value="@if(!empty($deliverprocess)){{$deliverprocess->process_day}}@endif" placeholder="Enter Mobile" autocomplete="off" required>

                                </div>

                                <div class="form-group">
                                    <label for="">Order Complision date and Time<span class="text-danger">*</span></label>
                                     <input type="datetime-local" name="complete_process_date_time" placeholder="dd-MM-dd HH:mm:ss" size="16" ng-model="data.action.date" required />
                                </div>
                            @else
                                DateTime
                                <?php
                                $dt = new \DateTime('now', new \DateTimezone('Asia/Dhaka'));
                                $deliver_processDate=$dt->format('Y-m-d g:i:s:A');
                                echo $deliver_processDate."[".($dt->format('F-g-Y'))."]";
                                ?>

                            @endif
                        </div>
                        <button type="submit" class="pl-3 pr-3">
                            @if(!empty($deliverprocess)) Confirm Process @else Save @endif
                        </button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
