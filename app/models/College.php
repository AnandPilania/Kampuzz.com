<?php

class College extends \Eloquent {
	protected $table="college_master";
	protected $primaryKey="college_id";
	protected $fillable = [];

	public function courses(){
		return $this->hasMany('Course')->where('has_detail',1);
	}

	public function recruiters()
	{
		return $this->hasMany('Recruiter')->groupby('recruiter_name');
	}
	public function features()
	{
		return $this->hasMany('CollegeFeature');
	}
	public function images()
	{
		return $this->hasMany('CollegeImage')->where('image_type','Photo');
	}

	public function questions()
	{
		return $this->morphMany('Question', 'question');
	}
}