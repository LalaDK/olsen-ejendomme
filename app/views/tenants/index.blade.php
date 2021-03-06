@extends('layouts.master')

@section('content')

<script>
$(document).ready(function(){
	setselected("#tenants");
	$('#tenantTabs a:first').tab('show');
	$('.details').hide();
});
</script>

<h3>Lejere</h3>

<div class="col-md-10">
	<ul class="nav nav-tabs" data-tabs="tabs" id="tenantTabs">
		@foreach ($companies as $company) 
		<li><a href="#{{$company->id}}" role="tab" data-toggle="tab">{{$company->name}}</a></li>
		@endforeach
	</ul>
	<div class="tab-content">
		@foreach ($companies as $company) 
		<div class="tab-pane" id="{{$company->id}}">
			<div class="col-md-12">
				<br>
				{{ HTML::linkAction('ContractController@create', '+ Tilføj lejer', array($company->id),array('class'=>'litebox btn btn-create', 'target' => '_self')) }}
				<br>
				<br>
				<table class="table-stribed table-hover table-curved" style="width:100%">
					<th></th>
					<th>Navn</th>
					<th>Lejemåls ID</th>
					<th>Adresse</th>
					<th>By</th>
					<th>Postnummer</th>
					<th>Telefon</th>
					<th>Email</th>
					<th>Saldo</th>
					@foreach ($company->realestates as $estate)
					@foreach ($estate->leases as $lease) 
					@foreach ($lease->contracts as $contract)
					<tr onclick="toggleTableDetails({{ $contract->id }})">
						<td><span class="glyphicon glyphicon-chevron-right icon-{{ $contract->id }}"></span></td>
						<td>{{ $contract->client->firstname }} {{ $contract->client->lastname }}</td>
						<td>{{ $contract->lease_id }}</td>
						<td>{{ $estate->street_name }} {{ $lease->street_number }}</td>
						<td>{{ $estate->city }}</td>
						<td>{{ $estate->zip_code }}</td>
						<td>{{ $contract->client->phone }}</td>
						<td>{{ $contract->client->email }}</td>
						<td>Saldo!!</td>
					</tr>
					<tr class="details table-details-header header-{{ $contract->id }}">
						<th></th>
						<th>Indflytning</th>
						<th>Udflytning</th>
						<th>Lejekontrakter</th>
						<th>Note</th>
						<th colspan="2">Betalinger</th>
						<th>Andre kontaktpersoner</th>
						<th>Reguleringsprincip</th>
					</tr>
					<tr class="details table-details detail-{{ $contract->id }}">
						<td></td>
						<td>{{ $contract->moving_in }}</td>
						<td>{{ $contract->moving_out }}</td>
						<td>Lejekontrakter</td>
						<td>{{ $contract->notes }}</td>
						<td colspan="2"><a href="#">Se betalinger</a></td>
						<td><a href"#">Kontaktpersoner</a></td>
						<td>Test</td>
					</tr>
					@endforeach
					@endforeach
					@endforeach
				</table>
			</div>
		</div>
		@endforeach
	</div>
</div>
</div>
@stop
