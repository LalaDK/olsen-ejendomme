<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Olsen Ejendomme</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../app/css/lightbox.css">	
</head>

<body>
	<div class="container-fluid">
		@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif
		@yield('content')
		</div>
	</div>
</body>
</html>