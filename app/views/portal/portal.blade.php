@extends('layouts.default')

@section('content') 
  <div class="large-8 columns">
  {{ Form::open(array('url'=>'users/list')) }}
    <fieldset class="stacked login">
      <legend> Log in </legend>
    {{ Form::text(
		  'email', 
		  null, 
		  array('id'=>'email', 'class'=>'field', 
			'type'=>'email', 'placeholder'=>'Email Address')) }}
    {{ Form::password(
		  'password',
		  null,
		  array('id'=>'password', 'class'=>'field', 
			'type'=>'password', 'placeholder'=>'Password')) }}
 
    {{ Form::submit(
		  'Login', 
		  array('class'=>'button large-12 columns'))}}
    
    </fieldset>
  {{ Form::close() }}
  </div>
@stop