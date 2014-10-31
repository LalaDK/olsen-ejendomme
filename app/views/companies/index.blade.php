@extends('layouts.master')
@section('content')

<script>
	$(document).ready(function(){
		// Initialize DataTable for better tablemangement
		$('.paging-table').DataTable( {
			"paging":   true,
			"ordering": false,
			"info":     false,
			"searching": false,
			"language": {
				"sProcessing":   "Henter...",
				"sLengthMenu":   "Vis _MENU_ linjer",
				"sZeroRecords":  "Ingen linjer matcher s&oslash;gningen",
				"sInfo":         "Viser _START_ til _END_ af _TOTAL_ linjer",
				"sInfoEmpty":    "Viser 0 til 0 af 0 linjer",
				"sInfoFiltered": "(filtreret fra _MAX_ linjer)",
				"sInfoPostFix":  "",
				"sSearch":       "S&oslash;g:",
				"sUrl":          "",
				"oPaginate": {
					"sFirst":    "F&oslash;rste",
					"sPrevious": "Forrige",
					"sNext":     "N&aelig;ste",
					"sLast":     "Sidste"
				}
			}
		});

		$.fn.dataTableExt.sErrMode = 'throw';

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
	$('#' + id).fadeToggle();
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
				<!-- Tilføj lejer -->
				<br>
				<div class="row">
					<div class="col-md-6"></div>
					<div class="col-md-6">				
						<div class="well">
							{{ HTML::linkAction('TenantController@create', '+ Tilføj lejer til venteliste', array($company->id),array('class'=>'litebox btn btn-create', 'target' => '_self')) }}
						</div>
					</div>
				</div>
				<!-- /Tilføj lejer -->
				@foreach ($companies as $company) 
				<div class="tab-pane" id="{{$company->id}}">
					<div class="col-md-6">
						<b>Ejendomme</b>
						<!-- Venstre kolonne -->
						<table class="table-stribed table-hover table-curved paging-table">
							<thead>
								<th style="white-space: nowrap;">ID</th>
								<th>Adresse</th>
								<th style="text-align:center;">Matrikel nr.</th>
								<th style="text-align:center;">Antal lejemål</th>
								<th style="border-left:none;"></th>
							</thead>
							<tbody>					
								@foreach ($company->realestates as $estate)
								<tr onClick="toggleVisibility('details-'+{{$estate->id}});">
									<td>{{ $estate->id }}</td>
									<td>{{ $estate->street_name }} {{ $estate->street_number }}</td>
									<td>{{ $estate->cadastral_number }}</td>
									<td style="text-align:center;">{{ $estate->leases_count }}</td>



									<td style="text-align:center;">
										@if ($estate->leases_count > 0)
										<span id="icon-{{ $estate->id }}" class="glyphicon glyphicon-chevron-down"></span>
										@endif										
									</td>
								</tr>
								@foreach ($estate->leases as $lease) 
								<tr id="details-{{$estate->id}}" style="display:none;"><!-- The hidden row -->	
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

					<b>Venteliste</b>
					<div class="col-md-6"><!-- Højre kolonne -->
						<table class="table-stribed table-hover table-curved paging-table">
							<thead>
								<th>nr.</th>
								<th>Navn</th>
								<th>Telefon nr.</th>
								<th></th>
								<th style="border-left:none;"></th>
								<th style="border-left:none;"></th>
								<th style="border-left:none;"></th>
							</thead>
							@foreach ($company->wait_list_entry as $wait_list_entry)
							<tbody>					
								<tr>
									<td>{{ $wait_list_entry->id }}</td>
									<td>{{ $wait_list_entry->client->firstname }} {{ $wait_list_entry->client->lastname }}</td>
									<td>{{ $wait_list_entry->client->phone }}</td>
									<td>{{ $wait_list_entry->client->email }}</td>

									<td style="text-align:center;"><a href="mailto:{{ $wait_list_entry->client->email }}">
										<span class="glyphicon glyphicon-envelope"></span></a>
									</td>

									<td style="text-align:center;" onClick="deleteWaitEntry({{ $wait_list_entry->id }});">
										<span class="glyphicon glyphicon-remove"></span>
									</td>

									<td style="text-align:center;">
										<span onClick="toggleVisibility('client-details-'+{{ $wait_list_entry->client->id }});" id="" class="glyphicon glyphicon-chevron-down"></span>
									</td>
								</tr>

								<!-- hidden row -->
								<tr id="client-details-{{$wait_list_entry->client->id}}" style="display:none;">
									<td>
										{{ $wait_list_entry->client->firstname }} {{ $wait_list_entry->client->lastname }}
									</td>
									<td>
										{{ $wait_list_entry->client->street_name }} {{ $wait_list_entry->client->street_number }}
									</td>
									<td>
										{{ $wait_list_entry->client->zipcode }} {{ $wait_list_entry->client->city }}
									</td>
									<td>
										{{ $wait_list_entry->client->notes }}
									</td>
									<td>
									</td>

									<td></td>
									<td></td>

								</tr>
								@endforeach
							</tbody>
						</table>
					</div><!-- /højre kolonne -->

					<!-- Firmainformation -->
					<div class="col-md-12">
						<div class="col-md-6">			
						</div><!-- /col-md-6 -->
						<div class="col-md-6">
						<br>
							@include('companies.edit')
						</div><!-- /col-md-6 -->
					</div><!-- /col-md-12 -->	


				</div><!-- "col-md-10" -->			
				@endforeach
			</div><!-- /class="tab-pane" -->
		</div><!-- class="col-md-10" -->
		@stop