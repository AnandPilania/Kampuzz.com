<?php

class ExamDate extends \Eloquent {
    protected $fillable = [];

    public function exam()
    {
        return $this->belongsTo('Exam');
    }
}