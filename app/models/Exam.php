<?php

class Exam extends \Eloquent {
    protected $fillable = [];

    public function examdates()
    {
        return $this->hasMany('ExamDate');
    }

    public function categories(){
        return $this->belongsToMany('ExamCategory');
    }

    public function tags()
    {
        return $this->morphToMany('Tag', 'taggable');
    }
}