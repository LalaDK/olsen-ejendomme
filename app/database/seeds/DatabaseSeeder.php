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

		$this->call('Companies');

		$this->command->info('Company table seeded!');

		$this->call('Realestates');

		$this->command->info('Realestate table seeded');

		$this->call('Leases');

		$this->command->info('Lease table seeded');

		$this->call('Clients');

		$this->command->info('Client table seeded');

		$this->call('Contracts');

		$this->command->info('Contracts table seeded');

		$this->call('Wait_List_Entry');

		$this->command->info('Wait_List_Entry table seeded');
	}

}

class Delete_Data extends Seeder{
	public function run(){
		DB::table('wait_list_entry')->delete();
		DB::table('contracts')->delete();
		DB::table('contacts')->delete();
		DB::table('clients')->delete();
		DB::table('leases')->delete();
		DB::table('realestates')->delete();
		DB::table('companies')->delete();
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

		DB::table('contacts')->insert(
			array(
				array(
					'client_id' => 1,
					'firstname' => 'Henrik',
					'lastname' => 'Madsen',
					'phone' => '12312312',
					'mobile_phone' => '21321321',
					'email' => 'johnny@madsen.dk',
					'created_at' => $date,
					'updated_at' => $date
					),  
				array(
					'client_id' => 2,
					'firstname' => 'Anders',
					'lastname' => 'Hansen',
					'phone' => '12312312',
					'mobile_phone' => '21321321',
					'email' => 'ah@gmail.dk',
					'created_at' => $date,
					'updated_at' => $date
					),  
				array(
					'client_id' => 3,
					'firstname' => 'Lars',
					'lastname' => 'Frandsen',
					'phone' => '12312312',
					'mobile_phone' => '21321321',
					'email' => 'lf@gmail.dk',
					'created_at' => $date,
					'updated_at' => $date
					),  
				array(
					'client_id' => 4,
					'firstname' => 'Rolf',
					'lastname' => 'Frans Larsen',
					'phone' => '12312312',
					'mobile_phone' => '21321321',
					'email' => 'rofl@yahoo.dk',
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'client_id' => 4,
					'firstname' => 'Torben',
					'lastname' => 'Thorning',
					'phone' => '12312312',
					'mobile_phone' => '21321321',
					'email' => 'turbotorben@hotmail.com',
					'created_at' => $date,
					'updated_at' => $date
					)
				)
);
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

		DB::table('leases')->insert(
			array(
				array(
					'realestate_id' => 1,
					'type' => 'Erhverv',
					'description' => 'Lejemål 1',
					'size' => 200,
					'lease_price' => 6500,
					'water_advance' => 200,
					'heat_advance' => 150,
					'power_advance' => 250,
					'gas_advance' => 75,
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'realestate_id' => 1,
					'type' => 'Erhverv',
					'description' => 'Lejemål 2',
					'size' => 500,
					'lease_price' => 7500,
					'water_advance' => 200,
					'heat_advance' => 150,
					'power_advance' => 250,
					'gas_advance' => 75,
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'realestate_id' => 1,
					'type' => 'Privat',
					'description' => 'Lejemål 3',
					'size' => 56,
					'lease_price' => 3500,
					'water_advance' => 100,
					'heat_advance' => 50,
					'power_advance' => 50,
					'gas_advance' => 175,
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'realestate_id' => 2,
					'type' => 'Privat',
					'description' => 'Lejemål 4',
					'size' => 100,
					'lease_price' => 8500,
					'water_advance' => 300,
					'heat_advance' => 350,
					'power_advance' => 350,
					'gas_advance' => 375,
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'realestate_id' => 2,
					'type' => 'Privat',
					'description' => 'Lejemål 5',
					'size' => 90,
					'lease_price' => 11500,
					'water_advance' => 250,
					'heat_advance' => 140,
					'power_advance' => 280,
					'gas_advance' => 175,
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'realestate_id' => 2,
					'type' => 'Privat',
					'description' => 'Lejemål 6',
					'size' => 500,
					'lease_price' => 2500,
					'water_advance' => 100,
					'heat_advance' => 75,
					'power_advance' => 50,
					'gas_advance' => 35,
					'created_at' => $date,
					'updated_at' => $date
					),
				)
);

}
}

class Realestates extends Seeder{
	public function run(){

		$date = new \DateTime;

		for($i = 0; $i < 200; $i++) {
			DB::table('realestates')->insert(
				array(
					array(
						'company_id' => rand(1,3),
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
		for($i = 0; $i < 5; $i++) {
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
