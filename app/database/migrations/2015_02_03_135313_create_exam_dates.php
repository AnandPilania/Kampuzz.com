<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExamDates extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam_dates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('exam_id');
			$table->string('event_name');
			$table->date('event_date');
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
		Schema::drop('exam_dates');
	}

}
