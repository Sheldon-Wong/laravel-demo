<?php

class CartItem extends Eloquent {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cartItems';

	public $timestamps = false;

	public function owners()
	{
		return $this->belongsTo('User','owner');
	}

	public function items()
	{
		return $this->belongsTo('Movie','item');
	}


}

?>