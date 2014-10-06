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
<h4>Opret ny ejendom</h4>
<div class="col-md-4 col-md-offset-4">
	<div class="container-fluid box">
		<h4>Opret ny ejendom</h4>
		{{Form::open(['route' => 'realestates.store'])}}

		<div class="col-md-8" style="padding-right:5px">
			{{Form::text('street_name', Input::old('street_name'), array('placeholder'=>'Gade', 'class' => 'form-control', 'style' => 'width:100%'))}}
		</div>
		<div class="col-md-4" style="padding-left:5px">
			{{Form::text('street_number', Input::old('street_number'), array('placeholder'=>'Nr.', 'class' => 'form-control', 'style' => 'width:100%'))}}
		</div>
		<div class="col-md-12">
			{{Form::text('city', Input::old('city'), array('placeholder'=>'By', 'class' => 'form-control', 'style' => 'width:100%'))}}

			{{Form::text('zip_code',Input::old('zip_code'), array('placeholder'=>'Postnummer', 'class' => 'form-control', 'style' => 'width:100%'))}}
		</div>
		<div class="col-md-6" style="padding-right:5px">
			{{Form::text('leases', Input::old('leases'), array('placeholder'=>'Antal lejemål', 'class' => 'form-control ', 'style' => 'width:100%'))}}
		</div>
		<div class="col-md-6" style="padding-left:5px">
			{{Form::text('build_date', Input::old('build_date'), array('placeholder'=>'Fra årgang', 'class' => 'form-control', 'style' => 'width:100%'))}}
		</div>
		<div class="col-md-12">

		{{Form::text('purchase_value', Input::old('purchase_value'), array('placeholder'=>'Købspris', 'class' => 'form-control', 'style' => 'width:100%'))}}

		{{Form::text('outer_sqm',Input::old('outer_sqm'), array('placeholder'=>'Udvendige m2', 'class' => 'form-control', 'style' => 'width:100%'))}}

		{{Form::text('inner_sqm', Input::old('inner_sqm'), array('placeholder'=>'Indvendige m2', 'class' => 'form-control', 'style' => 'width:100%'))}}

		{{Form::text('ground_area', Input::old('ground_area'), array('placeholder'=>'Grundareal', 'class' => 'form-control', 'style' => 'width:100%'))}}
		{{Form::select('company', $companies,null, ['class' => 'form-control', 'style' => 'width:100%;'])}}
		<row>
			{{Form::submit('Opret ejendom', ['class' => 'btn btn-success loginbutton'])}}
			{{Form::close()}}
			<input type="button" class="btn btn-success" style="margin-bottom: 5px;" onClick="lightbox_dashboard_cancel()" value="Annuller"/>	
		</row>
	</div>
</div>
</div>
@stop