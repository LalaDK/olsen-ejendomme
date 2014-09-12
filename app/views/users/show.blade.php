@extends('layouts.lightbox')
@section('content')

<table class="table table-curved">
	<th>Felt</th>
	<th>Data</th>

		<tr>
			<td>Navn</td><td>{{ $user->name }}</td>
		</tr>
		<tr>
			<td>E-mail</td><td>{{ $user->email }}</td>
		</tr>
</table>

@stop