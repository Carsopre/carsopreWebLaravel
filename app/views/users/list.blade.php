@extends('layouts.main')
@section('content')
<!-- -->
		<h2>Users</h2>

		<div class="larg-8 small-12 columns">
						
			@foreach($users as $user)
			<li>
				{{$user->username.' '}}
			</li>
			@endforeach
		</div>
@stop