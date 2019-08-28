@extends('vendor.layouts.app')
@section('content')

	<div class="container-fluid">
		<div class="col-md-12 mt-3">
			<h4>Order Delivery List</h4>
			<hr/>
			@if(Session::has('message'))
				<span class="btn btn-success">{{Session::get('message')}}</span>
			@endif
			<div class="table-responsive">
				<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>SL.</th>
						<th>Order Code</th>
						<th>Customer Name</th>
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
								<td>{{ $order->order_code }}</td>
								<td>
									@foreach ($customers as $customer)
										@if($customer->id == $order->customer_id)
											{{ $customer->name }}
										@else
										@endif
									@endforeach
								</td>
								<td>{{$order->order_total}}</td>
								<td>{{$order->order_date}}</td>
								<td>
								<a href="#">Confirm Pending</a>
								</td>

								<td >
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
