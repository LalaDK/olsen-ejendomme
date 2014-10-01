@extends('layouts.master')

@section('content')

<script>
	$(document).ready(function(){
		setselected("#dashboard");
		$('#companyTabs a:first').tab('show');
	});


</script>

<h3>Dashboard</h3>
<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading panel-header">
			<h3 class="panel-title">Bruger administration</h3>
		</div>
		<div class="panel-body">
			<div id="dashboard-user-panel">
				<div class='dashboard-user-administration'>
				<a href="users/create" rel="lightbox">
				{{ HTML::image('../app/images/opret.png') }}</a></div>
				<div class='dashboard-user-administration'>{{ HTML::image('../app/images/slet.png') }}</div>
				<div class='dashboard-user-administration'>{{ HTML::image('../app/images/retweet.png') }}</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-3">
	<div class="panel panel-default">
		<div class="panel-heading panel-header">
			<h3 class="panel-title">Opret selskab</h3>
		</div>
		<div class="panel-body">
			<div class="btn-new-item-background">
				<button type="button" class="btn btn-default btn-new-item">Opret nyt selskab</button>
				<span class="glyphicon glyphicon-plus glyphicon-center"></span>

			</div>
			<div class="btn-delete-item-background">
				<button type="button" class="btn btn-default btn-delete-item">Slet selskab</button>
				<span class="glyphicon glyphicon-minus glyphicon-center"></span>
			</div>
		</div>
	</div>
</div>
<div class="col-md-3">
	<div class="panel panel-default">
		<div class="panel-heading panel-header">
			<h3 class="panel-title">Opret ejendom</h3>
		</div>
		<div class="panel-body">
			<div class="btn-new-item-background">
				<button type="button" class="btn btn-default btn-new-item">Opret ny ejendom</button>
				<span class="glyphicon glyphicon-plus glyphicon-center"></span>
			</div>
			<div class="btn-delete-item-background">
				<button type="button" class="btn btn-default btn-delete-item">Slet ejendom</button>
				<span class="glyphicon glyphicon-minus glyphicon-center"></span>
			</div>
		</div>
	</div>
</div>
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
					<th>Id</th>
					<th>Adresse</th>
					<th>Nr</th>
					<th>Matrikel nr.</th>
					<th>Antal lejemål</th>
					<th></th>
					@foreach ($company->realestates as $estate)
					<tr>
						<td>{{$estate->id}}</td>
						<td>{{$estate->street_name}}</td>
						<td>{{$estate->street_number}}</td>
						<td>{{$estate->cadastral_number}}</td>
						<td>{{$estate->leases}}</td>
						<td><span class="glyphicon glyphicon-chevron-right"></span></td>
					</tr>
					@endforeach
				</table>
				@else
				Der er ingen bygninger i dette firma...
				@endif

			</div>
		</div>
		@endforeach
	</div>
</div>

@stop