<?php

class RequestBrochure extends \Eloquent {
	protected $table = "req_brochures";
	protected $fillable = ['entity_type', 'entity_id', 'user_id', 'course_id'];
}