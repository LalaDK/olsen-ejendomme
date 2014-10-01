@extends('layouts.lightbox')

@section('content')
	{{Form::open(['route' => 'companies.store'])}}
	
	{{Form::label('name', 'Navn:')}}
	{{Form::text('name')}}
	
	{{Form::label('address', 'Adresse:')}}
	{{Form::text('address')}}

	{{Form::label('phonenumber', 'Telefonnummer')}}
	{{Form::text('phonenumber')}}

	{{Form::label('registration_number', 'CVR nummer')}}
	{{Form::text('registration_number')}}

	{{Form::label('vat_number', 'Moms Nummer')}}
	{{Form::text('vat_number')}}

	{{Form::submit('Opret selskab')}}
@stop