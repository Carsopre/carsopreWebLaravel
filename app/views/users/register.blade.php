@section('content')
<div class="large-8 columns">
{{ Form::open(array('url'=>'users/create', 'class'=>'form-signup')) }}
    <fieldset class="stacked register">
   <legend>Register</legend>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
 
    {{ Form::text('username', 
		    null, 
		    array('class'=>'field', 
			  'placeholder'=>'User Name')) }}
    {{ Form::text('email',
		    null, 
		    array('class'=>'field', 
			  'placeholder'=>'Email Address')) }}
    {{ Form::password('password',
		    null,
		    array('class'=>'field', 
			  'placeholder'=>'Password')) }}
    {{ Form::password('password_confirmation',
		    null,
		    array('class'=>'field', 
			  'placeholder'=>'Confirm Password')) }}
 
    {{ Form::submit('Register',
		     array('class'=>'button large-12 columns'))}}
    
    </fieldset>
{{ Form::close() }}
</div>
@stop