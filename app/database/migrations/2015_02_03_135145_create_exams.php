<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExams extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exams', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('exam_name');
			$table->string('exam_title')->nullable();
			$table->string('exam_intro')->nullable();
			$table->string('exam_type')->nullable();
			$table->string('exam_status')->nullable();
			$table->text('eligibility')->nullable();
			$table->text('application_process')->nullable();
			$table->text('syllabus')->nullable();
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
		Schema::drop('exams');
	}

}
