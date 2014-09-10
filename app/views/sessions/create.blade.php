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
	{{ Form::open(['url' => 'login']) }}
		{{Form::label('username', 'E-mail:')}}
		{{Form::text('username')}}
	</div>
	<div>
		{{Form::label('password', 'Kodeord:')}}
		{{Form::password('password')}}
	</div>

	<div>
		{{
			Form::select(
				array(
					'Ejendomsselskab 1' => 
					)
			)
			}}
	</div>

	{{Form::submit('Login')}}
	{{ Form::Close()}}
</div>

</body>
</html>