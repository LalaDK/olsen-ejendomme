<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwoRealestates extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
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

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('realestates')->where('cadastral_number','=','euref89')->delete();
		DB::table('realestates')->where('cadastral_number','=','euref90')->delete();
		DB::table('realestates')->where('cadastral_number','=','euref91')->delete();
		DB::table('realestates')->where('cadastral_number','=','euref92')->delete();
	}

}
