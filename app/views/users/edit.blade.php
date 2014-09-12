@extends('layouts.lightbox')

@section('content')
{{Form::open(['route' => ['users.update', $user->id]])}}
{{Form::hidden('_method', 'PUT') }}

{{Form::label('name', 'Navn:')}}
{{Form::text('name', $user->name)}}

{{Form::label('username', 'E-mail:')}}
{{Form::text('email', $user->email)}}

{{Form::label('password', 'Kodeord:')}}
{{Form::password('password')}}

{{Form::submit('Opdatér')}}
@stop