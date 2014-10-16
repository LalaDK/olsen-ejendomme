<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLease extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leases', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('realestate_id')->unsigned();
			$table->foreign('realestate_id')->references('id')->on('realestates');

			$table->string('type');
			$table->string('description');
			$table->integer('size');
			$table->float('lease_price');

			$table->float('water_advance');
			$table->float('heat_advance');
			$table->float('power_advance');
			$table->float('gas_advance');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('leases');
		
	}

}
