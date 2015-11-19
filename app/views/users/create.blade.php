@extends('layouts.master')



@section('content')

<h1 style="margin-bottom: 30px;">Create a User</h1>

@if( $errors != "[]" )
<div class="alert alert-block alert-danger">
	{{ $errors }}
</div>
@endif

<form method="post" role="form-horizontal">

<fieldset id="account_field">
<legend>Account</legend>
  <div class="row form-group">
    <label for="first_name" class="col-md-2 control-label">First Name: </label>
	<div class="col-md-4">
		<input class="form-control" id="first_name" name="first_name" placeholder="ex. Test" required>
	</div>
  </div>
  <div class="row form-group">
    <label for="last_name" class="col-md-2 control-label">Last Name: </label>
	<div class="col-md-4">
		<input class="form-control" id="last_name" name="last_name" placeholder="ex. Account" required>
	</div>
  </div>
  <div class="row form-group">
    <label for="email" class="col-md-2 control-label">Email: </label>
	<div class="col-md-4">
		<input type="email" class="form-control" id="email" name="email" placeholder="ex. test@example.com" required>
	</div>
  </div>
  <div class="row form-group">
    <label for="password" class="col-md-2 control-label">Password: </label>
	<div class="col-md-4">
		<input type="password" class="form-control" id="password" name="password" placeholder="ex. 12345678" required>
	</div>
  </div>
</fieldset>

<fieldset id="credit_field">
<legend>Credit Card</legend>
  <div class="row form-group">
    <label for="credit_card" class="col-md-2 control-label">Credit Card Number: </label>
	<div class="col-md-4">
		<input class="form-control" id="credit_card" name="credit_card" placeholder="ex. 1234-5678-9012-3456" required>
	</div>
  </div>
</fieldset>

  <div class="row form-group" style="margin-top: 30px;">
	<div class="col-md-2">
	</div>
	<!--
	<div class="col-md-2">
	  <a id="next_button" role="button" class="btn btn-primary" disabled>
		<span class="glyphicon glyphicon-chevron-right"></span> Next
	  </a>
	  <a id="back_button" role="button" class="btn btn-primary" style="display:none;">
	    <span class="glyphicon glyphicon-chevron-left"></span> Back
	  </a>
	</div>
	-->
	<div class="col-md-2">
	  <button id="submit_button" type="submit" class="btn btn-success" disabled>
	    <span class="glyphicon glyphicon-ok"></span> Submit
	  </button>
	</div>
	
	<!-- <button type="reset" class="btn btn-danger">Reset</button> -->
  </div>

</form>

<a href="{{ URL::to('users') }}" type="button" class="btn btn-danger" title="Back"
	style="float: right;">
	<span class="glyphicon glyphicon-remove"></span> Cancel
</a>

@stop



@section('script')

<script>
	$("#first_name, #last_name, #email, #password").keyup(function(){
		if( $("#first_name").val().length > 0 &&
			$("#last_name").val().length > 0 &&
			$("#email").val().length >= 4 &&
			$("#password").val().length >= 4
		)
			$("#next_button").removeAttr("disabled");
		else
			$("#next_button").attr("disabled", "disabled");
	});
	
	$("#credit_card").keyup(function(){
		if( $("#credit_card").val().length == 16)
			$("#submit_button").removeAttr("disabled");
		else
			$("#submit_button").attr("disabled", "disabled");
	});

	$("#next_button, #back_button").click(function(){
		$("#account_field, #credit_field").toggle("slow");
		$("#next_button, #back_button, #submit_button").toggle("slow");
	});
</script>

@stop