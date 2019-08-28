@extends('site.pages.customerProfile.layouts.app')
@section('content')

    @if(!empty($orders))
        <div class="col-md-12 mt-3">
            <h4>Orders List</h4>
            <hr/>
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>OrderCode</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $sl=1; ?>
                    @if(count($orders)>0)
                        @foreach($orders as $order)
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td width="">{{ $order->order_code }}</td>

                                <td>{{$order->order_total}}</td>
                                <td width="">{{ date('Y-m-d H:i:s A',strtotime($order->created_at)) }}</td>

                                <td>
                                    @if($order->order_status==1)
                                        <span class="btn btn-success">Complete</span>
                                        @else
                                    <span class="btn btn-warning">Incomplete</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-outline-secondary btn-sm" href="{{url('/order_report/'.base64_encode($order->id))}}"><i class="fas fa-eye"></i>View</a>

                                    </div>
                                </td>
                            </tr>
                            <?php $sl++; ?>
                        @endforeach
                    @else
                        <tr>
                            <td>No Order Found.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>



      @else
        <button onclick="myFunction()">Print this page</button>
         <div id="mainDiv">
             <div class="row">
                 <div class="col-md-4">
                     <b>Customer Info</b>

                     <br/>
                     Name: {{$customer_info->name}}<br/>
                     Email: {{$customer_info->email}}<br/>
                     Phone: {{$customer_info->phone}}<br/>
                     Address: {{$customer_info->address}}<br/>
                 </div>
                 <div class="col-md-4">
                     <b>Shipping Info</b>

                     <br/>
                     Name: {{$shipping_info->first_name." ".$shipping_info->last_name}}<br/>
                     Email: {{$shipping_info->email}}<br/>
                     Phone: {{$shipping_info->phone}}<br/>
                     Address: {{$shipping_info->address}}<br/>
                     Division: {{$address->division_name}}<br/>
                     District: {{$address->district_name}}<br/>
                     Process: {{$shipping_method->shipping_method_name}}<br/>
                 </div>

                 <div class="col-md-4">
                     <b>Payment Info</b>

                     <br/>
                     Type:
                     @if($payment_info->payment_type=='bkash')
                         Type:{{$payment_info->payment_type}}<br/>
                         Number:{{$payment_info->bkash_number}}<br/>
                         Transaction:{{$payment_info->bkash_transaction_number}}<br/>
                     @elseif($payment_info->payment_type=='bank')
                         Type:{{$payment_info->payment_type}}<br/>
                         Information:{{$payment_info->bank_info}}<br/>


                     @elseif($payment_info->payment_type=='card')
                         Type:{{$payment_info->payment_type}}<br/>
                         Information:{{$payment_info->card_info}}<br/>

                     @else

                         Type:{{$payment_info->payment_type}}<br>
                     @endif
                     <br/>

                 </div>
             </div>

             <div class="row">
                 <div class="col-md-12">
                     <div class="panel panel-default">
                         <div class="panel-heading">
                             <h3 class="panel-title"><strong>Order Summary: {{$customer_order->order_code}}</strong></h3>
                         </div>
                         <div class="panel-body">
                             <div class="table-responsive">
                                 <table class="table table-condensed table-bordered table-secondary table-hover">
                                     <thead>
                                     <tr>
                                         <td><strong>Item</strong></td>
                                         <td><strong>Color</strong></td>
                                         <td><strong>BackgroundColor</strong></td>
                                         <td class="text-center"><strong>Price</strong></td>
                                         <td class="text-center"><strong>Quantity</strong></td>
                                         <td class="text-right"><strong>Totals</strong></td>
                                     </tr>
                                     </thead>
                                     <tbody>
                                     <!-- foreach ($order->lineItems as $line) or some such thing here -->

                                     @php($sum=0)
                                     @foreach($orderDetails_info as $orderdetail)
                                         <tr>
                                             <td>{{$orderdetail->item_name}}</td>
                                             <td>{{$orderdetail->color}}</td>
                                             <td>
                                                 <div style="width:30px;height: 30px;background:<?php echo $orderdetail->color;  ?>"></div>


                                             </td>
                                             <td class="text-center">{{$orderdetail->item_price}}</td>
                                             <td class="text-center">{{$orderdetail->item_quantity}}</td>
                                             <td class="text-right">{{$orderdetail->item_quantity*$orderdetail->item_price}}</td>
                                         </tr>
                                         <?php $sum+=$orderdetail->item_quantity*$orderdetail->item_price?>
                                     @endforeach

                                     <tr>
                                         <td class="no-line"></td>
                                         <td class="no-line"></td>
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
        @endif





    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $("#dataTable").DataTable();
    </script>

    <script>
        function myFunction() {
            var printContents = document.getElementById('mainDiv').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;

        }
    </script>
@endsection
