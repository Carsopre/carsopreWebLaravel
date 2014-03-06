@include('includes.head')
<body>
	<header>
		@include('includes.header')
	</header>
	<div id="container">
		<div id="content" class="row">
			@if(Session::has('message'))
				<div data-alert class="alert-box {{ Session::get('type') }}">
					{{ Session::get('message') }}
					<a href class="close">&times;</a>
				</div>
			@endif
		@yield('content')
		</div>
	</div>
	<footer class="row">
		@include('includes.footer')
	</footer>
</body>
</html>
