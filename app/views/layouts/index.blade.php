@extends('layouts.main')
@section('content')
<!-- -->
		<h2>List of {{ $table_title }}</h2>

		<div class="large-12 large-centered columns">
			@if($perm_cre)
				<a href="{{{$class}}}/create" class="small button radius">Create {{$table_title}}</a>
			@endif			
			<table>
				<thead>
					<tr>
						@foreach($table_header as $th)
						<th>{{$th}}</th>
						@endforeach	
						@if($actions)
							<th>Actions</th>
						@endif
					</tr>
				</thead>
				<tbody>					
					@foreach($table_content as $tc)
					<tr>
						@foreach($table_columns as $tcc)						
						<td> {{ $tc->$tcc }} </td>
						@endforeach
						@if($actions>1)
							<td><ul class="button-group radius">
						@else
							<td>
						@endif
							@if( isset($perm_rea) AND $perm_rea)
								@if($actions>1)<li>@endif
								<a href="{{ URL::to( $class . '/' . $tc->id ) }}" class="small button success radius">Show</a>
								@if($actions>1)</li>@endif								
							@endif
							@if($perm_upd)
								@if($actions>1)<li>@endif
								<a href="{{ URL::to( $class . '/' . $tc->id .'/edit') }}" class="small button radius">Update</a>
								@if($actions>1)</li>@endif								
							@endif

							@if($perm_del)
								@if($actions>1)<li>@endif
								
								{{ Form::open(array('url' => $class . '/' . $tc->id, 'class' => 'pull-right')) }}
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
			</table>
			@if($perm_cre)
				<a href="{{{$class}}}/create" class="small button radius">Create {{$table_title}}</a>
			@endif
		</div>
@stop