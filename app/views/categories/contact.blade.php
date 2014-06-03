@extends('layouts.main')
@section('content')
<div class="form-in-mid">
	<fieldset>
		<legend><h1>Contact me!</h1></legend>
		<div class="row">
			<div class="centered columns">
				<p>
					Please, feel free to contact me using any of the following methods:
					e-mail, facebook, twitter, linkedin. I will be pleased to answer you.					
				</p>
			</div>
		</div>
		</br>
		<div class="row">
			<div class="large-3 small-3 centered columns">
				<a href="//mailto:sorianoperez.carles@gmail.com">
					{{HTML::image('assets/imgs/Gmail-icon.png')}}
				</a>
			</div>
		
			<div class="large-3 small-3 centered columns">
				<a href="//www.facebook.com/cssp1989">
					{{HTML::image('assets/imgs/Facebook-icon.png')}}
				</a>
			</div>
		
			<div class="large-3 small-3 centered columns">
				<a href="//www.twitter.com/carsopre">
				{{HTML::image('assets/imgs/Twitter-icon.png')}}
				</a>
			</div>
		
			<div class="large-3 small-3 centered columns">
				<a href="https://www.linkedin.com/in/carsopre">
					{{HTML::image('assets/imgs/Linkedin-icon.png')}}
				</a>
			</div>
		</div>
	</fieldset>
</div>
@stop