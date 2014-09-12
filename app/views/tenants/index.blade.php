@extends('layouts.master')

@section('content')

<script>
$(document).ready(function(){
	setselected("#tenants");
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
	<table class="table-stribed table-curved" style="width:100%">
		<th>
			
		</th>
		<th>
			Id
		</th>
		<th>
			E-Mail
		</th>
		@foreach ($users as $user) 
		<tr>
			<td>
				>
			</td>
			<td>
				{{$user->id}}
			</td>
			<td>
				{{$user->email}}
			</td>
		</tr>	
		@endforeach
	</table>
</div>
@stop