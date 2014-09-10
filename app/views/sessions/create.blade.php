@extends('layouts.master')

@section('content')
<div id="loginbox" class="container-fluid">
	<p>Velkommen! Log ind for at adgang til systemet</p>
	<div>
	{{ Form::open(['url' => 'login']) }}
		{{Form::label('username', 'E-mail:')}}
		{{Form::text('username')}}
	</div>
	<div>
		{{Form::label('password', 'Kodeord:')}}
		{{Form::password('password')}}
	</div>

	{{Form::submit('Login')}}
	{{ Form::Close()}}
</div>
@stop