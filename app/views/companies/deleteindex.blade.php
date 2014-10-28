@extends('layouts.lightbox')

@section('content')
<!-- Snippet for passing all users from database to javascript array -->
@foreach ($companies as $company)
<script>
var newcompany = Array('{{ $company->id }}', '{{ $company->name }}', '{{ $company->email }}', '{{ $company->phonenumber }}');
users.push(newcompany);
</script>
@endforeach

<div class="col-md-8 col-md-offset-2">
	<div class="container-fluid box">
		<h4>Slet selskab</h4>
		Søg efter et selskab der skal slettes fra systemet:<br>
		<div id="status-msg">
		</div>
		<table class="table-stribed table-curved" style="width:100%">
			<th>Selskabes navn</th>
			<th>E-mail</th>
			<th>Antal ejendomme</th>
			<th>Telefon nr</th>
			<th>Slet</th>
			@foreach ($companies as $company)
			<tr>
				<td>{{$company->name}}</td>
				<td>{{$company->name}}</td>
				<td>{{$company->realestates->count()}}</td>
				<td>{{$company->phonenumber}}</td>
				<td><a href="#" ><span class="glyphicon glyphicon-remove delete_multi_table glyphicon-delete" id="{{$company->id}}"></span></a></td>
			</tr>
			@endforeach
		</table>
		<br>
		<button class="btn btn-success" onClick="delete_multi_table()">Udfør</button>
		<button class="btn btn-success" onClick="lightbox_parent_reload()">Anuller</button>
	</div>
</div>
@stop