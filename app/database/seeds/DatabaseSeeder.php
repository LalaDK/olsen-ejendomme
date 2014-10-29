<?php
include('DataGenerator.php');

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('Delete_Data');

		$this->command->info('Old data deleted');

		$this->call('Users');
		$this->command->info('User table seeded!');

		$this->command->info('Generating 5 companies...');
		$this->call('Companies');
		$this->command->info('Company table seeded!');


		$this->command->info('Generating 200 realestates...');
		$this->call('Realestates');
		$this->command->info('Realestate table seeded');

		$this->call('Leases');
		$this->command->info('Lease table seeded');

		$this->call('Clients');
		$this->command->info('Client table seeded');

		$this->call('Contracts');
		$this->command->info('Contracts table seeded');

		$this->command->info('Generating 20 wait list entries...');
		$this->call('Wait_List_Entry');
		$this->command->info('Wait_List_Entry table seeded');


		$this->command->info('Generating 70 contacts...');
		$this->call('Contacts');
		$this->command->info('Contacts table seeded');
	}

}

class Delete_Data extends Seeder{
	public function run(){
		DB::table('wait_list_entry')->delete();
		DB::table('contracts')->delete();
		DB::table('contacts')->delete();
		DB::table('clients')->delete();
		DB::table('leases')->delete();
		DB::table('companies')->delete();
		DB::table('realestates')->delete();
		DB::table('users')->delete();
	}
}

class Wait_List_Entry extends Seeder{
	public function run(){

		$date = new \DateTime;

		for($i = 0; $i < 20; $i++) {
			DB::table('wait_list_entry')->insert(
				array(
					array(
						'company_id'=>rand(1,5),
						'client_id'=>rand(1,50),
						'signed_up'=>$date,
						'created_at' => $date,
						'updated_at' => $date
						)
					)
				);
		}
	}
}

class Contracts extends Seeder{
	public function run(){

		$date = new \DateTime;

		DB::table('contracts')->insert(
			array(
				array(
					'lease_id'=>'1',
					'client_id'=>'1',
					'moving_in'=>$date,
					'moving_out'=>$date,
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'lease_id'=>'2',
					'client_id'=>'2',
					'moving_in'=>$date,
					'moving_out'=>$date,
					'created_at' => $date,
					'updated_at' => $date
					)
				)
			);
	}
}

class Contacts extends Seeder{
	public function run(){

		$date = new \DateTime;
		for($i = 0; $i < 70; $i++) {
			DB::table('contacts')->insert(
				array(
					array(
						'client_id' => 1,
						'firstname' => DG::firstname(),
						'lastname' => DG::lastname(),
						'phone' => DG::phone(),
						'mobile_phone' => DG::phone(),
						'email' => DG::email(),
						'created_at' => $date,
						'updated_at' => $date
						)
					)
				);
		}
	}
}

class Clients extends Seeder{
	public function run(){

		$date = new \DateTime;
		for($i = 0; $i < 200; $i++) {
			DB::table('clients')->insert(
				array(
					array(
						'company_id'=>rand(1,5),
						'firstname' => DG::firstname(),
						'lastname' => DG::lastname(),
						'street_name' => DG::streetname(),
						'street_number' => DG::number2(),
						'city' => DG::city(),
						'zipcode' => DG::zipcode(),
						'phone' => DG::phone(),
						'mobile_phone' => DG::phone(),
						'email' => DG::email(),
						'notes' => 'Vil kun bo i en lejlighed med vinduer',
						'created_at' => $date,
						'updated_at' => $date
						)
					)
				);
		}
	}
}

class Leases extends Seeder{
	public function run(){

		$date = new \DateTime;
		for($i = 0; $i < 40; $i++){
		DB::table('leases')->insert(
			array(
				array(
					'realestate_id' => rand(1,199),
					'type' => DG::ranChooser(array('Erhverv', 'Garage', 'Privat')),
					'description' => 'Lejemål ' . $i,
					'size' => rand(100,200),
					'lease_price' => rand(1000,10000),
					'water_advance' => rand(100,900),
					'heat_advance' => rand(100,900),
					'power_advance' => rand(100,900),
					'gas_advance' => rand(100,900),
					'created_at' => $date,
					'updated_at' => $date
					)
				)
			);
	}
}
}

class Realestates extends Seeder{
	public function run(){

		$date = new \DateTime;

		for($i = 0; $i < 200; $i++) {
			DB::table('realestates')->insert(
				array(
					array(
						'company_id' => rand(1,5),
						'street_name' => DG::streetname(),
						'street_number' => DG::number2(),
						'zip_code' => DG::zipcode(),
						'city' => DG::city(),
						'cadastral_number' => 'euref' . DG::number2(),
						'leases' => rand(5,50),
						'build_date' => $date,
						'outer_sqm' => rand(30,80),
						'inner_sqm' => rand(30,80),
						'ground_area' => rand(30,200),
						'energy_label' => 'A',
						'property_valuation' => rand(100000, 1000000),
						'purchase_value' => rand(100000, 1000000),
						'base_value' => rand(100000, 1000000),
						'created_at' => $date,
						'updated_at' => $date
						)
					)
				);
		}
	}
}

class Companies extends Seeder{
	public function run(){

		$date = new \DateTime;
		for($i = 1; $i < 6; $i++) {
			DB::table('companies')->insert(
				array(
					array(
						'name' => DG::city() . "s " . DG::ranChooser(array('Boligselskab A/S', 'Ejendomme ApS', 'Mæglere ApS')),
						'address' => DG::streetname() . " " . DG::number2() . ", " . DG::zipcode() . " " . DG::city(),
						'phonenumber' => '+45 ' . rand(11111111, 99999999),
						'registration_number' => rand(11111, 99999),
						'vat_number' => rand(1111111, 9999999),
						'created_at' => $date,
						'updated_at' => $date
						)
					)
				);
		}
	}
}

class Users extends Seeder {

	public function run()
	{
		/* Delete all users */

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
