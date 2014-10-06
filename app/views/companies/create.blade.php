@extends('layouts.lightbox')

@section('content')
<script>
$(document).ready(function(){
	$(document).submit(function(){
		parent.window.location="{{URL::to('dashboard')}}";
	});
});
function lightbox_dashboard_cancel(){
	parent.window.location="{{URL::to('dashboard')}}";
}
</script>
<div class="col-md-4 col-md-offset-4">
	<div class="container-fluid box" style="position: fixed">
		<h4>Opret et nyt selskab</h4>

		{{Form::open(['route' => 'companies.store'])}}

		{{Form::text('name', Input::old('name'), array('placeholder'=>'Navn', 'class' => 'form-control', 'style' => 'width:100%'))}}

		{{Form::text('address', Input::old('address'), array('placeholder'=>'Adresse', 'class' => 'form-control', 'style' => 'width:100%'))}}

		{{Form::text('phonenumber', Input::old('phonenumber'), array('placeholder'=>'Telefonnummer', 'class' => 'form-control', 'style' => 'width:100%'))}}

		{{Form::text('registration_number', Input::old('registration_number'), array('placeholder'=>'CVR nummer', 'class' => 'form-control', 'style' => 'width:100%'))}}

		{{Form::text('vat_number', Input::old('vat_number'), array('placeholder'=>'Momsnummer', 'class' => 'form-control', 'style' => 'width:100%'))}}

		<row>
			{{Form::submit('Opret selskab', ['class' => 'btn btn-success loginbutton'])}}
			{{Form::close()}}
			<input type="button" class="btn btn-success" style="margin-bottom: 5px;" onClick="lightbox_dashboard_cancel()" value="Annuller"/>	
		</row>
	</div>
</div>
@stop