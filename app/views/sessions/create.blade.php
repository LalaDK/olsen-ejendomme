<!DOCTYPE html>
<html>
<head>
	<title>Olsen Ejendomme A/S</title>
	<link rel="stylesheet" type="text/css" href="../app/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>

<div id="loginbox" class="container-fluid">
	<p>Velkommen! Log ind for at adgang til systemet</p>
	<div>
	{{ Form::open(['route'=>'sessions.store']) }}
		{{Form::label('email', 'E-mail:')}}
		{{Form::text('email')}}
	</div>
	<div>
		{{Form::label('password', 'Kodeord:')}}
		{{Form::password('password')}}
	</div>

	<div>
		{{
			Form::select('ejendomsselskab',
				array(
					'Ejendomsselskab 1' => 'e1',
					'Ejendomsselskab 2' => 'e2',
					'Ejendomsselskab 3' => 'e3',
					'Ejendomsselskab 4' => 'e4'
					)
			)
			}}
	</div>

	{{Form::submit('Login')}}
	{{ Form::Close()}}
</div>

</body>
</html>