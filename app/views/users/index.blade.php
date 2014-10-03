@extends('layouts.lightbox')
@section('content')

<script>
// Global variable to store matching users
var users = new Array();


// Function to return divs
function onSearch(searchString) {
	var arr = searchStr(searchString, users);		// Array containing users which matched the search
	var result = ''; 								// Result containing div elements to write to doc

	for(i = 0; i < arr.length; i++) {
		var key = document.getElementById('search').value;
		var text = arr[i][1] + ' - ' + arr[i][2];

		result += '<div class="search-result">' 
		+ highlight(key, text, '<b>', '</b>')
		+ '<div class="search-result-delete">' 
		+ '<a href="#" onClick="deleteUser('+ arr[i][0] +');">Slet bruger x</a>'
		+ '</div>'
		+ '</div>';
	}
	document.getElementById('result').innerHTML = result;	// Post result to page
};

function deleteUser(id) {
	var confirmed = confirm("Er du sikker på at du vil slette denne bruger?");
	if(confirmed) {
		$.ajax({
			url: document.URL + '/' + id,
			type: 'DELETE',
			success: function(result) {
				alert('Brugeren blev slettet!');
			}
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
	<div class="title-text">Slet lejer</div>
	<b>Søg efter brugere som skal slettes fra systemet</b><br><br>
	
	<input type="text" id="search" 
	placeholder="Indtast navn eller ID" 
	class="form-control" 
	onkeyup="onSearch(this.value);">

	<div id="result"></div><br>
	<button type="button" class="btn btn-success button">Luk</button>
</div>
@stop