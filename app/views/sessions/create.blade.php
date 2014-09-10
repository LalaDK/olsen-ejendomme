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

	<div class="container-fluid">
		<p>Velkommen! Log ind for at adgang til systemet</p>

			{{ Form::open(['route'=>'sessions.store']) }}
			<div class="form-group form-control btn btn-default">
				{{Form::label('email', 'E-mail:')}}
				{{Form::text('email')}}
				{{Form::label('password', 'Kodeord:')}}
				{{Form::password('password')}}
				{{
					Form::select('selskab',
						array(
							'e1 1' => 'Selskab 1',
							'e2 2' => 'Selskab 2',
							'e3 3' => 'Selskab 3',
							'e3 4' => 'Selskab 4',
							'e4 5' => 'Selskab 5'
							)
						)
					}}
				

				{{Form::submit('Login')}}
			</div>
			{{ Form::Close()}}
		</div>

	</body>
	</html>