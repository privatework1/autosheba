@extends('b2b.layouts.app')
@section('content')


    <div class="main_div" style="">

        <div class="container" id="main_warp">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                        <h3 class="pull-right">Code # {{$b2bpoinvoice->poinvoice_code}}</h3>
                       <h5>Date: <span>Date:{{$b2bpoinvoice->poinvoice_date}}</span></h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <address>
                                <strong>B2B Information:</strong><br>
                                {{$b2bInfo->b2bCustomer_name}}<br/>
                                {{$b2bInfo->b2bCustomer_email}}<br>
                                {{$b2bInfo->b2bCustomer_mobile}}<br>
                            </address>
                        </div>
                        <div class="col-lg-6 text-right">
                            <address>
                                <strong>Address</strong><br>
                              {{$b2bInfo->b2bCustomer_address}}<br/>
                              {{$b2bInfo->b2bCustomer_website}}<br/>



                            </address>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Purchase Order summary</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <td><strong>Item</strong></td>
                                        <td class="text-center"><strong>Price</strong></td>
                                        <td class="text-center"><strong>Quantity</strong></td>
                                        <td class="text-right"><strong>Totals</strong></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->

                                    @php($sum=0)
                                    @foreach($b2bpoinvoices as $b2bpoinvoice)
                                        <tr>
                                            <td>{{$b2bpoinvoice->item_name}}</td>
                                            <td class="text-center">{{$b2bpoinvoice->item_price}}</td>
                                            <td class="text-center">{{$b2bpoinvoice->item_quantity}}</td>
                                            <td class="text-right">{{$b2bpoinvoice->item_quantity*$b2bpoinvoice->item_price}}</td>
                                        </tr>
                                        <?php $sum+=$b2bpoinvoice->item_quantity*$b2bpoinvoice->item_price?>
                                    @endforeach

                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center"><strong>Grand Total</strong></td>
                                        <td class="no-line text-right">{{ $sum}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <button onclick="myFunction()" style="float:right;">Print</button>
    </div>

    <script>
        function myFunction() {
            var printContents = document.getElementById('main_warp').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;

        }
    </script>
@endsection