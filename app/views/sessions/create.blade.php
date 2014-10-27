@extends('layouts.lightbox')
@section('content')
<div id="login-box" class="box">
	<div class="top">Log ind</div>
	@if (Session::has('message'))
	<div id="alert" class="alert alert-info">{{ Session::get('message') }}</div>
	@endif

	{{Form::open(['route'=>'sessions.store', 'class' => 'form-inline']) }}
	{{Form::text('email',Input::old('email'), array('placeholder'=>'user@example.com', 'class' => 'form-control', 'style' => 'width:100%'))}}
	{{Form::password('password', ['class' => 'form-control', 'style' => 'width:100%'])}}
	{{ HTML::link('#', 'Glemt password?', array('style' => 'pointer-events: none;'))}}
	<br>
	<table style="width:100%;">
		<tr>
			<td style="width:100%;">
				{{Form::select('selskab', $companies,'',
					['class' => 'form-control', 'style' => 'width:100%;']
					)
				}}
			</td>
			<td>
				{{Form::submit('Login', ['class' => 'btn btn-success loginbutton'])}}
				{{ Form::Close()}}
			</td>
		</tr>
	</table>
</div>
@stop