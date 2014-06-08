<<<<<<< HEAD
@extends('layouts.main')
@section('content')
<!-- -->
		<h2>Users</h2>

		<div class="larg-8 small-12 columns">
						
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>E-mail</th>
						<th>ProfileID</th>
						
					</tr>
				</thead>
				<tbody>					
					@foreach($users as $user)
					<tr>						
						<td> {{ $user->id }} </td>
						<td> {{ $user->username }} </td>
						<td> {{ $user->email }} </td>
						<td> {{ $user->profile_id }} </td>
					</tr>
					@endforeach					
				</tbody>				
			</table>
		</div>
=======
@extends('layouts.main')
@section('content')
<!-- -->
		<h2>Users</h2>

		<div class="larg-8 small-12 columns">
						
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>E-mail</th>
						<th>ProfileID</th>
						
					</tr>
				</thead>
				<tbody>					
					@foreach($users as $user)
					<tr>						
						<td> {{ $user->id }} </td>
						<td> {{ $user->username }} </td>
						<td> {{ $user->email }} </td>
						<td> {{ $user->profile_id }} </td>
					</tr>
					@endforeach					
				</tbody>				
			</table>
		</div>
>>>>>>> 3aeecd3f4c1a5b83f1cc16a6bceef425f07df988
@stop