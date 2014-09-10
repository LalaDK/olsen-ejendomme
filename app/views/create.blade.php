@extends('layouts.master')

@section('content')
<div class="login-box">
	<p>Velkommen! Log ind for at adgang til systemet</p>
	<div>
	{{ Form::open(sessionsController.create) }}
		{{Form::label('username', 'Brugernavn:')}}
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