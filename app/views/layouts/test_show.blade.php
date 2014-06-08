<<<<<<< HEAD
@extends('layouts.main')
@section('content')
<h1>{{$cat->name}}</h1>
<ul data-orbit data-options="animation:slide;
                  pause_on_hover:true;
                  animation_speed:500;
                  navigation_arrows:true;
                  bullets:false;">
  <li>
  	{{HTML::image('foundation/img/satelite-orbit.jpg', $alt="slide 1")}}
    <div class="orbit-caption">
      Caption One.
    </div>
  </li>
  <li class="active">
  	{{HTML::image('foundation/img/andromeda-orbit.jpg', $alt="slide 2")}}
    <div class="orbit-caption">
      Caption Two.
    </div>
  </li>
  <li>
	{{HTML::image('foundation/img/launch-orbit.jpg', $alt="slide 3")}}  
    <div class="orbit-caption">
      Caption Three.
    </div>
  </li>
</ul>


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
		<h3 id='#sec{{$sec->id}}'>{{$sec->name}}</h3>
		{{$sec->description}}
		</br></br></br></br>
	</div>
@endforeach


=======
@extends('layouts.main')
@section('content')
<h1>{{$cat->name}}</h1>
<ul data-orbit data-options="animation:slide;
                  pause_on_hover:true;
                  animation_speed:500;
                  navigation_arrows:true;
                  bullets:false;">
  <li>
  	{{HTML::image('foundation/img/satelite-orbit.jpg', $alt="slide 1")}}
    <div class="orbit-caption">
      Caption One.
    </div>
  </li>
  <li class="active">
  	{{HTML::image('foundation/img/andromeda-orbit.jpg', $alt="slide 2")}}
    <div class="orbit-caption">
      Caption Two.
    </div>
  </li>
  <li>
	{{HTML::image('foundation/img/launch-orbit.jpg', $alt="slide 3")}}  
    <div class="orbit-caption">
      Caption Three.
    </div>
  </li>
</ul>


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
		<h3 id='#sec{{$sec->id}}'>{{$sec->name}}</h3>
		{{$sec->description}}
		</br></br></br></br>
	</div>
@endforeach


>>>>>>> 3aeecd3f4c1a5b83f1cc16a6bceef425f07df988
@stop