<!DOCTYPE html>
<html>
<head>
	<h2>Create User</h2>
</head>
<body>
	{{Form::open(['route' => 'users.store'])}}
	{{Form::label('name', 'Navn:')}}
	{{Form::text('name', 'name')}}
	{{Form::label('username', 'E-mail:')}}
	{{Form::text('username', 'username')}}
	{{Form::label('password', 'Kodeord:')}}
	{{Form::password('password')}}
	{{Form::submit('Create user')}}
</body>
</html>