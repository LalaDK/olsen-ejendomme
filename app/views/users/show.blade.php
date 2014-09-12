@extends('layouts.lightbox')
@section('content')

<table class="table-curved">
	<th>Felt</th>
	<th>Data</th>
	<tr>
		<tr>
			<td>Navn</td><td>{{ $user->name }}</td>
		</tr>
		<tr>
			<td>E-mail</td><td>{{ $user->email }}</td>
		</tr>
	</tr>
</table>

@stop