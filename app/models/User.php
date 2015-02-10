<?php

use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $fillable = ['name', 'email', 'verification_token', 'phone', 'pincode', 'newsletter'];
	public static $login_rules = [
		'email' => 'required',
		'password' => 'required|min:6',
	];
	public static $registration_rules = [
		'name' => 'required',
		'email' => 'required|email'

	];
	public static $new_password_rules = [
		'new_password' => 'required|min:6',
		'confirm_password' => 'required|same:new_password',

	];
	public static $change_password_rules = [
		'password' => 'required',
		'new_password' => 'required|min:6',
		'confirm_password' => 'required|same:new_password',

	];
	public static $profile_rules = [
		'name' => 'required',
		'mobile' => 'required'

	];



	protected $hidden = array('password', 'remember_token');

	/**
	 * Automatically Hash the password when setting it
	 * @param string $password The password
	 */
	public function setPasswordAttribute($password) {
		$this->attributes['password'] = Hash::make($password);
	}

	public function setVerificationTokenAttribute() {
		$this->attributes['verification_token'] = Hash::make(uniqid('KP'));
	}

	public function getAuthIdentifier() {
		return $this->getKey();
	}


}
