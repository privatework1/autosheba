@extends('b2b.layouts.app')
@section('content')
    <style>
        .myimage img{

        }
    </style>


    <div class="main_div" style="">

        <div class="container" id="main_warp">
            <div class="row">
                <div class="col-lg-12 myimage">
                    <img src="{{asset('uploads/b2bcompany/'.$b2bpurchaseinvoice->po_company_logo)}}" alt="" style="width:20px;height:20px;">
                    <div class="invoice-title">
                        <h3 class="pull-right">Invoice Code # {{$b2bpurchaseinvoice->b2bpurchase_code}}</h3>
                       <h5>Date: <span>Date:{{$b2bpurchaseinvoice->poinvoice_date}}</span></h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <address>

                                <p><b>Company Name</b>: {{$b2bpurchaseinvoice->poinvoice_company_name}}</p><br/>
                                <p><b>Company Email</b>: {{$b2bpurchaseinvoice->poinvoice_company_email}}</p><br/>
                                <p><b>Company Mobile</b>: {{$b2bpurchaseinvoice->poinvoice_company_mobile}}</p><br/>

                            </address>
                        </div>
                        <div class="col-lg-6 text-right" style="">
                            <address>
                                <strong>Address</strong><br>
                                <p><b>Company Address</b>: {{$b2bpurchaseinvoice->poinvoice_company_address}}</p><br/>
                                <p><b>Model No:</b>: {{$b2bpurchaseinvoice->poinvoice_company_code}}</p><br/>




                            </address>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="text-align: center;"><strong>Suummary</strong></h3>
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
                                    @foreach($b2bpurchaseinvoiceDetails as $b2bpurchaseinvoiceDetail)
                                        <tr>
                                            <td>{{$b2bpurchaseinvoiceDetail->item_name}}</td>
                                            <td class="text-center">{{$b2bpurchaseinvoiceDetail->item_price}}</td>
                                            <td class="text-center">{{$b2bpurchaseinvoiceDetail->item_quantity}}</td>
                                            <td class="text-right">{{$b2bpurchaseinvoiceDetail->item_quantity*$b2bpurchaseinvoiceDetail->item_price}}</td>
                                        </tr>
                                        <?php $sum+=$b2bpurchaseinvoiceDetail->item_quantity*$b2bpurchaseinvoiceDetail->item_price?>
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
            <button onclick="myFunction()" style="float:right;">Print</button>
        </div>
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