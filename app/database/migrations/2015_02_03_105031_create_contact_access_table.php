<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactAccessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('contact_access', function (Blueprint $table) {
			$table->increments('id');
			$table->enum('entity_type', ['College_IN', 'College_Abroad'])->nullable();
			$table->integer('entity_id');
			$table->integer('user_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('contact_access');
	}

}
