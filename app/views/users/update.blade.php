@extends('layouts.master')



@section('content')

<h1 style="margin-bottom: 30px;">Update a User</h1>

<form method="post" role="form-horizontal">
  <div class="row form-group">
    <label for="real_name" class="col-md-2 control-label">Name: </label>
	<div class="col-md-4">
		<input class="form-control" id="real_name" name="real_name" value="{{$user->real_name}}">
	</div>
  </div>
  <div class="row form-group">
    <label for="email" class="col-md-2 control-label">Email: </label>
	<div class="col-md-4">
		<input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
	</div>
  </div>
  <div class="row form-group">
    <label for="password" class="col-md-2 control-label">Password: </label>
	<div class="col-md-4">
		<input type="password" class="form-control" id="password" name="password">
	</div>
  </div>
  <div class="row form-group">
    <label for="credit_card" class="col-md-2 control-label">Credit Card Number: </label>
	<div class="col-md-4">
		<input class="form-control" id="credit_card" name="credit_card" value="{{$user->credit_card->number}}">
	</div>
  </div>
  <div class="row form-group" style="margin-top: 30px;">
	<div class="col-md-2"></div>
	<button type="submit" class="btn btn-success">Submit</button>
	<button type="reset" class="btn btn-danger">Reset</button>
  </div>
</form>

<a href="{{ URL::to('users') }}" type="button" class="btn btn-primary" title="Back"
	style="float: right;">
	<span class="glyphicon glyphicon-chevron-left"></span> Cancel
</a>

@stop