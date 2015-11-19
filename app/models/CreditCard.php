<?php

class CreditCard extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'credit_cards';

	/**
	 * 
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}
}