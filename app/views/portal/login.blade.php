@section('content')
  <div class="form-in-mid">
    <div class="large-8 large-centered columns">
    {{ Form::open(array('url'=>'portal/signin', 'class'=>'form-signin')) }}
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
   
  	<div class="small-6 column">
      {{ Form::submit(
  		  'Login', 
  		  array('class'=>'button expand'))}}
      </div>
      <div class="small-6 column">
  		{{ HTML::link('portal/register', 'Register', array('class'=>'button expand')) }}
      </div>
      </fieldset>
    {{ Form::close() }}
    </div>
  </div>
  
@stop