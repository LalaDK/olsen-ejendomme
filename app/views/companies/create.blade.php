@extends('layouts.lightbox')

@section('content')
	{{Form::open(['route' => 'companies.store'])}}
	
	{{Form::label('name', 'Navn:')}}
	{{Form::text('name', Input::old('name'), array('placeholder'=>'Navn'))}}
	
	{{Form::label('address', 'Adresse:')}}
	{{Form::text('address', Input::old('address'), array('placeholder'=>'Adresse'))}}

	{{Form::label('phonenumber', 'Telefonnummer')}}
	{{Form::text('phonenumber', Input::old('phonenumber'), array('placeholder'=>'Telefonnummer'))}}

	{{Form::label('registration_number', 'CVR nummer')}}
	{{Form::text('registration_number', Input::old('registration_number'), array('placeholder'=>'CVR nummer'))}}

	{{Form::label('vat_number', 'Moms Nummer')}}
	{{Form::text('vat_number', Input::old('vat_number'), array('placeholder'=>'Momsnummer'))}}

	{{Form::submit('Opret selskab')}}
@stop