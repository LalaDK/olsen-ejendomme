<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Olsen Ejendomme</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../app/css/style.css">
	<link rel="stylesheet" type="text/css" href="../app/css/dashboardstyle.css">	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<body style="width:500px;">
	<div class="container-fluid">
		@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif
		@yield('content')
	</div>
</body>
</html>