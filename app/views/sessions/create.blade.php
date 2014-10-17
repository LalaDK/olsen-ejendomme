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
				{{Form::select('selskab',
					array(
						'e1 1' => 'Selskab 1',
						'e2 2' => 'Selskab 2',
						'e3 3' => 'Selskab 3',
						'e3 4' => 'Selskab 4',
						'e4 5' => 'Selskab 5'
						),'',
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