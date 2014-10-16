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
	var result = '';
	if(searchString != '') {
	var arr = searchStr(searchString, users);
	var key = searchString; 

	for(i = 0; i < arr.length; i++) {
		var text = arr[i][1] + ' - ' + arr[i][2];
		result += '<div class="search-result" onClick="expandSelectedElement(this)";>' 
		+ highlight(key, text, '<b>', '</b>')
		+ '<a href="#">'
		+ '<span class="glyphicon glyphicon-lock" style="right:15px;">'
		+ '</span></a></div>'

		+ '<div class="change-password">'
		+ '<span>'
		+ '<form class="form-inline form-group" action="{{URL::route(/users/update)}} /'+ arr[i][0] + '" method="POST">'
		+ '<input type="password" name="password" placeholder="Ny adgangskode" class="form-control">'
		+ '<input type="hidden" name="name" value="'+ arr[i][1] + '">'
		+ '<input type="hidden" name="email" value="'+ arr[i][2] + '">'
		+ '<input type="submit" value="Gem">'
		+ '</form></div>';
	}
}
	document.getElementById('search-results').innerHTML = result;	// Post result to page
};


function expandSelectedElement(element) {
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