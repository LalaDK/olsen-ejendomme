@extends('layouts.lightbox')
@section('content')
<script>
var users = new Array();
</script>

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

		result += '<div class="search-result">' 
		+ highlight(key, text, '<b>', '</b>')
		+ '<span class="">' 
		+ '<a href="#" onClick="";>x</a>'
		+ '</span>'
		+ '</div>';
	}
}
	document.getElementById('search-results').innerHTML = result;	// Post result to page
};
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