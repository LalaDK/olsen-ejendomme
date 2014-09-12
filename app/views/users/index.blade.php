@extends('layouts.lightbox')
@section('content')
<table class="table-curved">
	<tr>
		<th>Navn</th>
		<th>E-mail</th>
		<th>Vis</th>
		<th>Redigér</th>
		<th>Slet</th>
	</tr>
	@foreach ($users as $user) 
	<tr>
		<td>{{ $user->name }} </td>
		<td>{{ $user->email }} </td>
		<!-- Vis -->
		<td> 
			{{Form::open(array('action' => array('UserController@show', $user->id))) }}
			{{ Form::hidden('_method', 'GET') }}
			{{Form::submit('Vis')}}
			{{ Form::close() }}
		</td>

		<!-- Redigér -->
		<td> 
			{{Form::open(array('action' => array('UserController@edit', $user->id))) }}
			{{ Form::hidden('_method', 'GET') }}
			{{Form::submit('Redigér')}}
			{{ Form::close() }}
		</td>		

		<!-- Slet -->
		<td> 
			{{ Form::open(array('url' => 'users/' . $user->id, 'class' => 'pull-right')) }}
			{{ Form::hidden('_method', 'DELETE') }}
			{{ Form::submit('Slet') }}
			{{ Form::close() }}
		</td>
	</tr>
	@endforeach
</table>
@stop