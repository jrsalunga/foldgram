<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoldagramReffAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('foldagram_reff_address', function(Blueprint $table)
		{	
			$table->string("fullname",255);
			$table->string("country",255);
			$table->string("address_one",255);
			$table->string("address_two",255);
			$table->string("city",255);
			$table->string("state",255);
			$table->string("zipcode",255);
			$table->timestamps();
			$table->integer('foldagram_id');
			$table->increments('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('foldagram_reff_address');
	}

}
