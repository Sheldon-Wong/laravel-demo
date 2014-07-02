<?php

class OrderItem extends Eloquent {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'orderItems';

	public $timestamps = false;

	public function items()
	{
		return $this->belongsTo('Movie','item');
	}

	public function buyers()
	{
		return $this->belongsTo('User','buyer');
	}

	public function orders()
	{
		return $this->belongsTo('Order','order_id');
	}

}

?>