<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePictures extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('realestate_pictures', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('realestate_id')->unsigned();
			$table->foreign('realestate_id')->references('id')->on('realestates');

			$table->string('description');
			$table->string('url');

			$table->timestamps();
		});
	Schema::create('lease_pictures', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('lease_id')->unsigned();
			$table->foreign('lease_id')->references('id')->on('leases');

			$table->string('description');
			$table->string('url');

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
		Schema::drop('realestate_pictures');
		Schema::drop('lease_pictures');
		
	}

}
