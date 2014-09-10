<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Olsen Ejendomme</title>
	<link rel="stylesheet" type="text/css" href="../app/css/style.css">
	<link rel="stylesheet" type="text/css" href="../app/css/dashboardstyle.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="row">
		<div class="col-md-12 ">
			<div class="dashboard-header">
				Olsen Ejendomme
			</div>
		</div>
	</div>

	<div class="row row-menu">
		<div class="col-md-1 col-menu">
			<div class="menu">
				<ul>
					<li><img src="../app/images/gauge.png"></li>
					<li><img src="../app/images/tenants.png"></li>
					<li><img src="../app/images/economics.png"></li>
					<li><img src="../app/images/office.png"></li>
				</ul>
			</div>
		</div>
		<div class="col-md-11 ">

			@yield('content')
		</div>
	</div>
</div>
</body>
</html>