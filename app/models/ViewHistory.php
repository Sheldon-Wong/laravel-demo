<?php

class ViewHistory extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'viewHistory';

	public function movies()
	{
		return $this->belongsTo('Movie','movie');
	}

	public function posters()
	{
		return $this->belongsTo('User','viewer');
	}
	
}


?>