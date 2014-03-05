@extends('layouts.main')
@section('content')
<!-- -->
		<h2>Users</h2>

		<div class="larg-8 small-12 columns">
						
			@foreach($users as $user)
			<li>
				{{$user->name.' '.$user->lastname}}
			</li>
			@endforeach
		</div>
		
		<div class="large-8 small-12 columns">
		
			<fieldset>
				<legend>Create New Account</legend>             
				{{ Form::label('name', 'Full Name') }}
				{{ Form::text('name',$user->name,array('placeholder'=>'Tell us your whole name')) }}
				{{ Form::label('email', 'Email') }}
				{{ Form::text('email',$user->email,array('placeholder'=>'Valid email used to login and receive information from us')) }}
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password',$user->password,array('placeholder'=>'Gimme your password')) }}
				{{ Form::submit('Create Account',array('class'=>'button')) }}
			</fieldset>
		</div>
@stop