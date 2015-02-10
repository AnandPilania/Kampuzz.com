<?php

class Course extends \Eloquent {
    protected $primaryKey = "course_id";
    protected $fillable = [];

    public function detail()
    {
        return $this->hasOne('CourseDetail');
    }

    public function features()
    {
        return $this->hasMany('CourseFeature');
    }

    public function recruiters()
    {
        return $this->hasMany('Recruiter');
    }

    public function children()
    {
        return $this->hasMany('Course','parent_course_id','course_id');
    }

    public function college()
    {
        return $this->belongsTo('College', 'college_id');
    }
}