@extends('layouts.lightbox')

@section('content')
<script>
$(document).ready(function(){
	$(document).submit(function(){
		parent.window.location="{{URL::to('tenants')}}";
	});

	updateLeaseList($('#select_realestate option:first-child').val());

	$('.datepicker').datepicker({ dateFormat: 'dd-mm-yy' });
	$('#select_realestate').change(function(){
		updateLeaseList( $(this).val());
	});
});

function updateLeaseList(val){
	$.ajax({
		url: 'leases',
		type: 'GET',
		data: {'id' : val},
		success: function(result) {
			$('#select-lease').empty();
			$.each(result,function(index,element){
				$('#select-lease').append("<option value='"+ element.id +"'>" + element.type + "</option>");
			});
		},
		error: function(){
			$('#status-msg').addClass('alert alert-danger');
			$('#status-msg').text('Fejl!!');
		}
	});
}

function lightbox_dashboard_cancel(){
	parent.window.location="{{URL::to('tenants')}}";
}
</script>



<div class="col-md-6 col-md-offset-3">
	<div class="container-fluid box">
		<h4>Opret ny lejer i {{ $company->name }}</h4>
		{{Form::open(['route' => 'tenants.store'])}}
		<div class="col-md-12">
			<select class="form-control" id="select_realestate">
				@foreach ($company->realestates as $realestate)
				<option class="form-control" value="{{ $realestate->id }}">{{ $realestate->street_name }} {{ $realestate->street_number }}</option>
				@endforeach
			</select>

			<select class="form-control" id="select-lease" name="lease_id">
			</select>

			{{Form::text('firstname', Input::old('firstname'), array('placeholder'=>'Fornavn', 'class' => 'form-control', 'style' => 'width:100%'))}}

			{{Form::text('lastname', Input::old('lastname'), array('placeholder'=>'Efternavn', 'class' => 'form-control', 'style' => 'width:100%'))}}
		</div>
		<div class="col-md-8" style="padding-right:5px">
			{{Form::text('street_name', Input::old('street_name'), array('placeholder'=>'Gade', 'class' => 'form-control', 'style' => 'width:100%'))}}
		</div>
		<div class="col-md-4" style="padding-left:5px">
			{{Form::text('street_number', Input::old('street_number'), array('placeholder'=>'Nr.', 'class' => 'form-control', 'style' => 'width:100%'))}}
		</div>
		<div class="col-md-4" style="padding-right:5px">

			{{Form::text('zipcode', Input::old('zipcode'), array('placeholder'=>'Postnummer', 'class' => 'form-control', 'style' => 'width:100%'))}}
		</div>
		<div class="col-md-8" style="padding-left:5px">

			{{Form::text('city', Input::old('city'), array('placeholder'=>'By', 'class' => 'form-control', 'style' => 'width:100%'))}}
		</div>

		<div class="col-md-12">

			{{Form::text('phone', Input::old('phone'), array('placeholder'=>'Telefon', 'class' => 'form-control', 'style' => 'width:100%'))}}

			{{Form::text('mobile_phone', Input::old('mobile_phone'), array('placeholder'=>'Mobil', 'class' => 'form-control', 'style' => 'width:100%'))}}

			{{Form::text('email', Input::old('email'), array('placeholder'=>'Email', 'class' => 'form-control', 'style' => 'width:100%'))}}

			{{Form::textarea('notes', Input::old('notes'), array('placeholder'=>'Note', 'class' => 'form-control', 'style' => 'width:100%'))}}

			{{Form::text('moving_in', Input::old('moving_in'), array('placeholder'=>'Indflytning', 'class' => 'form-control datepicker', 'style' => 'width:100%'))}}

			{{Form::text('moving_out', Input::old('moving_out'), array('placeholder'=>'Udflytning', 'class' => 'form-control datepicker', 'style' => 'width:100%'))}}
		</div>

		<row>
			{{Form::submit('Opret lejer', ['class' => 'btn btn-success loginbutton'])}}
			{{Form::close()}}
			<input type="button" class="btn btn-success" style="margin-bottom: 5px;" onClick="lightbox_dashboard_cancel()" value="Annuller"/>	
		</row>

	</div>
</div>
@stop