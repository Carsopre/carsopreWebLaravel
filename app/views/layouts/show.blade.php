<<<<<<< HEAD
@extends('layouts.main')
@section('content')
<h1>{{$cat->name}}</h1>

<div class="panel">
	<div class="row">
		@foreach($sect as $sec)
			<div class="large-3 small-3 columns"><a href='#sec{{$sec->id}}'>{{$sec->name}}</a></div>
		@endforeach
	</div>
</div>
@if( ! empty($cat->description))
	<div class="panel">
		{{$cat->description}}
	</div>
@endif

@foreach($sect as $sec)
	<div>
		<h3 id='sec{{$sec->id}}'>{{$sec->name}}</h3>
		{{$sec->description}}
		</br></br></br></br>
	</div>
@endforeach


=======
@extends('layouts.main')
@section('content')
<h1>{{$cat->name}}</h1>

<div class="panel">
	<div class="row">
		@foreach($sect as $sec)
			<div class="large-3 small-3 columns"><a href='#sec{{$sec->id}}'>{{$sec->name}}</a></div>
		@endforeach
	</div>
</div>
@if( ! empty($cat->description))
	<div class="panel">
		{{$cat->description}}
	</div>
@endif

@foreach($sect as $sec)
	<div>
		<h3 id='sec{{$sec->id}}'>{{$sec->name}}</h3>
		{{$sec->description}}
		</br></br></br></br>
	</div>
@endforeach


>>>>>>> 3aeecd3f4c1a5b83f1cc16a6bceef425f07df988
@stop