<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * we're going to intercept the assignment of the password attribute, 
	 * hash the value that we received, 
	 * and then store the hashed value in the database.
	 */
	public function setPasswordAttribute($string)
	{
		$this->attributes['password'] = Hash::make($string);
	}
	
	/**
	 * We created this method that returns a relationship.
	 */
	public function creditCard()
	{
		return $this->hasOne('CreditCard');
	}
	
}