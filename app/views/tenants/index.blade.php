	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div>
	<table class="table table-hover">
		<th>
			Tenants
		</th>
		@foreach ($users as $user) 
		<tr>
			<td>
				{{$user}}
			</td>
		</tr>	
		@endforeach
	</table>
</div>