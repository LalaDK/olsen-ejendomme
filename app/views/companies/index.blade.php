@extends('layouts.master')
@section('content')

<script>
	$('#companyTabs a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	})


	$(document).ready(function(){
		$('#company-table').DataTable();

		$('#companyTabs a:first').tab('show');



	});

	function toggleVisibility(id) {
		$(".details-" + id).fadeToggle();
	}

	function deleteWaitEntry(id) {
		var agree = confirm('Er du sikker på at du vil fjerne klienten fra ventelisten?\nOBS. Klienten slettes også, såfremt klienten ikke er tilknyttet en lejekontrakt.');
		if(agree) {
			$.ajax(
			{
				url:"WaitingListController/destroy?id=" + id,
				success:function(result){
					location.reload();
				},
				error:function(result) {
					alert('Der skete en fejl.\n' + result.responseText);
				}
			});
		}
	}
</script>

<h3>Selskab</h3>
<div class="col-md-10">
	<ul class="nav nav-tabs" data-tabs="tabs" id="companyTabs">
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
					@foreach ($company->wait_list_entry as $wait_list_entry)
					<tbody>					
						<tr onClick="">
							<td>{{ $wait_list_entry->id }}</td>
							<td>{{ $wait_list_entry->client->firstname }} {{ $wait_list_entry->client->lastname }}</td>
							<td>{{ $wait_list_entry->client->phone }}</td>
							<td>{{ $wait_list_entry->client->email }}</td>

							<td><span id="" class="glyphicon glyphicon-envelope"></span></td>

							<td id="{{ $wait_list_entry->id }}" onClick="deleteWaitEntry(this.id);">
								<span class="glyphicon glyphicon-remove"></span></td>

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