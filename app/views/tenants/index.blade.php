	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../app/css/dashboardstyle.css">
	<div class="panel">
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Panel title</h3>
				</div>
				<div class="panel-body">
					Panel content
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Panel title</h3>
				</div>
				<div class="panel-body">
					Panel content
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Panel title</h3>
				</div>
				<div class="panel-body">
					Panel content
				</div>
			</div>
		</div>

		<div class="col-md-10">
			<table class="table-stribed table-curved" style="width:50%">
				<th>
					T
				</th>
				<th>
					Id
				</th>
				<th>
					E-Mail
				</th>
				@foreach ($users as $user) 
				<tr>
					<td>
						>
					</td>
					<td>
						{{$user->id}}
					</td>
					<td>
						{{$user->email}}
					</td>
				</tr>	
				@endforeach
			</table>
		</div>
	</div>