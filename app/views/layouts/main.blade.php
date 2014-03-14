@include('includes.head')
<body>
	<header>
	<?php if (Auth::check()) :?>
		@include('includes.header')
	<?php endif ?>
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
		<script>
			$(document).foundation();
		</script>
</body>
</html>
