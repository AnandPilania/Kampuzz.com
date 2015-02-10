<?php

class Product extends \Eloquent {
	protected $fillable = [];

	public function categories(){
		return $this->belongsToMany('ProductCategory');
	}

	public function tags()
	{
		return $this->morphToMany('Tag', 'taggable');
	}
}