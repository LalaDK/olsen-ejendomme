@extends('layouts.master')

@section('content')

<script>
$(document).ready(function(){
	setselected("#dashboard");

	$('#companyTab a:first').tab('show') // Select first tab
	
	$('#companyTab a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	})
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
	<ul class="nav nav-tabs" role="tablist">
		<li class="active"><a href="#test" role="tab" data-toggle="tab">Test</a></li>
		
		@foreach ($companies as $company) 
		<li><a href="#" role="tab" data-toggle="tab">{{$company->name}}</a></li>
		@endforeach
	</ul>
</div>
<div class="tab-content">
	<div class="tab-pane active" id="test">
		Test content!
	</div>
</div>

@stop