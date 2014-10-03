@extends('layouts.lightbox')

@section('content')
<script>
$(document).ready(function(){
	$('#create_company_form').submit(function(e){
		e.preventDefault();

		

		var street_name = $("[name = 'street_name']").val();
		var street_number = $("[name = 'street_number']").val();
		var zip_code = $("[name = 'zip_code']").val();
		var city = $("[name = 'city']").val();
		var leases = $("[name = 'leases']").val();
		var build_date = $("[name = 'build_date']").val();
		var purchase_value = $("[name = 'purchase_value']").val();
		var outer_sqm = $("[name = 'outer_sqm']").val();
		var inner_sqm = $("[name = 'inner_sqm']").val();
		var ground_area = $("[name = 'ground_area']").val();
		var company = $("[name = 'company']").val();
		alert(street_number);
		alert(street_name);

	});
});
</script>
<div class="container-fluid box">

	{{Form::open(array("","id"=>"create_company_form"))}}

	{{Form::text('street_name', Input::old('street_name'), array('placeholder'=>'Gade', 'class' => 'form-control', 'style' => 'width:100%'))}}

	{{Form::text('street_number', Input::old('street_number'), array('placeholder'=>'Nr', 'class' => 'form-control', 'style' => 'width:100%'))}}

	{{Form::text('zip_code',Input::old('zip_code'), array('placeholder'=>'Postnummer', 'class' => 'form-control', 'style' => 'width:100%'))}}

	{{Form::text('city', Input::old('city'), array('placeholder'=>'By', 'class' => 'form-control', 'style' => 'width:100%'))}}

	{{Form::text('leases', Input::old('leases'), array('placeholder'=>'Antal lejemål', 'class' => 'form-control', 'style' => 'width:100%'))}}

	{{Form::text('build_date', Input::old('build_date'), array('placeholder'=>'Fra årgang', 'class' => 'form-control', 'style' => 'width:100%'))}}

	{{Form::text('purchase_value', Input::old('purchase_value'), array('placeholder'=>'Købspris', 'class' => 'form-control', 'style' => 'width:100%'))}}

	{{Form::text('outer_sqm',Input::old('outer_sqm'), array('placeholder'=>'Udvendige mål', 'class' => 'form-control', 'style' => 'width:100%'))}}

	{{Form::text('inner_sqm', Input::old('inner_sqm'), array('placeholder'=>'Indvendige mål', 'class' => 'form-control', 'style' => 'width:100%'))}}

	{{Form::text('ground_area', Input::old('ground_area'), array('placeholder'=>'Grundareal', 'class' => 'form-control', 'style' => 'width:100%'))}}

	{{Form::select('company', $companies, ['class' => 'form-control', 'style' => 'width:100%;'])}}

	{{Form::submit('Opret ejendom', ['class' => 'btn btn-success loginbutton'])}}
</div>
@stop