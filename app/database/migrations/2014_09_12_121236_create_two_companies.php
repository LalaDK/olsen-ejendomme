<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwoCompanies extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
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

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('companies')->where('registration_number','=','12345678')->delete();
		DB::table('companies')->where('registration_number','=','22222222')->delete();
	}

}
