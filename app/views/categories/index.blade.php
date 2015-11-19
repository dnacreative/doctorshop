@extends('layouts.master')

@section('content')

<h1 style="margin-bottom: 30px;">Categories</h1>

@if($categories)
	<div class="row" style="background-color:white;">
		@foreach($categories as $category)
		<a href="{{ URL::to('categories/view/'.strtolower($category->name)) }}">
		<div class="col-md-3" style="padding: 25px; text-align: center; vertical-align: bottom;">
			<img id="img_{{ $category->id }}" src="{{ URL::to('img/categories/'.$category->id.'.jpg') }}" 
				style="max-width: 300px; width: 240px; opacity: 0.75;"></img>
			<h2 style="margin-bottom: 50px;">{{ $category->name }}</h2>
		</div>
		</a>
		@endforeach
	</div>
@else
	Looks like we haven't added any categories, yet!
@endif

@stop

@section('script')

@foreach($categories as $category)
<script>
	$("#img_{{ $category->id }}").hover(
	function(){
		$(this).animate({
			bottom:'25px',
			right:'25px',
			opacity:'1.0',
			width:'300px'
		});
	}, function(){
		$(this).animate({
			bottom:'0px',
			right:'0px',
			opacity:'0.75',
			width:'240px'
		});
	});
</script>
@endforeach

@stop