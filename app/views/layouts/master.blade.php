<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Olsen Ejendomme</title>
	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js') }}
	{{ HTML::script('http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js') }}
	{{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}
	{{ HTML::style('scripts/litebox-master/assets/css/litebox.css') }}
	{{ HTML::script('scripts/litebox-master/assets/js/images-loaded.min.js') }}
	{{ HTML::script('scripts/litebox-master/assets/js/litebox.js') }}
	{{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css') }}
	{{ HTML::style('css/style.css') }}
	{{ HTML::script('/scripts/site.js') }}
	{{ HTML::script('scripts/jquery-cookie/jquery.cookie.js') }}
	{{ HTML::style('scripts/litebox-master/assets/css/litebox.css') }}
	{{ HTML::style('scripts/hint.css/hint.css') }}
	{{ HTML::style('//cdn.datatables.net/1.10.3/css/jquery.dataTables.min.css') }}
	{{ HTML::script('//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js') }}




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
					<li id="economic" onclick='location.href="/olsen-ejendomme/public/dashboard"'><?php include("../app/images/economic.svg"); ?><br>Økonomi</li>
					<li id="company" onclick='location.href="/olsen-ejendomme/public/companies"'><?php include("../app/images/company.svg"); ?><br>Selskab</li>
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
	$('.litebox').liteBox({
  revealSpeed: 0,
  background: 'rgba(0,0,0,.8)',
  overlayClose: true,
  escKey: true,
  navKey: false,
  errorMessage: 'Error loading content.'
});
</script>

</body>
</html>