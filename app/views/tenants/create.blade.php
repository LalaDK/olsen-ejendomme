@extends('layouts.lightbox')

@section('content')
<script>
$(document).ready(function(){
	$(document).submit(function(){
		parent.window.location="{{URL::to('tenants')}}";
	});
});
}
</script>



<div class="col-md-6 col-md-offset-3">
	<div class="container-fluid box">		
		<h4>Opret lejer i {{ $company->name }}</h4>
		{{Form::open(['route' => 'tenants.store'])}}
		<!--Form for creating a new tenant -->
		<div class="col-md-12">
			{{ Form::hidden('company_id', $company->id) }}

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
		</div>
		<div class="col-md-12">
			<row>
				{{Form::submit('Opret lejer', ['class' => 'btn btn-success loginbutton'])}}
				{{Form::close()}}
				<input type="button" class="btn btn-success" style="margin-bottom: 5px;" onClick="lightbox_tenants_cancel()" value="Annuller"/>	
			</row>
		</div>
	</div>
</div>
@stop