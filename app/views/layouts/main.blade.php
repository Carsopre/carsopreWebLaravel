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
		@include('includes.analyticstracking')
		{{HTML::script('foundation/js/vendor/jquery.js')}}
		{{HTML::script('foundation/js/foundation/foundation.js')}}
		
		{{HTML::script('foundation/js/foundation/foundation.topbar.js')}}
		
		{{HTML::script('assets/js/sigma.js/sigma.min.js')}}	
		{{HTML::script('assets/js/sigma.js/plugins/sigma.parsers.gexf.min.js')}}
		{{HTML::script('assets/js/script-graphs.js')}}	
		
		{{HTML::script('assets/js/chart.js/Chart.js')}}
		{{HTML::script('assets/js/script-chart.js')}}	
		
	</body>
</html>
