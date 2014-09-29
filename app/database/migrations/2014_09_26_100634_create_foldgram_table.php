<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoldgramTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('foldagram', function(Blueprint $table) {
			
			$table->text('message');
			$table->string('image');
			$table->boolean('status');
			$table->integer('user_id');
			$table->integer('exported');
			$table->timestamps();
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
		Schema::drop('foldagram');
	}

}
