@include('includes.head')
<body>
	<header>
		@include('includes.header')
	</header>
	<div id="container">
	    @if(Session::has('message'))
	       <div class="alert-box ">
		<p class="alert">{{ Session::get('message') }}</p>
	      </div>
	    @endif
		<div id="content" class="row">
		@yield('content')
		</div>
	</div>
	<footer class="row">
		@include('includes.footer')
	</footer>
</body>
</html>
