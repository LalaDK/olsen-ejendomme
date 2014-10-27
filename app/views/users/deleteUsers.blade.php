@extends('layouts.lightbox')
@section('content')

<script>
// Global variable to store matching users
var users = new Array();


// Function to return divs
function onSearch(searchString) {
	var result = ''; // Result containing div elements to write to doc
	if(searchString.value != '') {
	var arr = searchStr(searchString.value, users, true);// Array containing users which matched the search
	for(i = 0; i < arr.length; i++) {
		var key = document.getElementById('search').value;
		var text = arr[i][1] + ' - ' + arr[i][2];

		result += '<div class="search-result">' 
		+ highlight(key, text, true, '<b>', '</b>')
		+ '<span class="search-result-delete">' 
		+ '<a href="#" onClick="deleteUser('+ arr[i][0] +');">x</a>'
		+ '</span>'
		+ '</div>';
	}
}
	document.getElementById('search-results').innerHTML = result;	// Post result to page
};

function deleteUser(id) {
	var confirmed = confirm("Er du sikker på at du vil slette denne bruger?");
	if(confirmed) {
		$.ajax({
			async: false,
			url: document.URL + '/destroy/' + id,
			type: 'POST',
			data: {_method: 'delete'}
		}).done(function(msg) {
			alert("Brugeren blev slettet!");
			location.reload(); 
		}).fail(function(msg) { 
			alert('FEJL - brugeren blev ikke slettet!' + msg.responseText);
		});
	}
};

</script>

<!-- Snippet for passing all users from php/blade to javascript array -->
@foreach ($users as $user)
<script>
	var newuser = Array('{{ $user->id }}', '{{ $user->name }}', '{{ $user->email }}');
	users.push(newuser);
</script>
@endforeach



<div class="box" id="delete-user"> 
	<div id="alert"></div>
	<div class="title-text">Slet bruger</div>
	<b>Søg efter brugere som skal slettes fra systemet</b><br><br>
	
	<input type="text" id="search" 
	placeholder="Indtast navn eller ID" 
	class="form-control" 
	onkeyup="onSearch(this);">

	<div id="search-results"></div><br>
	<button type="button" class="btn btn-success button">Luk</button>
</div>
@stop