@extends('layouts.main')
@section('content')
<div>
	<h2>Global Configuration</h2>
	</br>
 	<div class="large-12 columns">
	    {{ Form::submit('Save',
			     array('class'=>'small button radius'))}}
	    <a href="{{URL::previous()}}" class="small button alert radius">Back</a>
    </div>
    </br>
	<fieldset>
		<legend>Web Properties</legend>
		<div class="row">
			<div class="small-3 columns">
				<label for="project_name" class="right inline">Project Name</label>
			</div>
			<div class="small-9 columns">
			{{ Form::text('project_name',
							null,
							array('class'=>'field',
								'placeholder'=>'CarsopreWeb')) }}
			</div>
		</div>
		<div class="row">
			<div class="small-3 columns">
				<label for="web_logo" class="right inline">Web Logo</label>
			</div>
			<div class="small-9 columns">
				{{ Form::text('web_logo',
						null,
						array('class'=>'field',
							'placeholder'=>'Web Logo - TO-DO')) }}
			</div>	
		</div>
		<div class="row">
			<div class="small-3 columns">
				<label for="web_abstract" class="right inline">Web Abstract</label>
			</div>
			<div class="small-9 columns">
				<textarea id="web_abstract" placeholder="Write here a short comment about contact"></textarea>
			</div>	
		</div>
	</fieldset>
	</br>
	<fieldset>
		<legend>Contact</legend>
		<div class="row">
			<div class="small-3 columns">
				<label for="contact_name" class="right inline">Contact Name</label>
			</div>
			<div class="small-9 columns">
				{{ Form::text('contact_name',
						null,
						array('class'=>'field',
							'placeholder'=>'Person of contact')) }}
			</div>	
		</div>
		<div class="row">
			<div class="small-3 columns">
				<label for="conctat_email" class="right inline">Contact E-mail</label>
			</div>
			<div class="small-9 columns">
				{{ Form::text('contact_email',
							null,
							array('class'=>'field',
								'placeholder'=>'E-mail of contact')) }}		
			</div>	
		</div>
		<div class="row collapse">
			<div>
				<label for="contact_facebook">Contact Facebook</label>
			</div>
			<div class="small-3 columns">
				<span class="prefix">www.facebook.com/</span>
			</div>
			<div class="small-9 columns">
				{{ Form::text('contact_facebook',
							null,
							array('class'=>'field',
								'placeholder'=>'Facebook address')) }}		
			</div>	
		</div>
		<div class="row collapse">
			<div>
				<label for="contact_linkedin">Contact Linkedin</label>
			</div>
			<div class="small-3 columns">
				<span class="prefix">https://www.linkedin.com/in/</span>
			</div>
			<div class="small-9 columns">
				{{ Form::text('contact_linkedin',
							null,
							array('class'=>'field',
								'placeholder'=>'Linkedin username')) }}		
			</div>	
		</div>
		<div class="row collapse">
			<div>
				<label for="contact_twitter">Contact Twitter</label>
			</div>
			<div class="small-3 columns">
				<span class="prefix">https://www.twitter.com/</span>
			</div>
			<div class="small-9 columns">
				{{ Form::text('contact_twitter',
							null,
							array('class'=>'field',
								'placeholder'=>'Twitter username')) }}		
			</div>	
		</div>

		<div class="row">
			<div class="small-3 columns">
				<label for="contact_abstract" class="right inline">Contact abstract</label>
			</div>
			<div class="small-9 columns">
				<textarea id="contact_abstract" placeholder="Write here a short comment about contact"></textarea>
			</div>	
		</div>		
	</fieldset>
	</br>
 	<div class="large-12 columns">
	    {{ Form::submit('Save',
			     array('class'=>'small button radius'))}}
	    <a href="{{URL::previous()}}" class="small button alert radius">Back</a>
    </div>
</div>
@stop