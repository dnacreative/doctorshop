@extends('layouts.master')



@section('content')

<!-- Total Price Box -->
@if($total_price)
<div id="summary" class="alert alert-warning" style="float: right; text-align: center; max-width: 400px;">
	<h3>Total Price: <b><u>{{ number_format($total_price, 2) }}</u></b> Bath</h3>
</div>
@endif

<!-- Section Cart -->
<h1>My Cart</h1>

@if($carts)
	<table class="table table-hover">
		<thead>
			<tr>
				<th></th>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>

		@foreach($carts as $cart)
			<tr>
				<td>
					<img src="{{ URL::to('img/products/'.$cart->product_id.'.jpg') }}"
						style="max-width: 24px;"></img>
				</td>
				<td>{{ $cart->name }}</td>
				<td>{{ $cart->price }}</td>
				<td><?php
					if($cart->status == 0) echo "Pending";
					else if($cart->status > 0) echo "Checked Out";
					else if($cart->status < 0) echo "Canceled";
				?></td>
				<td>
					<a href="{{ URL::to('cart/checkout/'.$cart->id) }}" 
						type="button" class="btn btn-success btn-xs" title="But Now">
						<span class="glyphicon glyphicon-ok"></span> Buy Now
					</a>
					<a href="{{ URL::to('cart/cancel/'.$cart->id) }}" 
						type="button" class="btn btn-danger btn-xs" title="Cancel">
						<span class="glyphicon glyphicon-remove"></span> Cancel
					</a>
				</td>
			</tr>
		@endforeach
		<?php 
			$vat = $total_price * 0.07;
			$service_charge = $total_price * 0.10;
			$net_price = $total_price + $vat + $service_charge;
		?>

	</table>
	
@else
	Looks like we haven't added buy products, yet!
@endif


<!-- Section History -->
<h1>My Payment History</h1>

@if($histories)
	<table class="table table-hover">
		<thead>
			<tr>
				<th></th>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Status</th>
				<th>DateTime</th>
			</tr>
		</thead>

		@foreach($histories as $history)
			<tr>
				<td>
					<img src="{{ URL::to('img/products/'.$history->product_id.'.jpg') }}"
						style="max-width: 24px;"></img>
				</td>
				<td>{{ $history->name }}</td>
				<td>{{ $history->price }}</td>
				<td><?php
					if($history->status == 0) echo "Pending";
					else if($history->status > 0) echo "Checked Out";
					else if($history->status < 0) echo "Canceled";
				?></td>
				<td>{{ $history->updated_at }}</td>
			</tr>
		@endforeach

	</table>
	
@else
	Looks like we haven't any payments, yet!
@endif

@stop
