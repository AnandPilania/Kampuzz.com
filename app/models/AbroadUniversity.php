<?php

class AbroadUniversity extends \Eloquent {
    protected $table = "abroad_university";
    protected $primaryKey = "univ_id";
    protected $fillable = [];


    public function courses()
    {
        return $this->hasMany('AbroadCourse','univ_id');
    }

    public function campuses()
    {
        return $this->hasMany('AbroadUniversityCampuses','univ_id');
    }

    public function photos()
    {
        return $this->hasMany('AbroadUniversityMultimedia','univ_id');
    }
}