<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwoTenants extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$date = new \DateTime;
		DB::table('tenants')->insert(
			array(
				array(
					'lease_id' => 1,
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
					'moving_in' => $date,
					'moving_out' => $date,
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'lease_id' => 2,
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
					'moving_in' => $date,
					'moving_out' => $date,
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'lease_id' => 3,
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
					'moving_in' => $date,
					'moving_out' => $date,
					'created_at' => $date,
					'updated_at' => $date
					),
				array(
					'lease_id' => 4,
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
					'moving_in' => $date,
					'moving_out' => $date,
					'created_at' => $date,
					'updated_at' => $date
					)
				)
);

DB::table('contacts')->insert(
	array(
		array(
			'tenant_id' => 1,
			'firstname' => 'Henrik',
			'lastname' => 'Madsen',
			'phone' => '12312312',
			'mobile_phone' => '21321321',
			'email' => 'johnny@madsen.dk',
			'created_at' => $date,
			'updated_at' => $date
			),		
		array(
			'tenant_id' => 2,
			'firstname' => 'Anders',
			'lastname' => 'Hansen',
			'phone' => '12312312',
			'mobile_phone' => '21321321',
			'email' => 'ah@gmail.dk',
			'created_at' => $date,
			'updated_at' => $date
			),		
		array(
			'tenant_id' => 3,
			'firstname' => 'Lars',
			'lastname' => 'Frandsen',
			'phone' => '12312312',
			'mobile_phone' => '21321321',
			'email' => 'lf@gmail.dk',
			'created_at' => $date,
			'updated_at' => $date
			),		
		array(
			'tenant_id' => 4,
			'firstname' => 'Rolf',
			'lastname' => 'Frans Larsen',
			'phone' => '12312312',
			'mobile_phone' => '21321321',
			'email' => 'rofl@yahoo.dk',
			'created_at' => $date,
			'updated_at' => $date
			),
		array(
			'tenant_id' => 4,
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

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
