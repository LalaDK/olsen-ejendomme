<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<table>
		<tr>
			<th>Navn</th>
			<th>E-mail</th>
			<th>Vis</th>
			<th>Slet</th>
			@foreach ($users as $key => $user) {
			<tr>
				<td> {{ $user-name }} </td>
				<td>{{ $user-email }} </td>
				<td> {{link_to("/users/show/{$user-id}")}} </td>
				<td> </td>
			</tr>
		}

		@endforeach

	</table>

</body>
</html>