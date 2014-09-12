@extends('layouts.lightbox')
@section('content')

<table border=1>
	<tr>
		<td>Navn</td><td>{{ $user->name }}</td>
	</tr>
	<tr>
		<td>E-mail</td><td>{{ $user->email }}</td>
	</tr>
</table>

@stop