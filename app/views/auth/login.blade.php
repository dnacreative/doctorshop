@extends('layouts.master')



@section('content')

<h1 style="margin-bottom: 30px;">Login</h1>

<form method="post" role="form-horizontal">

  <div class="row form-group">
    <label for="email" class="col-md-2 control-label">Email: </label>
	<div class="col-md-4">
		<input type="text" class="form-control" id="email" name="email" required>
	</div>
  </div>
  <div class="row form-group">
    <label for="password" class="col-md-2 control-label">Password: </label>
	<div class="col-md-4">
		<input type="password" class="form-control" id="password" name="password" required>
	</div>
  </div>
  <div class="row form-group" style="margin-top: 30px;">
	<div class="col-md-offset-2 col-md-2">
	  <button id="submit_button" type="submit" class="btn btn-success">
	    <span class="glyphicon glyphicon-ok"></span> Login
	  </button>
	</div>
  </div>

</form>

@stop



@section('script')

@stop