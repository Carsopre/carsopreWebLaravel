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

		 	@if( isset($perm_cre) AND $perm_cre)
		 	<fieldset>
		 		<legend>{{ ucfirst($class_sub_item) }}</legend>
		 		<a href="{{ URL::to( $class_sub_item . '/'.'create') }}" class="small button radius">New {{ ucfirst($class_sub_item) }}</a>
		 		@if($sub_item->count() > 0)

		 		<table>
					<thead>
						<tr>
							<th>Name</th>
							@if($actions)
								<th>Actions</th>
							@endif
						</tr>
					</thead>
				<tbody>	
					@foreach($sub_item as $si)
		 			<tr>
						<td> {{$si->name}}</td>
						<td>
						@if($actions>1)
							<ul class="button-group radius">
						@endif							
							@if($perm_upd)
								@if($actions>1)<li>@endif
								<a href="{{ URL::to( $class_sub_item . '/' . $si->id .'/edit') }}" class="small button radius">Edit</a>
								@if($actions>1)</li>@endif								
							@endif

							@if($perm_del)
								@if($actions>1)<li>@endif
								
								{{ Form::open(array('url' => $class_sub_item . '/' . $si->id, 'class' => 'pull-right')) }}
									{{ Form::hidden('_method', 'DELETE') }}
									{{ Form::submit('Delete', array('class' => 'small alert button radius')) }}
								{{ Form::close() }}

								@if($actions>1)</li>@endif
							@endif
							
						@if($actions>1)
							</ul></td>
						@else
							</td>
						@endif
					</tr>		
					@endforeach
				</tbody>
				@endif				
				</table>
				
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
@stop