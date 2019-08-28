@extends('admin.layouts.app')
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
						<th>Order ID</th>
						<th>Customer Name</th>
						<th>Shipping Name</th>
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

								<td>
									@foreach ($shippings as $shipping)
										@if($shipping->id == $order->shipping_id)
											{{ $shipping->first_name." ".$shipping->last_name }}
										@endif
									@endforeach
								</td>
								<td>{{$order->order_total}}</td>
								<td>{{ $order->order_date }}</td>
							<td><a href="{{url('delivery-process/'.$order->id)}}">Process Delivery</a>
							</td>
								<td >
									<div class="btn-group" role="group">
										<a href="{{url('/orderinvoices/'.base64_encode($order->id))}}"><button class="btn btn-success btn-sm"><i class="fas fa-eye"></i> View</button></a>&nbsp;
										<a href="{{url('/orderdelete/'.base64_encode($order->id))}}"><button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button></a>&nbsp;

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
