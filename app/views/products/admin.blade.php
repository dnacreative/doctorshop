@extends('layouts.master')



@section('content')

<h1>Products</h1>

<a href="{{ URL::to('products/create/') }}" type="button" class="btn btn-success" title="Create"
	style="float: right;">
	<span class="glyphicon glyphicon-tags"></span>  Create a Product
</a>

@if($products)
	<table class="table table-hover">
		<thead>
			<tr>
				<th></th>
				<th>#</th>
				<th>Name</th>
				<th>Price (Bath)</th>
				<th>Category</th>
				<th></th>
			</tr>
		</thead>
		@foreach($products as $product)
			<tr>
				<td>
					<img src="{{ URL::to('img/products/'.$product->id.'.jpg') }}"
						style="max-width: 24px;"></img>
				</td>
				<td>{{$product->id}}</td>
				<td>{{$product->name}}</td>
				<td>{{number_format($product->price)}}</td>
				<td>{{$product->category->name}}</td>
				<td>
					<a href="{{ URL::to('products/update/'.$product->id) }}" 
						type="button" class="btn btn-warning btn-xs" title="Update">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
					<a href="#" id="delete_button_{{ $product->id }}"
						type="button" class="btn btn-danger btn-xs" title="Delete">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
		@endforeach
	</table>
	<p style="text-align: right;">display from all {{ $products->count() }} results.</p>
@else
	Looks like we haven't added any products, yet!
@endif

@stop



@section('script')

@foreach($products as $product)
<script>
	$("#delete_button_{{ $product->id }}").click(function(){
		var sure = window.confirm("Are you sure to delete product #{{ $product->id }} ?");

		if(sure) {
			window.location = "products/delete/" + <?php echo $product->id; ?>
		}
	});
</script>
@endforeach

@stop