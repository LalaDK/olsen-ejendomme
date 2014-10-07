<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwoLeases extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$date = new \DateTime;
		DB::table('leases')->insert(
			array(
				array(
					'realestate_id' => 1,
					'type' => 'Erhverv',
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
