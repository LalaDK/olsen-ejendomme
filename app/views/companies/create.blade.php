@extends('layouts.lightbox')

@section('content')

<div class="col-md-4 col-md-offset-4">
	<div class="container-fluid box" style="position: fixed">
		<div class="col-md-12">
			<h4>Opret et nyt selskab</h4>

			{{Form::open(['route' => 'companies.store'])}}

			{{Form::text('name', Input::old('name'), array('placeholder'=>'Navn', 'class' => 'form-control', 'style' => 'width:100%'))}}
			{{ $errors->first('name','<div class="alert alert-danger" role="alert">:message</div>') }}
			{{Form::text('address', Input::old('address'), array('placeholder'=>'Adresse', 'class' => 'form-control', 'style' => 'width:100%'))}}

			{{Form::text('phonenumber', Input::old('phonenumber'), array('placeholder'=>'Telefonnummer', 'class' => 'form-control', 'style' => 'width:100%'))}}

			{{Form::text('registration_number', Input::old('registration_number'), array('placeholder'=>'CVR nummer', 'class' => 'form-control', 'style' => 'width:100%'))}}
			{{ $errors->first('registration_number','<div class="alert alert-danger" role="alert">:message</div>') }}

			{{Form::text('vat_number', Input::old('vat_number'), array('placeholder'=>'Momsnummer', 'class' => 'form-control', 'style' => 'width:100%'))}}
			{{ $errors->first('vat_number','<div class="alert alert-danger" role="alert">:message</div>') }}
		</div>
		<row>
			<input type="button" class="btn btn-success" onClick="lightbox_parent_reload()" value="Annuller"/>
			{{Form::submit('Opret selskab', ['class' => 'btn btn-success loginbutton'])}}
			{{Form::close()}}
		</row>
	</div>
</div>
@stop