<?php

class ArticleCategory extends \Eloquent {
	protected $fillable = [];

	public function articles(){
		return $this->belongsToMany('Article');
	}
}