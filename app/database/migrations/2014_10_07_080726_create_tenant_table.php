<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tenants', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('lease_id')->unsigned();
			$table->foreign('lease_id')->references('id')->on('leases');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('street_name');
			$table->string('street_number');
			$table->string('city');
			$table->string('zipcode');
			$table->string('phone');
			$table->string('mobile_phone');
			$table->string('email');
			$table->string('notes');
			$table->date('moving_in');
			$table->date('moving_out');
			$table->timestamps();
		});

		Schema::create('contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tenant_id')->unsigned();
			$table->foreign('tenant_id')->references('id')->on('tenants');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('email');
			$table->string('phone');
			$table->string('mobile_phone');
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
		Schema::drop('contacts');
		Schema::drop('tenants');
	}

}
