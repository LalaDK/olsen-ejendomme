@extends('layouts.master')

@section('content')

<script>
	$(document).ready(function(){
		$('#company-table').DataTable({
			"bPaginate": false,
			"bLengthChange": false,
			"bFilter": true,
			"bSort": false,
			"bInfo": false,
			"bAutoWidth": false
		});
	});

	function toggleVisibility(id) {
		$(".details-" + id).fadeToggle();
	}
</script>

<h3>Selskab</h3>

<div class="col-md-10">
	<ul class="nav nav-tabs" data-tabs="tabs" id="tenantTabs">
		@foreach ($companies as $company) 
		<li><a href="#{{$company->id}}" role="tab" data-toggle="tab">{{$company->name}}</a></li>
		@endforeach
	</ul>
	<div class="tab-content">

		@foreach ($companies as $company) 
		<div class="tab-pane" id="{{$company->id}}">
			<div class="col-md-6">



				<b>Ejendomme</b>
				<table id="company-table" class="table-stribed table-hover table-curved">
					<thead>
						<th>ID</th>
						<th>Adresse</th>
						<th>Matrikel nr.</th>
						<th>Antal lejemål</th>
						<th>*udvid</th>
					</thead>
					@foreach ($company->realestates as $estate)
					<tbody>					
						<tr onClick="toggleVisibility({{$estate->id}});">
							<td>{{ $estate->id }}</td>
							<td>{{ $estate->street_name }} {{ $estate->street_number }}</td>
							<td>{{ $estate->cadastral_number }}</td>
							<td>{{ $estate->leases_count }}</td>
							<td><span id="icon-{{ $estate->id }}" class="glyphicon glyphicon-chevron-down"></span></td>
						</tr>
						@foreach ($estate->leases as $lease) 
						<tr class="details-{{$estate->id}}" style="display:none;"><!-- The hidden row -->	
							<td>{{$lease->id}}</td>
							<td>{{ $estate->street_name }} {{ $estate->street_number }} ({{$lease->description}})</td>
							<td>{{$lease->type}}</td>
							<td></td>
							<td></td>
						</tr>
						@endforeach
						@endforeach
					</tbody>
				</table>
			</div>


			<div class="col-md-6">
				<b>Venteliste</b>
				<table id="company-table" class="table-stribed table-hover table-curved">
					<thead>
						<th>ID</th>
						<th>Adresse</th>
						<th>Matrikel nr.</th>
						<th>Antal lejemål</th>
						<th>*udvid</th>
					</thead>
					@foreach ($company->realestates as $estate)
					<tbody>					
						<tr onClick="toggleVisibility({{$estate->id}});">
							<td>{{ $estate->id }}</td>
							<td>{{ $estate->street_name }} {{ $estate->street_number }}</td>
							<td>{{ $estate->cadastral_number }}</td>
							<td>{{ $estate->leases_count }}</td>
							<td><span id="icon-{{ $estate->id }}" class="glyphicon glyphicon-chevron-down"></span></td>
						</tr>
						@foreach ($estate->leases as $lease) 
						<tr class="details-{{$estate->id}}" style="display:none;"><!-- The hidden row -->	
							<td>{{$lease->id}}</td>
							<td>{{ $estate->street_name }} {{ $estate->street_number }} ({{$lease->description}})</td>
							<td>{{$lease->type}}</td>
							<td></td>
							<td></td>
						</tr>
						@endforeach
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
		<pre>
			<?php print_r($companies); ?>
			</pre>
		@endforeach
	</div>
</div>
</div>
@stop