@extends('layouts.lightbox')

@section('content')
<script>
$(document).ready(function(){
    $(document).on('click', '.company-delete', function () {
        var transaction_id = $(this).attr('id');
        $(this).parent().parent().parent().addClass('td-greyed-out');
        alert("Delete transaction #" + transaction_id);
        return false;
    });

});
</script>
<div class="container-fluid box company-delete-box">
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
		<td><a href="#" ><span class="glyphicon glyphicon-remove company-delete" id="{{$company->id}}" style="color:#000000"></span></a></td>
	</tr>
	@endforeach
</table>
</div>
@stop