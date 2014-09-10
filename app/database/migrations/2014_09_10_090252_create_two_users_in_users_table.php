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
				'email' => 'admin',
				'password' => 'qwerty',
				'created_at' => $date,
				'updated_at' => $date
				)
			);


		DB::table('users')->insert(
			array(
				'email' => 'user',
				'password' => 'qwerty',
				'created_at' => $date,
				'updated_at' => $date
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
