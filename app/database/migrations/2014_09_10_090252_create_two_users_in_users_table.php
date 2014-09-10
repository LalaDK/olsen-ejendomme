<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwoUsersInUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$date = new \DateTime;

		DB::table('users')->insert(
			array(
				array(
					'email' => 'admin',
					'password' => Hash::make('qwerty'),
					'created_at' => $date,
					'updated_at' => $date
					),

				array(
					'email' => 'user',
					'password' => Hash::make('qwerty'),
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
		DB::table('users')->where('email', '=', 'admin')->delete();
		DB::table('users')->where('email', '=', 'user')->delete();

	}

}
