<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReqBrochures extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('req_brochures', function(Blueprint $table)
		{
			$table->increments('id');
			$table->enum('entity_type', ['College_IN', 'College_Abroad'])->nullable();
			$table->integer('entity_id');
			$table->integer('user_id');
			$table->integer('is_sent')->default(0);
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
		Schema::drop('req_brochures');
	}

}
