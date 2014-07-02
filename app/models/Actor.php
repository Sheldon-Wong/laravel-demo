<?php

class Actor extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'actors';

	public $timestamps = false;

	public function movies()
	{
		return $this->belongsToMany('Movie','movie_actor');
	}

}


?>