<<<<<<< HEAD
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
=======
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
>>>>>>> 3aeecd3f4c1a5b83f1cc16a6bceef425f07df988
		 	@endif 