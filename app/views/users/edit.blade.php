@extends('layouts.lightbox')

@section('content')
	{{Form::open(['route' => 'users.update'])}}

	{{Form::label('name', 'Navn:')}}
	{{Form::text('name', $user->name)}}

	{{Form::label('username', 'E-mail:')}}
	{{Form::text('username', $user->email)}}

	{{Form::label('password', 'Kodeord:')}}
	{{Form::password('password')}}

	{{Form::submit('Opdatér')}}
@stop