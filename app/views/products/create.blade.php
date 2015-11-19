@extends('layouts.master')



@section('content')

<h1 style="margin-bottom: 30px;">Create a Product</h1>

<form method="post" role="form-horizontal" enctype="multipart/form-data">

  <div class="row form-group">
    <label for="product_name" class="col-md-2 control-label">Product Name: </label>
	<div class="col-md-4">
		<input class="form-control" id="product_name" name="product_name" placeholder="ex. Test" required>
	</div>
  </div>
  <div class="row form-group">
    <label for="price" class="col-md-2 control-label">Price: </label>
	<div class="col-md-4">
		<input class="form-control" id="price" name="price" placeholder="ex. 1234.56" required>
	</div>
  </div>
  <div class="row form-group">
    <label for="price" class="col-md-2 control-label">Category: </label>
	<div class="col-md-4">
		<select class="form-control" id="category" name="category">
			@foreach($categories as $category)
			<option value="{{ $category->id }}">{{ $category->name }}</option>
			@endforeach
		</select>
	</div>
  </div>
  <div class="row form-group">
    <label for="picture" class="col-md-2 control-label">Picture: </label>
	<div class="col-md-4">
		<input type="file" class="form-control" id="picture" name="picture">
	</div>
  </div>

  <div class="row form-group" style="margin-top: 30px;">
	<div class="col-md-2">
	</div>
	<div class="col-md-4">
	  <button id="submit_button" type="submit" class="btn btn-success">
	    <span class="glyphicon glyphicon-ok"></span> Submit
	  </button>
	  <button type="reset" class="btn btn-danger">
	    <span class="glyphicon glyphicon-repeat"></span> Reset
	  </button>
	</div>
  </div>

</form>

<a href="{{ URL::to('products') }}" type="button" class="btn btn-danger" title="Back"
	style="float: right;">
	<span class="glyphicon glyphicon-remove"></span> Cancel
</a>

@stop