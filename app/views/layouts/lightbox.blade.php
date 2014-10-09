<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Olsen Ejendomme</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
	{{ HTML::style('/css/lightbox.css') }}
	{{ HTML::style('/css/style.css') }}
	{{ HTML::script('/scripts/site.js') }}
</head>

<body>
	<div class="container-fluid">
		
		
		
		@yield('content')
		@if (Session::has('message'))
		<script>
		document.getElementById('alert').innerHTML = "{{ Session::get('message') }}";
		document.getElementById("alert").style.display="block";
		</script>
		@endif
	</div>
</body>
</html>