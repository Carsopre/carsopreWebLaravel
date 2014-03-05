@section('content')
  <div class="large-8 columns">
  {{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
    <fieldset class="stacked login">
      <legend> Log in </legend>
    {{ Form::text(
		  'username', 
		  null, 
		  array('id'=>'username', 'class'=>'field', 
			'type'=>'string', 'placeholder'=>'Username')) }}
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