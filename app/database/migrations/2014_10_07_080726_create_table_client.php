<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClient extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('company_id')->unsigned();
			$table->foreign('company_id')->references('id')->on('companies');
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
			$table->timestamps();
		});

		Schema::create('contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('client_id')->unsigned();
			$table->foreign('client_id')->references('id')->on('clients');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('email');
			$table->string('phone');
			$table->string('mobile_phone');
			$table->timestamps();
		});

		Schema::create('contracts', function(Blueprint $table){
			$table->increments('id');
			$table->integer('lease_id')->unsigned();
			$table->foreign('lease_id')->references('id')->on('leases');
			$table->integer('client_id')->unsigned();
			$table->foreign('client_id')->references('id')->on('clients');
			$table->date('moving_in');
			$table->date('moving_out');
			$table->timestamps();
		});

		Schema::create('wait_list_entry', function(Blueprint $table){
			$table->increments('id');
			$table->integer('company_id')->unsigned();
			$table->foreign('company_id')->references('id')->on('companies');
			$table->integer('client_id')->unsigned();
			$table->foreign('client_id')->references('id')->on('clients');
			$table->date('signed_up');
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
		Schema::drop('contracts');
		Schema::drop('contacts');
		Schema::drop('clients');
	}

}
