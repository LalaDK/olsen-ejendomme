<!DOCTYPE html>
<html>
<head>
	<title>Olsen Ejendomme A/S</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../app/css/style.css">
</head>
<body>

	<div id="loginbox" class="container-fluid loginbox">
	<div class="top">Log ind</div>
	<br>
		{{Form::open(['route'=>'sessions.store', 'class' => 'form-inline']) }}
		{{Form::text('email','', ['class' => 'form-control', 'style' => 'width:100%']) }}
		<br>
		{{Form::password('password', ['class' => 'form-control', 'style' => 'width:100%'])}}
		<br>
		{{ HTML::link('http://test.com', 'Glemt password?')}}
		<br>
		{{Form::select('selskab',
			array(
				'e1 1' => 'Selskab 1',
				'e2 2' => 'Selskab 2',
				'e3 3' => 'Selskab 3',
				'e3 4' => 'Selskab 4',
				'e4 5' => 'Selskab 5'
				),'',
			['class' => 'form-control']
			)
		}}{{Form::submit('Login', ['class' => 'btn btn-success'])}}
		{{ Form::Close()}}
	</div>
</body>
</html>