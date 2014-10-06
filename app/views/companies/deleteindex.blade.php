@extends('layouts.lightbox')

@section('content')
<script>
//Id's of companies selected for deletion
var removeid = [];

//Checking when a user marks a company for deletion
//Sets the delete style and keeps the id in an array
$(document).ready(function(){
	$(document).on('click', '.company-delete', function () {
		if (!$(this).hasClass('td-greyed-out')) {			
			var transaction_id = $(this).attr('id');
			removeid.push(transaction_id);

			$(this).closest("tr").addClass('td-greyed-out');
			$(this).removeClass('glyphicon-delete');
			$(this).addClass('td-greyed-out');
			$('#status-msg').removeClass('alert alert-danger');
		} else {
			var transaction_id = $(this).attr('id');
			var index = removeid.indexOf(transaction_id);
			if(index > -1){
				removeid.splice(index,1);
			}
			$(this).closest("tr").removeClass('td-greyed-out');
			$(this).addClass('glyphicon-delete');
			$(this).removeClass('td-greyed-out');
		};
	});
});

function delete_companies(){
	$.ajax({
		url: 'destroy',
		type: 'DELETE',
		data: {'ids' : removeid},
		success: function(result) {
			parent.window.location="{{URL::to('dashboard')}}";
		},
		error: function(){
			$('#status-msg').addClass('alert alert-danger');
			$('#status-msg').text('Der er ikke valgt nogen selskaber');
		}
	});
}
function lightbox_dashboard_cancel(){
	parent.window.location="{{URL::to('dashboard')}}";
}
</script>

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
		<input type="text" id="companyname" class="form-control" onkeyup="search_company()">
		<br>
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
				<td><a href="#" ><span class="glyphicon glyphicon-remove company-delete glyphicon-delete" id="{{$company->id}}"></span></a></td>
			</tr>
			@endforeach
		</table>
		<br>
		<button class="btn btn-success" onClick="lightbox_dashboard_cancel()">Anuller</button>	
		<button class="btn btn-success" onClick="delete_companies()">Udfør</button>
	</div>
</div>
@stop