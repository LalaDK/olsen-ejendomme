@extends('layouts.lightbox')

@section('content')
{{Form::open(['route' => 'realestates.store'])}}

{{Form::text('street_name', Input::old('street_name'), array('placeholder'=>'Gade', 'class' => 'form-control', 'style' => 'width:100%'))}}

{{Form::text('street_number', Input::old('street_number'), array('placeholder'=>'Nr', 'class' => 'form-control', 'style' => 'width:100%'))}}

{{Form::text('zip_code',Input::old('zip_code'), array('placeholder'=>'Postnummer', 'class' => 'form-control', 'style' => 'width:100%'))}}

{{Form::text('city', Input::old('city'), array('placeholder'=>'By', 'class' => 'form-control', 'style' => 'width:100%'))}}

{{Form::text('leases', Input::old('leases'), array('placeholder'=>'Antal lejemål', 'class' => 'form-control', 'style' => 'width:100%'))}}

{{Form::text('build', Input::old('build'), array('placeholder'=>'Fra årgang', 'class' => 'form-control', 'style' => 'width:100%'))}}

{{Form::text('purchase_value', Input::old('purchase_value'), array('placeholder'=>'Købspris', 'class' => 'form-control', 'style' => 'width:100%'))}}

{{Form::text('outer_sqm',Input::old('outer_sqm'), array('placeholder'=>'Udvendige mål', 'class' => 'form-control', 'style' => 'width:100%'))}}

{{Form::text('inner_sqm', Input::old('inner_sqm'), array('placeholder'=>'Indvendige mål', 'class' => 'form-control', 'style' => 'width:100%'))}}

{{Form::text('ground_area', Input::old('ground_area'), array('placeholder'=>'Grundareal', 'class' => 'form-control', 'style' => 'width:100%'))}}

{{Form::submit('Opret ejendom', ['class' => 'btn btn-success loginbutton'])}}
@stop