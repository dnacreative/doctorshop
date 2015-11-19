@extends('layouts.master')



@section('content')

<!-- Total Price Box -->
@if($total_income)
<div id="summary" class="alert alert-success" style="float: right; text-align: center; max-width: 400px;">
	<h3>Total Income: <b><u>{{ number_format($total_income, 2) }}</u></b> Bath</h3>
</div>
@endif

<!-- Section Cart -->
<h1>Users' Buying History</h1>

@if($histories)
	<table class="table table-hover">
		<thead>
			<tr>
				<th></th>
				<th>User Name</th>
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
				<td>{{ $history->real_name }}</td>
				<td>{{ $history->name }}</td>
				<td>{{ $history->price }}</td>
				<td><?php
					if($history->status == 0) echo "<span class=\"alert-warning\">Pending</span>";
					else if($history->status > 0) echo "<span class=\"alert-success\">Checked Out</span>";
					else if($history->status < 0) echo "<span class=\"alert-danger\">Canceled</span>";
				?></td>
				<td>{{ $history->updated_at }}</td>
			</tr>
		@endforeach

	</table>
	
@else
	Looks like we haven't any payments, yet!
@endif

@stop
