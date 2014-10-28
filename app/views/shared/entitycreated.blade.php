@extends('layouts.lightbox')

@section('content')
<div class="col-md-4 col-md-offset-4">
	<div class="container-fluid box" style="position: fixed">
		<center>
			<div class="col-md-12">
				<h2>{{ $title }}</h2>
				<h4>{{ $message }}</h4>
				<input type="button" class="btn btn-success" style="margin-bottom: 5px;" onClick="lightbox_parent_reload()" value="Ok"/>
			</div>
		</center>
	</div>
</div>
@stop