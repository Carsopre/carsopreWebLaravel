@extends('layouts.main')
@section('content')
	<h2>Create {{ucfirst($class)}}</h2>
	{{ Form::open($form) }}
	    <fieldset class="stacked register">
		<legend>{{$title}}</legend>
	    <ul>
	        @foreach($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	    </ul>
	 
	    @foreach($field as $form)
	    	{{ Form::$form[0]($form[1],
	    				null,
	    				array('class'=>$form[2],
	    					'placeholder'=>$form[3])) }}
	    @endforeach

	    @if(isset($sel))
	    	<fieldset>
	    		<legend>Select {{ucfirst($sel)}}</legend>
	    		<select name='category_id'>
	    			@foreach($sel_it as $si)
	    				<option value='{{$si->id}}'>{{$si->name}}</option>
	    			@endforeach
	    		</select>	    		
	    	</fieldset>

	    @endif
	    </br>
	 	<div class="large-12 columns">
		    {{ Form::submit('Create',
				     array('class'=>'small button radius'))}}
		    <a href="{{URL::previous()}}" class="small button alert radius">Back</a>
	    </div>
	    </fieldset>
	{{ Form::close() }}
@stop