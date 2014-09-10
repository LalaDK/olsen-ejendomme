@extends('layouts.master')

@section('content')
<div id="loginbox" class="container-fluid">
	<p>Velkommen! Log ind for at adgang til systemet</p>
	<div>

	{{ Form::open(['route'=>'sessions.store']) }}
		{{Form::label('email', 'E-Mail:')}}
		{{Form::text('email')}}

	</div>
	<div>
		{{Form::label('password', 'Kodeord:')}}
		{{Form::password('password')}}
	</div>

	{{Form::submit('Login')}}
	{{ Form::Close()}}
</div>
@stop