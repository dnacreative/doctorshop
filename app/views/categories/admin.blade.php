@extends('layouts.master')



@section('content')

<h1>Categories</h1>

<a href="{{ URL::to('categories/create/') }}" type="button" class="btn btn-success" title="Create"
	style="float: right;">
	<span class="glyphicon glyphicon-th-list"></span> Create a Category
</a>

@if($categories)
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th></th>
			</tr>
		</thead>
		@foreach($categories as $category)
			<tr>
				<td>{{$category->id}}</td>
				<td>{{$category->name}}</td>
				<td>
					<a href="{{ URL::to('categories/update/'.$category->id) }}" 
						type="button" class="btn btn-warning btn-xs" title="Update">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
					<a href="#" id="delete_button_{{ $category->id }}"
						type="button" class="btn btn-danger btn-xs" title="Delete">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
		@endforeach
	</table>
	<p style="text-align: right;">display from all {{ $categories->count() }} results.</p>
@else
	Looks like we haven't added any categories, yet!
@endif

@stop



@section('script')

@foreach($categories as $category)
<script>
	$("#delete_button_{{ $category->id }}").click(function(){
		var sure = window.confirm("Are you sure to delete category #{{ $category->id }} ?");

		if(sure) {
			window.location = "categories/delete/" + <?php echo $category->id; ?>
		}
	});
</script>
@endforeach

@stop