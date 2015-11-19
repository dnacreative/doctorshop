@extends('layouts.master')

@section('content')

<h1 style="margin-bottom: 30px;">
	Products
	@if( isset($category_name) )
	<span class="label label-default">{{ ucfirst($category_name) }}</span>
	@else
	<span class="label label-default">All</span>
	@endif
</h1>

@if($products)
	<?php $counter = 0; ?>
	@foreach($products as $product)
		@if($counter % 4 == 0)
		<div class="row" style="background-color:white;">
		@endif
			<div class="col-md-3" style="padding: 30px 10px 30px 10px; text-align: center;">
				<img id="img_{{ $product->id }}" src="{{ URL::to('img/products/'.$product->id.'.jpg') }}" 
					style="width: 200px;"></img>
				<h3>{{ $product->name }}</h3>
				<h3><span class="label label-info">{{ number_format($product->price) }} Bath</span></h3> 
				@if( Auth::check() )
				<p>
					<a href="{{ URL::to('products/buy/'.$product->id) }}" type="button" class="btn btn-success btn-xs">
						<span class="glyphicon glyphicon-gift"></span> Add to Cart
					</a>
					<!-- <a type="button" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-hand-right"></span> Order</a> -->
				</p>
				@endif
			</div>
		@if($counter % 4 == 3)
		</div>
		@endif
		<?php $counter++; ?>
	@endforeach
@endif

@if($counter == 0)
	<p>Looks like we haven't added any products, yet!</p>
@endif

@stop