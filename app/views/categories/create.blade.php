@extends('layouts.master')



@section('content')

<h1 style="margin-bottom: 30px;">Create a Category</h1>

<form method="post" role="form-horizontal" enctype="multipart/form-data">

  <div class="row form-group">
    <label for="category_name" class="col-md-2 control-label">Category Name: </label>
	<div class="col-md-4">
		<input class="form-control" id="category_name" name="category_name" placeholder="ex. Test" required>
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

<a href="{{ URL::to('categories') }}" type="button" class="btn btn-danger" title="Back"
	style="float: right;">
	<span class="glyphicon glyphicon-remove"></span> Cancel
</a>

@stop