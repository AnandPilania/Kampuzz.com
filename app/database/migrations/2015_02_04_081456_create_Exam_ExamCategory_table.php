<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExamExamCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam_examcategory', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('exam_id')->unsigned()->index();
			//$table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
			$table->integer('examcategory_id')->unsigned()->index();
			//$table->foreign('examcategory_id')->references('id')->on('exam_categories')->onDelete('cascade');
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
		Schema::drop('exam_examcategory');
	}

}
