<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRealestate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('realestates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('company_id')->unsigned();
			$table->foreign('company_id')->references('id')->on('companies');

			$table->string('street_name');
			$table->string('street_number');
			$table->string('zip_code');
			$table->string('city');

			$table->string('cadastral_number');
			$table->float('leases');
			$table->datetime('build_date');
			$table->integer('outer_sqm');
			$table->integer('inner_sqm');
			$table->integer('ground_area');
			$table->string('energy_label');
			$table->float('property_valuation');
			$table->float('base_value');
			$table->float('purchase_value');

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
		Schema::drop('realestates');
	}

}
