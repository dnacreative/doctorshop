@extends('layouts.master')



@section('content')

<h1>Users</h1>

<a href="{{ URL::to('users/create/') }}" type="button" class="btn btn-success" title="Create"
	style="float: right;">
	<span class="glyphicon glyphicon-user"></span> Create a User
</a>

@if($users)
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Email</th>
				<th>Credit Card</th>
				<th></th>
			</tr>
		</thead>
		@foreach($users as $user)
			<tr>
				<td>{{$user->id}}</td>
				<td>{{$user->real_name}}</td>
				<td>{{$user->email}}</td>
				<td>@if($user->credit_card) 
					<?php
						echo substr($user->credit_card->number, 0, 4);
						echo '-';
						echo substr($user->credit_card->number, 4, 4);
						echo '-';
						echo substr($user->credit_card->number, 8, 4);
						echo '-';
						echo substr($user->credit_card->number, 12, 4);
					?>
				@endif</td>
				<td>
					<a href="{{ URL::to('users/update/'.$user->id) }}" 
						type="button" class="btn btn-warning btn-xs" title="Update">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
					<a href="#" id="delete_button_{{ $user->id }}"
						type="button" class="btn btn-danger btn-xs" title="Delete">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
		@endforeach
	</table>
	<p style="text-align: right;">display from all {{ $users->count() }} results.</p>
@else
	Looks like we haven't added any users, yet!
@endif

@stop



@section('script')

@foreach($users as $user)
<script>
	$("#delete_button_{{ $user->id }}").click(function(){
		var sure = window.confirm("Are you sure to delete user #{{ $user->id }} ?");

		if(sure) {
			window.location = "users/delete/" + <?php echo $user->id; ?>
		}
	});
</script>
@endforeach

@stop