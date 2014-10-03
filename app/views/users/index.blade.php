@extends('layouts.lightbox')
@section('content')

<script>
// Global variable to store matching users
var users = new Array();


// Function to return divs
function userFormat(arr) {
	var result = '';
	before = '<b>';
	after = '</b>';
	for(i = 0; i < arr.length; i++) {
		var key = document.getElementById('search').value;
		var text = arr[i][1] + ' - ' + arr[i][2];
		result += '<div class="search-result">' 
		+ highlight(key, text, before, after)
		+ '<div class="search-result-delete"><a href="users/"">x</a></div></div>';
	}
	document.getElementById('result').innerHTML = result;
}

</script>


<!-- Snippet for passing all users from php/blade to javascript array -->
@foreach ($users as $user)
<script>
	var newuser = Array('{{ $user->id }}', '{{ $user->name }}', '{{ $user->email }}');
	users.push(newuser);
</script>
@endforeach

<div class="box"> 
	<div class="title-text">Slet lejer</div>
	<b>Søg efter brugere som skal slettes fra systemet</b><br>
	<input type="text" id="search" class="form-control" onkeyup="userFormat(searchStr(document.getElementById('search').value, users));">
	<div id="result"></div>
	@stop





