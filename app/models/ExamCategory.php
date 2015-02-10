<?php

class ExamCategory extends \Eloquent {
	protected $fillable = [];

	public function exams(){
		return $this->belongsToMany('Exam');
	}
}