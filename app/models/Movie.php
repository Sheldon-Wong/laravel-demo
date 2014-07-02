<?php

class Movie extends Eloquent {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'movies';

	public function actors()
	{
		return $this->belongsToMany('Actor','movie_actor');
	}

	public function categories()
	{
		return $this->belongsToMany('Category','movie_category');
	}

	public function comments()
	{
		return $this->hasMany('Comment','movie');
	}

	public function viewHistories()
	{
		return $this->hasMany('ViewHistory','movie');
	}

	public function orderItems()
	{
		return $this->hasMany('OrderItem','item');
	}

	public function cartItems()
	{
		return $this->hasMany('CartItem','item');
	}
}

?>