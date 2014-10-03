@extends('layouts.lightbox')
@section('content')

<script>
// Global variable to store matching users
var users = new Array();

// Search through an array of arrays for a specified key
function searchStr(str, array) {
	var result = new Array();
	for(i = 0; i < array.length; i++) {
		for(j = 0; j < array[i].length; j++) {
			if(array[i][j].toLowerCase().indexOf(str.toLowerCase()) != -1) {
				result.push(users[i]);
			}
		}
	}
	return result;
}


// Function to return divs
function userFormat(users) {
	var result = '';
	for(i = 0; i < users.length; i++) {
		result += '<div class="search-result">' 
		+ users[i][1] + ' - ' + users[i][2]
		+ '<div class="search-result-delete"><a href="users/"">x</a></div></div>';
	}
	document.getElementById('result').innerHTML = result;
	return result; 
}

// Highlighter 
function highlight(key, string) {
	var result;
	var tmpStr;
	var keySize = key.length;
	while(tmpStr.length != 0) {
		var firstPos = string.indexOf(key);
		result += string.subStr(0, firstPos)
	}

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





