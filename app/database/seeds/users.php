<?php 

$date = new \DateTime;

return array(
	'table' => 'users', 
	array(
		'name' => 'Mads Dam Eckardt Jensen',
		'email' => 'mdej35@hotmail.com',
		'password' => Hash::make('qwerty'),
		'created_at' => $date,
		'updated_at' => $date
		),

	array(
		'name' => 'Administrator',
		'email' => 'admin',
		'password' => Hash::make('qwerty'),
		'created_at' => $date,
		'updated_at' => $date
		),

	array(
		'name' => 'Thomas Uldahl Leonhard',
		'email' => 'thomas@thomas.dk',
		'password' => Hash::make('qwerty'),
		'created_at' => $date,
		'updated_at' => $date
		),

	array(
		'name' => 'Lotte Heise',
		'email' => 'kinky@work.dk',
		'password' => Hash::make('qwerty'),
		'created_at' => $date,
		'updated_at' => $date
		),

	array(
		'name' => 'Villy Søvndahl',
		'email' => 'oldguy@nowhere.com',
		'password' => Hash::make('qwerty'),
		'created_at' => $date,
		'updated_at' => $date
		)
	);
?>