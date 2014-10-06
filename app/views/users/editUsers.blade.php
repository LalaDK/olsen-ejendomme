@extends('layouts.lightbox')
@section('content')

<script>
	var users = new Array();
</script>

<!-- Script for passing users into javascript -->
@foreach ($users as $user)
<script>
	var newuser = Array('{{ $user->id }}', '{{ $user->name }}', '{{ $user->email }}');
	users.push(newuser);
</script>
@endforeach

<script>





// Function to return divs
function onSearch(searchString) {
	var result = ''; // Result containing div elements to write to doc
	if(searchString != '') {
	var arr = searchStr(searchString, users);// Array containing users which matched the search
	for(i = 0; i < arr.length; i++) {
		var key = document.getElementById('search').value;
		var text = arr[i][1] + ' - ' + arr[i][2];

		result += '<div class="search-result" onClick="myFunc(this)";>' + highlight(key, text, '<b>', '</b>')
		+ '<a href="#"><span class="glyphicon glyphicon-lock" style="right:15px;"></span></a>'
		+ '</div><div class="change-password"><span><form class="form-inline form-group"><input type="password" class="form-control"><button type="button" class="btn btn-default">Gem</button></form></div>';
	}
}
	document.getElementById('search-results').innerHTML = result;	// Post result to page
};


function myFunc(element) {
	// Hvis elementet allerede er markeret, gem det igen
	if(element.nextSibling.style.display == "block") {
		$(element.nextSibling).slideUp(100);
	}
	else {
		// Gem alle elementer, og fremhæv det markeret
		var changePasswordElements = document.getElementsByClassName('change-password');
		for(i = 0; i < changePasswordElements.length; i++) {
			$(changePasswordElements[i]).slideUp(100);
		}
		// marker
		$(element.nextSibling).slideDown(100);
	}
}
</script>


<div class="box" id="delete-user"> 
	<div id="alert"></div>
	<div class="title-text">Nulstil adgangskode</div>
	<b>Søg efter brugere hvis adgangskode skal nulstilles</b><br><br>
	
	<input type="text" id="search" placeholder="Indtast navn eller ID" class="form-control" onkeyup="onSearch(this.value);">
	<div id="search-results"></div><br>
	<button type="button" class="btn btn-success button">Luk</button>
</div>
@stop