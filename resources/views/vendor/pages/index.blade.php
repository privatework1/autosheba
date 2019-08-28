@extends('vendor.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Column -->
            <div class="col-md-4">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"></h1>
                        <h6 class="text-white">Category<span class="badge badge-warning">3</span></h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-4">
                <div class="card card-hover">
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white"></h1>
                        <h6 class="text-white">Company <span class="badge badge-warning">5</span></h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-4">
                <div class="card card-hover">
                    <div class="box bg-primary text-center">

                        <h6 class="text-white">Order <span class="badge badge-warning">13</span></h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-4">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white"></h1>
                        <h6 class="text-white">Product<span class="badge badge-warning">40</span></h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bar Chart --}}
        <div class="row my-3">
            <div class="col">
                <h4>Item Quantity</h4>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="chBar" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pie Chart --}}
        <div class="row my-3">
            <div class="col">
                <h4>Order Quantity</h4>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-4 py-1">
                <div class="card">
                    <div class="card-body">
                        <canvas id="chDonut1"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-1">
                <div class="card">
                    <div class="card-body">
                        <canvas id="chDonut2"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-1">
                <div class="card">
                    <div class="card-body">
                        <canvas id="chDonut3"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
