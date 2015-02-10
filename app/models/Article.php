<?php

class Article extends \Eloquent {
	protected $fillable = [];

	public function categories(){
		return $this->belongsToMany('ArticleCategory');
	}

	public function tags()
	{
		return $this->morphToMany('Tag', 'taggable');
	}

	public function getDates(){
		return ['article_publish_date','created_at','updated_at'];
	}
}