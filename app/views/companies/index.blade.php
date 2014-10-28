@extends('layouts.master')

@section('content')

<script>
$(document).ready(function(){
	$('#company-table').DataTable();

function toggleVisibility(id) {
	$(".details-"+id).fadeToggle();
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
					<tbody>					
						@foreach ($company->realestates as $estate)
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
				<div class="well">
					{{ HTML::linkAction('TenantController@create', '+ Tilføj lejer', array($company->id),array('class'=>'litebox btn btn-create', 'target' => '_self')) }}
				</div>

				<table id="company-table" class="table-stribed table-hover table-curved">
					<thead>
						<th>nr.</th>
						<th>Navn</th>
						<th>Telefon nr.</th>
						<th>Email</th>
						<th>Besked</th>
						<th>Slet</th>
						<th></th>
					</thead>
					@foreach ($company->waiting_lists as $waiting_list)
					<tbody>					
						<tr onClick="">
							<td>{{ $waiting_list->client->id }}</td>
							<td>{{ $waiting_list->client->firstname }} {{ $waiting_list->client->lastname }}</td>
							<td>{{ $waiting_list->client->phone }}</td>
							<td>{{ $waiting_list->client->email }}</td>
							<td>{{ $waiting_list->client->notes }}</td>
							<td onClick="alert();"><span id="" class="glyphicon glyphicon-remove"></span></td>
							<td><span id="" class="glyphicon glyphicon-chevron-down"></span></td>

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
		@endforeach
	</div>
</div>
</div>
@stop