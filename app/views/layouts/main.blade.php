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
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-52379395-1', 'auto');
		  ga('send', 'pageview');
		</script>
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
