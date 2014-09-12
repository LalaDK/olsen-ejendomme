@extends('layouts.master')

@section('content')

<script>
$(document).ready(function(){
	setselected("#tenants");
});
</script>

<h3>Tenants</h3>

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