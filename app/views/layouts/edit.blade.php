<<<<<<< HEAD
@extends('layouts.main')
@section('content')
	<h2>Edit {{ucfirst($class)}}</h2>
	{{ Form::model($class_item, $form) }}
	    <fieldset class="stacked register">
		<legend>Edit {{$class}}</legend>
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
	    <div>
	    	@if(isset($sel))
	    	<fieldset>
	    		<legend>Select {{ucfirst($sel)}}</legend>
	    		<select name='category_id'>
	    			@foreach($sel_it as $si)
	    				@if($si->id == $sel_pred )
		    				<option value='{{$si->id}}' selected="selected">{{$si->name}}</option>
	    				@else
	    					<option value='{{$si->id}}'>{{$si->name}}</option>
    					@endif
	    			@endforeach
	    		</select>	    		
	    	</fieldset>
	    	@endif

	 	</div>
	 	</br>
	 	<div class="large-12 columns">
		    {{ Form::submit('Edit',
				     array('class'=>'small button radius'))}}
		    <a href="{{URL::previous()}}" class="small button alert radius">Back</a>
	    </div>
	    </fieldset>
	{{ Form::close() }}
=======
@extends('layouts.main')
@section('content')
	<h2>Edit {{ucfirst($class)}}</h2>
	{{ Form::model($class_item, $form) }}
	    <fieldset class="stacked register">
		<legend>Edit {{$class}}</legend>
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
	    <div>
	    	@if(isset($sel))
	    	<fieldset>
	    		<legend>Select {{ucfirst($sel)}}</legend>
	    		<select name='category_id'>
	    			@foreach($sel_it as $si)
	    				@if($si->id == $sel_pred )
		    				<option value='{{$si->id}}' selected="selected">{{$si->name}}</option>
	    				@else
	    					<option value='{{$si->id}}'>{{$si->name}}</option>
    					@endif
	    			@endforeach
	    		</select>	    		
	    	</fieldset>
	    	@endif

	 	</div>
	 	</br>
	 	<div class="large-12 columns">
		    {{ Form::submit('Edit',
				     array('class'=>'small button radius'))}}
		    <a href="{{URL::previous()}}" class="small button alert radius">Back</a>
	    </div>
	    </fieldset>
	{{ Form::close() }}
>>>>>>> 3aeecd3f4c1a5b83f1cc16a6bceef425f07df988
@stop