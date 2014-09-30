@extends('layouts.master')

@section('content')

<script>
$(document).ready(function(){
	setselected("#dashboard");
	$('#companyTabs a:first').tab('show');


});
</script>

<h3>Dashboard</h3>
<div class="col-md-3">
	<div class="panel panel-default">
		<div class="panel-heading panel-header">
			<h3 class="panel-title">Bruger administration</h3>
		</div>
		<div class="panel-body">
			Panel content
		</div>
	</div>
</div>
<div class="col-md-3">
	<div class="panel panel-default">
		<div class="panel-heading panel-header">
			<h3 class="panel-title">Opret selskab</h3>
		</div>
		<div class="panel-body">
			Panel content
		</div>
	</div>
</div>
<div class="col-md-3">
	<div class="panel panel-default">
		<div class="panel-heading panel-header">
			<h3 class="panel-title">Opret ejendom</h3>
		</div>
		<div class="panel-body">
			Panel content
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
			<h1>{{$company->name}}</h1>
		</div>
		@endforeach
</div>
</div>

@stop