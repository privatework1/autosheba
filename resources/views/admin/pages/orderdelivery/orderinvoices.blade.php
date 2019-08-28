@extends('admin.layouts.app')
@section('content')
<button onclick="myFunction()">Print this page</button>
    <div class="main_div" style="">

        <div class="container" id="main_warp">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                        <h2>Invoice</h2><h3 class="pull-right">Order # {{$order->order_code}}</h3>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <address>
                                <strong>Customer To:</strong><br>
                                @if($customer->id=='')
                                    {{'No Customer'}}

                                @else{{$customer->name}}<br/>
                                {{$customer->email}}<br>
                                {{$customer->phone}}<br>

                                @endif


                            </address>
                        </div>
                        <div class="col-lg-6 text-right">
                            <address>
                                <strong>Shipped To:</strong><br>
                                @if($shipping->id=='')
                                    {{'No Customer'}}

                                @else{{$shipping->first_name." ".$shipping->last_name}}<br/>
                                {{$shipping->email}}<br>
                                {{$shipping->phone}}<br>

                                @endif
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Payment Method:</strong><br>

                                @if($payment->payment_type=='Bkash')
                                    Type:{{$payment->payment_type}}<br/>
                                    Number:{{$payment->bkash_number}}<br/>
                                @elseif($payment->payment_type=='Bank')
                                    Type:{{$payment->payment_type}}<br/>
                                    Name:{{$payment->bank_name}}<br/>
                                    Number:{{$payment->bank_number}}<br/>

                                @elseif($payment->payment_type=='Card')
                                    Type:{{$payment->payment_type}}<br/>
                                    Number:{{$payment->card_number}}<br/>
                                    CVC Number:{{$payment->cvc_number}}<br/>
                                @else

                                    Type:{{$payment->payment_type}}<br>
                                @endif
                            </address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Order Date:</strong><br>
                                {{$order->created_at}}<br><br>
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Order summary</strong></h3>
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
                                    @foreach($orderDetails as $orderdetail)
                                        <tr>
                                            <td>{{$orderdetail->item_name}}</td>
                                            <td class="text-center">{{$orderdetail->item_price}}</td>
                                            <td class="text-center">{{$orderdetail->item_quantity}}</td>
                                            <td class="text-right">{{$orderdetail->item_quantity*$orderdetail->item_price}}</td>
                                        </tr>
                                        <?php $sum+=$orderdetail->item_quantity*$orderdetail->item_price?>
                                    @endforeach

                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center"><strong>Total</strong></td>
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