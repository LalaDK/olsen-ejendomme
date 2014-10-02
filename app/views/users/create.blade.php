@extends('layouts.lightbox')




@section('content')
<div class="container-fluid box create-user-box">
<div class="title-text">Opret bruger</div>
<a href='#' onclick="closeLitebox();">Mads</a>

	{{Form::open(['route' => 'users.store'])}}
	{{Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Navn'))}}
	{{Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'E-mail'))}}
	{{Form::password('password', array('class' => 'form-control', 'placeholder' => 'Kodeord'))}}
	{{Form::submit('Opret bruger', array('class' => 'btn btn-success button'))}}
	{{ Form::close() }}
	
</div>
@stop