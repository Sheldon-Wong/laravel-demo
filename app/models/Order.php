<?php

class Order extends Eloquent {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'orders';

	public function buyers()
	{
		return $this->belongsTo('User','buyer');
	}

	public function orderItems()
	{
		return $this->hasMany('OrderItem','order_id');
	}

}

?>