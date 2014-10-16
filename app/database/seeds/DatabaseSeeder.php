<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('Users');

		$this->command->info('User table seeded!');
	}

}

class Users extends Seeder {

	public function run()
	{
		/* Delete all users */
		DB::table('users')->delete();

		$date = new \DateTime;

		DB::table('users')->insert(
			array(
				array(
					'name' => 'Administrator',
					'email' => 'admin',
					'password' => Hash::make('qwerty'),
					'created_at' => $date,
					'updated_at' => $date
					),

				array(
					'name' => 'Mads Dam Eckardt Jensen',
					'email' => 'mdej35@hotmail.com',
					'password' => Hash::make('qwerty'),
					'created_at' => $date,
					'updated_at' => $date
					),

				array(
					'name' => 'Thomas Leonhard',
					'email' => 'thomas@leonhard.dk',
					'password' => Hash::make('qwerty'),
					'created_at' => $date,
					'updated_at' => $date
					),

				array(
					'name' => 'Villy Søvndahl',
					'email' => 'wankervilly@now.com',
					'password' => Hash::make('qwerty'),
					'created_at' => $date,
					'updated_at' => $date
					),

				array(
					'name' => 'Joan Ørting',
					'email' => 'sex@myhouse.now',
					'password' => Hash::make('qwerty'),
					'created_at' => $date,
					'updated_at' => $date
					),

				array(
					'name' => 'Bill Gates',
					'email' => 'newbie@microsoft.com',
					'password' => Hash::make('qwerty'),
					'created_at' => $date,
					'updated_at' => $date
					),

				array(
					'name' => 'Torben Hansen',
					'email' => 'torben@hotmail.com',
					'password' => Hash::make('qwerty'),
					'created_at' => $date,
					'updated_at' => $date
					),

				array(
					'name' => 'Lenny Kravitz',
					'email' => 'rock@popfm.com',
					'password' => Hash::make('qwerty'),
					'created_at' => $date,
					'updated_at' => $date
					),

				array(
					'name' => 'Nilson Mandela',
					'email' => 'igotlocked@home.com',
					'password' => Hash::make('qwerty'),
					'created_at' => $date,
					'updated_at' => $date
					),

				array(
					'name' => 'Lars Løkke Rasmussen',
					'email' => 'player69@poligoof.com',
					'password' => Hash::make('qwerty'),
					'created_at' => $date,
					'updated_at' => $date
					)
				)
);
}
}
