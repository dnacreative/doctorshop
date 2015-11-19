<!DOCTYPE html>
<html>
	<head>
		<title>
		@section('title')
			DoctorShop E-Commerce Testing System
		@show
		</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="{{ URL::to('favicon.ico') }}">
		
		<!-- CSS are placed here -->
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/bootstrap-theme.min.css') }}
		
		
		<style>
		@section('styles')
			body
			{
				min-width: 400px;

				background-image: url('{{ URL::to('img/abstract_box.jpg') }}');
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-position: right; 
			}
			
			<!-- More CSS Style -->
			@yield('css')
			
		@show
		</style>
	</head>
	<body>
		<!-- Navigation bar -->
		<nav class="navbar navbar-default" role="navigation" style="opacity: 0.9;">
		  <div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="{{ URL::to('/') }}">
				<span class="glyphicon glyphicon-cloud"></span> DoctorShop E-Shopping
			  </a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav">
			    @if( Auth::check() && Auth::user()->email == 'admin@test.com' )
				  <li><a href="{{ URL::to('products/admin') }}">Products</a></li>
				  <li><a href="{{ URL::to('categories/admin') }}">Categories</a></li>
				  <li><a href="{{ URL::to('users') }}">Users</a></li>
				@else
				  <li><a href="{{ URL::to('products') }}">Products</a></li>
				  <li><a href="{{ URL::to('categories') }}">Categories</a></li>
				@endif
			  </ul>
			  <form class="navbar-form navbar-left" role="search">
				<div class="form-group">
				  <input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
			  </form>
			  <ul class="nav navbar-nav navbar-right">
				@if( Auth::check() )
					@if( Auth::user()->email == 'admin@test.com' )
					<li><a href="{{ URL::to('cart/admin') }}"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
					@else
					<li><a href="{{ URL::to('cart') }}"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
					@endif
					
					<li><a href="{{ URL::to('logout') }}"><span class="glyphicon glyphicon-off"></span> Logout ({{ Auth::user()->real_name }})</a></li>
			    @else
				<li><a href="{{ URL::to('login') }}">Login</a></li>
				<li><a href="{{ URL::to('users/create') }}">Register</a></li>
				@endif
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

		
		<!-- Container -->
		<div class="container">
			
			<!-- Content -->
			@yield('content')
			
		</div>
		
		<!-- Scripts are placed here -->
		{{ HTML::script('js/jquery-2.1.0.min.js') }}
		{{ HTML::script('js/bootstrap.min.js') }}
		
		<script>
			$('body').mousemove(function(e){
				var amountMovedX = 0;
				var amountMovedY = (e.pageY * -1 / 6);
				$(this).css('background-position', 'right ' + amountMovedY + 'px');
			});
		</script>
		
		<!-- additional Script -->
		@yield('script')
		
	</body>
</html>