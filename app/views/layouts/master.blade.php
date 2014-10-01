<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Olsen Ejendomme</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../app/css/dashboardstyle.css">	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	
	<link href="../app/scripts/litebox-master/assets/css/litebox.css" rel="stylesheet" />
	<script src="../app/scripts/litebox-master/assets/js/images-loaded.min.js"></script>
	<script src="../app/scripts/litebox-master/assets/js/litebox.js"></script>

	<script type="text/javascript">

		$(document).ready(function() {
			$("li").mouseover(function(){
				$(this).children().find(".menu-icon").css("fill","#fb9821");
			});

			$("li").mouseout(function(){
				if($(this).attr("id") != "selected"){
					$(this).children().find(".menu-icon").css("fill","#000000");
				}
			});

		});

		function setselected(select_id){
			$("ul").find(select_id).attr('id',"selected");
			$("ul").find("#selected").addClass('selected');
			$("ul").find("#selected").children().find(".menu-icon").css("fill","#fb9821");
		}

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
					<li id="dashboard" onclick='location.href="/olsen-ejendomme/public/dashboard"'><?php include("../app/images/Dashboard.svg"); ?><br>Dashboard</li>
					<li id="tenants" onclick='location.href="/olsen-ejendomme/public/tenants"'><?php include("../app/images/tenants.svg"); ?><br>Lejere</li>
					<li id="economic" onclick='location.href="/olsen-ejendomme/public/dashboard"'><?php include("../app/images/company.svg"); ?><br>Økonomi</li>
					<li id="company" onclick='location.href="/olsen-ejendomme/public/dashboard"'><?php include("../app/images/economic.svg"); ?><br>Selskab</li>
					<li id="dashboard" onclick='location.href="/olsen-ejendomme/public/dashboard"'><?php include("../app/images/dashboard.svg"); ?><br>Selskab</li>
				</ul>
			</div>
		</div>
		<div class="col-md-11 ">
			<div id="main-content">
			</div>
			@yield('content')
		</div>
		
	</div>
</div>
<!-- Script for activating and setting up liteboxes -->
<script>
	$('.litebox').liteBox();
</script>

</body>
</html>