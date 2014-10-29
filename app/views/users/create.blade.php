@extends('layouts.lightbox')
@section('content')
<div class="create-user-box box"> 
	<div class="title-text">Opret bruger</div>
	{{Form::open(['route' => 'users.store'])}}
	{{Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Navn'))}}
	{{ $errors->first('name','<div class="alert alert-danger" role="alert">:message</div>') }}
	{{Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'E-mail'))}}
	{{ $errors->first('username','<div class="alert alert-danger" role="alert">:message</div>') }}

	{{Form::password('password', array('class' => 'form-control', 'placeholder' => 'Kodeord'))}}
	{{ $errors->first('password','<div class="alert alert-danger" role="alert">:message</div>') }}

	{{Form::password('confirm_password', array('class' => 'form-control', 'placeholder' => 'Bekræft Kodeord'))}}
	{{ $errors->first('confirm_password','<div class="alert alert-danger" role="alert">:message</div>') }}
	
	{{Form::submit('Opret bruger', array('class' => 'btn btn-success button'))}}
	{{ Form::close() }}
	<input type="button" class="btn btn-success" style="margin-bottom: 5px;" onClick="lightbox_parent_reload()" value="Annuller"/>	
</div>
@stop