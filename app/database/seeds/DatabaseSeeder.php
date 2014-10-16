<?php

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

		$this->call('Client_Leases');

		$this->command->info('Client_Leases table seeded');

		$this->call('Waiting_List');

		$this->command->info('Waiting_List table seeded');
	}

}

class Delete_Data extends Seeder{
	public function run(){
		DB::table('waiting_list')->delete();
		DB::table('client_leases')->delete();
		DB::table('contacts')->delete();
		DB::table('clients')->delete();
		DB::table('leases')->delete();
		DB::table('realestates')->delete();
		DB::table('companies')->delete();
		DB::table('users')->delete();
	}
}

class Waiting_List extends Seeder{
	public function run(){

		$date = new \DateTime;

		DB::table('waiting_list')->insert(
			array(
				array(
					'company_id'=>'3',
					'client_id'=>'3',
					'signed_up'=>$date,
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'company_id'=>'3',
					'client_id'=>'4',
					'signed_up'=>$date,
					'created_at' => $date,
					'updated_at' => $date
					)
				)
			);
	}
}

class Client_Leases extends Seeder{
	public function run(){

		$date = new \DateTime;

		DB::table('client_leases')->insert(
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

		DB::table('clients')->insert(
			array(
				array(
					'firstname' => 'Johnny',
					'lastname' => 'Madsen',
					'street_name' => 'Amagerbrogade',
					'street_number' => 100,
					'city' => 'Copenhagen',
					'zipcode' => 2100,
					'phone' => '12312312',
					'mobile_phone' => '21321321',
					'email' => 'johnny@madsen.dk',
					'notes' => 'Vil kun bo i en lejlighed med vinduer',
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'firstname' => 'Svend',
					'lastname' => 'Svendsen',
					'street_name' => 'Nørrebrogade',
					'street_number' => 24,
					'city' => 'Copenhagen',
					'zipcode' => 2100,
					'phone' => '12312312',
					'mobile_phone' => '21321321',
					'email' => 'Svendsemand@gmail.dk',
					'notes' => 'Vil kun bo i en lejlighed med vinduer',
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'firstname' => 'Bo',
					'lastname' => 'Bondemand',
					'street_name' => 'Gyden',
					'street_number' => 45,
					'city' => 'Århus',
					'zipcode' => 8600,
					'phone' => '12312312',
					'mobile_phone' => '21321321',
					'email' => 'bo@bondemand.dk',
					'notes' => '',
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'firstname' => 'Helle',
					'lastname' => 'Thorning',
					'street_name' => 'Rådhuspladsen',
					'street_number' => 1,
					'city' => 'Copenhagen',
					'zipcode' => 1000,
					'phone' => '12312312',
					'mobile_phone' => '21321321',
					'email' => 'Helle@thorning.dk',
					'notes' => 'Vil kun bo i en lejlighed med walk in closet',
					'created_at' => $date,
					'updated_at' => $date
					)
				)
);
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

		DB::table('realestates')->insert(
			array(
				array(
					'company_id' => 1,
					'street_name' => 'Vesterbrogade',
					'street_number' => '20',
					'zip_code' => '1666',
					'city' => 'København',
					'cadastral_number' => 'euref89',
					'leases' => 10,
					'build_date' => $date,
					'outer_sqm' => 65,
					'inner_sqm' => 59,
					'ground_area' => 65,
					'energy_label' => 'D',
					'property_valuation' => 1200000,
					'purchase_value' => 1100000,
					'base_value' => 400000,
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'company_id' => 1,
					
					'street_name' => 'Vesterbrogade',
					'street_number' => '20',
					'zip_code' => '1666',
					'city' => 'København',
					'cadastral_number' => 'euref90',
					'leases' => 20,
					'build_date' => $date,
					'outer_sqm' => 45,
					'inner_sqm' => 39,
					'ground_area' => 45,
					'energy_label' => 'D',
					'property_valuation' => 1000000,
					'purchase_value' => 1800000,
					'base_value' => 350000,
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'company_id' => 2,
					
					'street_name' => 'Vesterbrogade',
					'street_number' => '20',
					'zip_code' => '1666',
					'city' => 'København',
					'cadastral_number' => 'euref91',
					'leases' => 4,
					'build_date' => $date,
					'outer_sqm' => 100,
					'inner_sqm' => 95,
					'ground_area' => 100,
					'energy_label' => 'A',
					'property_valuation' => 2200000,
					'base_value' => 900000,
					'purchase_value' => 2100000,
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'company_id' => 2,
					'street_name' => 'Vesterbrogade',
					'street_number' => '20',
					'zip_code' => '1666',
					'city' => 'København',
					'cadastral_number' => 'euref92',
					'leases' => 24,
					'build_date' => $date,
					'outer_sqm' => 55,
					'inner_sqm' => 49,
					'ground_area' => 55,
					'energy_label' => 'C',
					'property_valuation' => 1100000,
					'purchase_value' => 3100000,
					'base_value' => 300000,
					'created_at' => $date,
					'updated_at' => $date
					)
				)
);
}
}

class Companies extends Seeder{
	public function run(){

		$date = new \DateTime;
		DB::table('companies')->insert(
			array(
				array(
					'name' => 'Selskab 1',
					'address' => 'Dronning Olgas Vej 41',
					'phonenumber' => '+45 55555555',
					'registration_number' => '12345678',
					'vat_number' => '87654321',
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'name' => 'Selskab 2',
					'address' => 'Frederiksberg Alle 2',
					'phonenumber' => '+45 77777777',
					'registration_number' => '12341234',
					'vat_number' => '12345678',
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'name' => 'Selskab 3',
					'address' => 'Jagtvej 51',
					'phonenumber' => '+45 55555555',
					'registration_number' => '22222222',
					'vat_number' => '33333333',
					'created_at' => $date,
					'updated_at' => $date
					)
				)
			);
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
