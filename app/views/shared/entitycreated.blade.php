@extends('layouts.lightbox')

@section('content')
<div class="col-md-4 col-md-offset-4">
	<div class="container-fluid box" style="position: fixed">
		<center>
			{{ $title }}
			{{ $message }}
		</center>
	</div>
</div>
@stop