<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border=1>
		<tr>
			<th>Navn</th>
			<th>E-mail</th>
			<th>Vis</th>
			<th>Slet</th>
		</tr>
		@foreach ($users as $user) 
		<tr>
			<td>{{ $user->name }} </td>
			<td>{{ $user->email }} </td>
			<td>{{link_to("/users/show/{$user->id}")}} </td>
			<td> {{link_to("/users/destroy/{$user->id}")}}</td>
		</tr>
	
	@endforeach

</table>

</body>
</html>