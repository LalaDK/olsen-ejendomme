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
	<script type="text/javascript">

	$(document).ready(function() {
		$("li").mouseover(function(){
			$(this).children().find(".menu-icon").css("fill","#fb9821");
		});
		$("li").mouseout(function(){
			$(this).children().find(".menu-icon").css("fill","#000000");
		});
	});

	</script>
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
					<li><?php include("../app/images/Dashboard.svg"); ?><br>Dashboard</li>
					<li><?php include("../app/images/Dashboard.svg"); ?><br>Lejere</li>
					<li><?php include("../app/images/Dashboard.svg"); ?><br>Økonomi</li>
					<li><?php include("../app/images/Dashboard.svg"); ?><br>Selskab</li>
					<li><?php include("../app/images/Dashboard.svg"); ?><br>Selskab</li>
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