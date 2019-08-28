@extends('vendor.layouts.app')
@section('content')

	<div class="container-fluid">
		<div class="col-md-12 mt-3">
			<h4>Orders List</h4>
			<hr/>
			<div class="table-responsive">
				<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>SL.</th>
						<th>Item Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						<th>Customer Name</th>
						<th>Shipping Name</th>

						<th>Date</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php $sl=1; ?>
					@if(count($orders)>0)
						@foreach($orders as $order)
							<tr>
								<td><?php echo $sl; ?></td>
								<td><?php echo $order->item_name; ?></td>
								<td><?php echo $order->item_quantity; ?></td>
								<td><?php echo $order->item_price; ?></td>
								<td><?php echo $order->total_price; ?></td>
								<td><?php echo $order->first_name." ".$order->last_name.$order->customer_id; ?></td>
								<td>
								<?php
										$shippingInfo=DB::table('shippings')->where('customer_id',$order->customer_id)->first();
									echo $shippingInfo->first_name." ".$shippingInfo->last_name;
									?>
								</td>
								<td><?php echo $order->order_date?></td>


								<td>
									<div class="btn-group" role="group">
										<a href="{{url('/vendororderinvoices/'.base64_encode($order->id))}}"><button class="btn btn-success btn-sm"><i class="fas fa-eye"></i> View</button></a>&nbsp;

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

	</div>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

	<script>
		$("#dataTable").DataTable();
	</script>
@endsection
