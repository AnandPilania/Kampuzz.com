<?php

class Question extends \Eloquent {
    protected $fillable = ['user_id', 'question_type', 'question_id', 'question_text'];

    public static $question_rules = [
        'question_text' => 'required|min:6',
        'question_type' => 'required',
        'question_id' => 'required'
    ];

    public function college()
    {
        $this->hasOne('College','college_id');
    }

    public function course()
    {
        $this->hasOne('Course','course_id');
    }
}