<?php

class Category extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';

	public $timestamps = false;

	public function movies()
	{
		return $this->belongsToMany('Movie','movie_category');
	}

}


?>