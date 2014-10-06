@extends('layouts.master')

@section('content')

<script>
$(document).ready(function(){
	setselected("#dashboard");
	$('#companyTabs a:first').tab('show');
	$('.tenantsdetail').hide();
	$('.tenantslist').click(function(){
		var id = ($(this).attr('id'));
		$('#detail-'+id).slideToggle("slow");
		$('#detailheader-'+id).slideToggle("slow");

	});
});
</script>

<h3>Tenants</h3>
<div class="col-md-10">
	<ul class="nav nav-tabs" data-tabs="tabs" id="companyTabs">
		@foreach ($companies as $company) 
		<li><a href="#{{$company->id}}" role="tab" data-toggle="tab">{{$company->name}}</a></li>
		@endforeach
	</ul>
	<div class="tab-content">
		@foreach ($companies as $company) 
		<div class="tab-pane" id="{{$company->id}}">
			<div class="col-md-12">
				@if ($company->realestates->count() > 0)
				<br>
				<table class="table-stribed table-curved" style="width:100%">
					<th></th>
					<th>Navn</th>
					<th>Lejemåls Id</th>
					<th>Adresse</th>
					<th>By</th>
					<th>Post nr.</th>
					<th>Telefon</th>
					<th>Email</th>
					<th>Saldo</th>

					@foreach ($company->realestates as $estate)
					<tr class="tenantslist" id="{{$estate->id}}">
						<td><span class="glyphicon glyphicon-chevron-right"></span></td>
						<td>{{$estate->id}}</td>
						<td>{{$estate->street_name}}</td>
						<td>{{$estate->street_name}}</td>
						<td>{{$estate->street_name}}</td>
						<td>{{$estate->street_name}}</td>
						<td>{{$estate->street_number}}</td>
						<td>{{$estate->cadastral_number}}</td>
						<td>{{$estate->leases}}</td>
					</tr>
					<tr class="tenantsdetail" id="detailheader-{{$estate->id}}">
						<th></th>
						<th>Indflytning</th>
						<th>Udflytning</th>
						<th>Lejekontrakter</th>
						<th>Note</th>
						<th colspan="2">Betalinger</th>
						<th>Andre kontaktpersoner</th>
						<th>Reguleringsprincip</th>
					</tr>
					<tr class="tenantsdetail" id="detail-{{$estate->id}}">
						<td></td>
						<td>{{$estate->id}}</td>
						<td>{{$estate->street_name}}</td>
						<td>{{$estate->street_name}}</td>
						<td>{{$estate->street_name}}</td>
						<td>{{$estate->street_number}}</td>
						<td>{{$estate->cadastral_number}}</td>
						<td>{{$estate->leases}}</td>
					</tr>
				</tr>
				@endforeach
			</table>
			@else
			<h3>
				Der er ingen ejendomme i dette firma...
			</h3>
			@endif

		</div>
	</div>
	@endforeach
</div>
@stop