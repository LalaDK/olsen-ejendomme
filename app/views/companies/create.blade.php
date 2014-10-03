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
<div class="container-fluid box">

	{{Form::open(['route' => 'companies.store'])}}
	
	{{Form::label('name', 'Navn:')}}
	{{Form::text('name', Input::old('name'), array('placeholder'=>'Navn', 'class' => 'form-control', 'style' => 'width:100%'))}}
	
	{{Form::label('address', 'Adresse:')}}
	{{Form::text('address', Input::old('address'), array('placeholder'=>'Adresse', 'class' => 'form-control', 'style' => 'width:100%'))}}

	{{Form::label('phonenumber', 'Telefonnummer')}}
	{{Form::text('phonenumber', Input::old('phonenumber'), array('placeholder'=>'Telefonnummer', 'class' => 'form-control', 'style' => 'width:100%'))}}

	{{Form::label('registration_number', 'CVR nummer')}}
	{{Form::text('registration_number', Input::old('registration_number'), array('placeholder'=>'CVR nummer', 'class' => 'form-control', 'style' => 'width:100%'))}}

	{{Form::label('vat_number', 'Moms Nummer')}}
	{{Form::text('vat_number', Input::old('vat_number'), array('placeholder'=>'Momsnummer', 'class' => 'form-control', 'style' => 'width:100%'))}}


	{{Form::submit('Opret selskab', ['class' => 'btn btn-success loginbutton'])}}
	{{Form::close()}}
	<button class="btn btn-success" onClick="lightbox_dashboard_cancel()">Anuller</button>	

</div>
@stop