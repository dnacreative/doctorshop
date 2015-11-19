<?php

class Product extends Eloquent {

	// Product Status Constants
	const CANCELED = -1;
	const PENDING = 0;
	const CHECKED_OUT = 1;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

	/**
	 * 
	 */
	public function category()
	{
		return $this->belongsTo('Category');
	}
	
}