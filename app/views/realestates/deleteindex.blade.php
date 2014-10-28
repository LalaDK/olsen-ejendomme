@extends('layouts.lightbox')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<div class="container-fluid box">
		<h4>Slet Ejendom</h4>
		<div id="status-msg">
		</div>
		<table class="table-stribed table-curved" style="width:100%">
			<th>Vej</th>
			<th>Nummer</th>
			<th>Post nummer</th>
			<th>Matrikel nr</th>
			<th>Slet</th>
			@foreach ($realestates as $realestate)
			<tr>
				<td>{{$realestate->street_name}}</td>
				<td>{{$realestate->street_number}}</td>
				<td>{{$realestate->zip_code}}</td>
				<td>{{$realestate->cadastral_number}}</td>
				<td><a href="#" ><span class="glyphicon glyphicon-remove delete_multi_table glyphicon-delete" id="{{$realestate->id}}"></span></a></td>
			</tr>
			@endforeach
		</table>
		<br>
		<button class="btn btn-success" onClick="delete_multi_table()">Udfør</button>
		<button class="btn btn-success" onClick="lightbox_parent_reload()">Anuller</button>
	</div>
</div>

@stop