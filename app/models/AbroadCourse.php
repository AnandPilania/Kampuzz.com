<?php

class AbroadCourse extends \Eloquent {
    protected $primaryKey = "course_id";
    protected $fillable = [];


    public function eligibility()
    {
        return $this->hasMany('AbroadCourseEligibility','course_id');
    }

    public function university()
    {
        return $this->BelongsTo('AbroadUniversity','univ_id');
    }




}