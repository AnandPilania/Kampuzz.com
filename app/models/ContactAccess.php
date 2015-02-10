<?php

class ContactAccess extends \Eloquent {
	protected $table = "req_contact_access";
	protected $fillable = ['entity_type', 'entity_id', 'user_id'];
}