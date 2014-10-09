@extends('layouts.master')

@section('content')

<script>
$(document).ready(function(){
	setselected("#tenants");
	$('#tenantTabs a:first').tab('show');
	$('.details').hide();
});
function toggleTenantDetails(id){
	var dh = '#header-'+id;
	var dd = '#detail-'+id;
	var di = '#icon-'+id;
	if($(dd).is(':visible')){
			$(di).removeClass('glyphicon-chevron-down');
			$(di).addClass('glyphicon-chevron-right');
		} else {
			$(di).removeClass('glyphicon-chevron-right');
			$(di).addClass('glyphicon-chevron-down');
		}
	$(dh).fadeToggle();
	$(dd).fadeToggle();
}
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
				{{ HTML::linkAction('TenantController@create', '+ Tilføj lejer', array($company->id),array('class'=>'litebox btn btn-create', 'target' => '_self')) }}
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
					@foreach ($lease->tenant as $tenant)
					<tr onclick="toggleTenantDetails({{ $tenant->id }})">
						<td><span id="icon-{{ $tenant->id }}" class="glyphicon glyphicon-chevron-right"></span></td>
						<td>{{ $tenant->firstname }} {{ $tenant->lastname }}</td>
						<td>{{ $tenant->lease_id }}</td>
						<td>{{ $tenant->street_name }} {{ $tenant->street_number }}</td>
						<td>{{ $tenant->city }}</td>
						<td>{{ $tenant->zipcode }}</td>
						<td>{{ $tenant->phone }}</td>
						<td>{{ $tenant->email }}</td>
						<td>Saldo!!</td>
					</tr>
					<tr class="details table-details-header" id="header-{{ $tenant->id }}">
						<th></th>
						<th>Indflytning</th>
						<th>Udflytning</th>
						<th>Lejekontrakter</th>
						<th>Note</th>
						<th colspan="2">Betalinger</th>
						<th>Andre kontaktpersoner</th>
						<th>Reguleringsprincip</th>
					</tr>
					<tr class="details table-details" id="detail-{{ $tenant->id }}">
						<td></td>
						<td>{{ $tenant->moving_in }}</td>
						<td>{{ $tenant->moving_out }}</td>
						<td>Lejekontrakter</td>
						<td>{{ $tenant->notes }}</td>
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
