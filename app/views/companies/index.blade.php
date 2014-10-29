@extends('layouts.master')
@section('content')

<script>
	$(document).ready(function(){
		// Initialize DataTable for better tablemangement
		$('.company-table').DataTable();
		$('.wait-list-table').DataTable();

		// if a company selection previously have been made,
		// select that one. Else select the first
		if($.cookie('selectedTab') != undefined) {
			var selectedTab = $.cookie('selectedTab');	
			$('#companyTabs a[href="#' + selectedTab + '"]').tab('show');
		} 
		else {
			$('#companyTabs a[href="#1"]').tab('show');
		}
	});

	/* Set the cookie 'selecterTab' */
	function setCookie(id) {
		$.cookie('selectedTab', id);
	}

	function toggleVisibility(id) {
		$(".details-" + id).fadeToggle();
	}

	/* Function for deleting a Wait List Entry */
	function deleteWaitEntry(id) {
		var agree = confirm('Er du sikker på at du vil fjerne klienten fra ventelisten?');
		if(agree) {$.ajax(		
			{
				url:"WaitingListController/destroy?id=" + id,
				success:function(result){location.reload();},
				error:function(result) {alert('Der skete en fejl.\n' + result.responseText);}
			});}
	}
</script>

<div class="col-md-10">
	<h3>Selskab</h3>
	<ul class="nav nav-tabs" data-tabs="tabs" id="companyTabs">
		@foreach ($companies as $company) 
		<li>
			<a href="#{{$company->id}}" onclick="setCookie({{$company->id}});" 
				role="tab" data-toggle="tab">{{$company->name}}</a></li>
				@endforeach
			</ul>
			<div class="tab-content">
				@foreach ($companies as $company) 
				<div class="tab-pane" id="{{$company->id}}">
					<div class="col-md-6">
						<b>Ejendomme</b>
						<!-- Venstre kolonne -->
						<table class="company-table" class="table-stribed table-hover table-curved">
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
					</div><!-- /Venstre kolonne -->

					<div class="col-md-6"><!-- Højre kolonne -->
						<b>Venteliste</b>
						<div class="well">
							{{ HTML::linkAction('TenantController@create', '+ Tilføj lejer', array($company->id),array('class'=>'litebox btn btn-create', 'target' => '_self')) }}
						</div>

						<table class="wait-list-table" class="table-stribed table-hover table-curved" style="width:100%;">
							<thead>
								<th>nr.</th>
								<th>Navn</th>
								<th>Telefon nr.</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</thead>
							@foreach ($company->wait_list_entry as $wait_list_entry)
							<tbody>					
								<tr onClick="">
									<td>{{ $wait_list_entry->id }}</td>
									<td>{{ $wait_list_entry->client->firstname }} {{ $wait_list_entry->client->lastname }}</td>
									<td>{{ $wait_list_entry->client->phone }}</td>
									<td>{{ $wait_list_entry->client->email }}</td>

									<td><a href="mailto:{{ $wait_list_entry->client->email }}"><span id="" class="glyphicon glyphicon-envelope"></span></a></td>

									<td><a href="#" onClick="deleteWaitEntry({{ $wait_list_entry->id }});"><span class="glyphicon glyphicon-remove"></span></a></td>

									<td><a href="#"><span id="" class="glyphicon glyphicon-chevron-down"></span></a></td>

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
					</div><!-- /højre kolonne -->

					<div class="col-md-12">
						<div class="col-md-4">			
						</div><!-- "col-md-4" -->
						<div class="col-md-8">
							<style>
								.companyinformation{
									background-color:#f9f9f9;
									padding-left:15px;
									border-style:solid;
									border-radius: 1px;
									border-color:#bcbcbc;
								}

								.top {
									height:40px;
									background-color:orange;
								}
							</style>
							<div class="companyinformation">
								<div class="top">Firmainformation</div>
								<form role="form">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="companyname">Firma navn</label>
												<input class="form-control" type="text" name="companyname" value="{{ $company->name }}">
											</div>
											<div class="form-group">
												<label for="address">Adresse</label>
												<input class="form-control" type="text" name="address" value="{{ $company->address }}">
											</div>
											<div class="form-group">
												<label for="phonenumber">Telefon</label>
												<input class="form-control" type="text" name="phonenumber" value="{{ $company->phonenumber }}">
											</div>
											<div class="form-group">
												<label for="fax">Fax</label>
												<input class="form-control" type="text" name="fax" value="{{ $company->fax }}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="registration_number">CVR</label>
												<input class="form-control" type="text" name="registration_number" value="{{ $company->registration_number }}">
											</div>
											<div class="form-group">
												<label for="vat_number">Moms nr.</label>
												<input class="form-control" type="text" name="vat_number" value="{{ $company->vat_number }}">
											</div>
											<div class="form-group">
												<label for="email">Email</label>
												<input class="form-control" type="text" name="email" value="{{ $company->email }}">
											</div>
											<div class="form-group">
												<input class="btn btn-default" type="submit" value="Gem ændringer" disabled>
											</div>

										</div>
									</form>
								</div>
							</div> <!-- /companyinformation -->
						</div><!-- "col-md-6" -->			
					</div><!-- "col-md-10" -->			
				</div><!-- /class="tab-pane" -->
				@endforeach
			</div><!-- class="tab-content" -->
		</div><!-- class="col-md-10" -->
		@stop