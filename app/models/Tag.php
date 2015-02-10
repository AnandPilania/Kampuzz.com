<?php

class Tag extends \Eloquent {
	protected $fillable = [];

	public function articles()
	{
		return $this->morphedByMany('Article', 'taggable');
	}

	public function exams()
	{
		return $this->morphedByMany('Exam', 'taggable');
	}

	public function products()
	{
		return $this->morphedByMany('Product', 'taggable');
	}
}