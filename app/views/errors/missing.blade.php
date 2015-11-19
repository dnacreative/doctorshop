@extends('layouts.master')



@section('content')

<div class="jumbotron" style="text-align: center;">
  <h1>Error 404</h1>
  <p>Page Not Found</p>
  <p><a href="{{ URL::to('') }}" class="btn btn-primary btn-lg" role="button">Go to Home</a></p>
</div>


@stop