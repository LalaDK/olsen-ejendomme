@extends('layouts.lightbox')

@section('content')
{{Form::open(['route' => 'realestates.store'])}}

{{Form::text('street_name', Input::old('street_name'), array('placeholder'=>'Gade'))}}

{{Form::text('street_number', Input::old('street_number'), array('placeholder'=>'Nr'))}}

{{Form::text('zip_code',Input::old('zip_code'), array('placeholder'=>'Postnummer'))}}

{{Form::text('city', Input::old('city'), array('placeholder'=>'By'))}}

{{Form::text('leases', Input::old('leases'), array('placeholder'=>'Antal lejemål'))}}

{{Form::text('build', Input::old('build'), array('placeholder'=>'Fra årgang'))}}

{{Form::text('purchase_value', Input::old('purchase_value'), array('placeholder'=>'Købspris'))}}

{{Form::text('outer_sqm',Input::old('outer_sqm'), array('placeholder'=>'Udvendige mål'))}}

{{Form::text('inner_sqm', Input::old('inner_sqm'), array('placeholder'=>'Indvendige mål'))}}

{{Form::text('ground_area', Input::old('ground_area'), array('placeholder'=>'Grundareal'))}}

{{Form::submit('Opret ejendom')}}
@stop