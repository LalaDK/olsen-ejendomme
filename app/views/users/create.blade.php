@extends('layouts.lightbox')
@section('content')
<div class="create-user-box box"> 
<div id="alert" class="alert-box"></div>
	<div class="title-text">Opret bruger</div>
	{{Form::open(['route' => 'users.store'])}}
	{{Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Navn'))}}
	{{Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'E-mail'))}}
	{{Form::password('password', array('class' => 'form-control', 'placeholder' => 'Kodeord'))}}
	{{Form::submit('Opret bruger', array('class' => 'btn btn-success button'))}}
	{{ Form::close() }}
</div>
@stop