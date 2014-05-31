@include('includes.head')
<body>
	<header>
		@if( '/' != Route::getCurrentRoute()->getPath())
			@include('includes.header_admin')
		@endif
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

		{{HTML::script('foundation/js/vendor/jquery.js')}}
		{{HTML::script('foundation/js/foundation/foundation.js')}}
		
		{{HTML::script('foundation/js/foundation/foundation.topbar.js')}}
		{{HTML::script('foundation/js/foundation/foundation.orbit.js')}}
		<script>
			$(document).foundation();
			$(document).foundation({
			  orbit: {
			    animation: 'slide',
			    timer_speed: 1000,
			    pause_on_hover: true,
			    animation_speed: 500,
			    navigation_arrows: true,
			    bullets: false
			  }
			});
		</script>
</body>
</html>
