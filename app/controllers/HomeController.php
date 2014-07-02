<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{

		$movies = Movie::all()->take(6);
		$news = News::all()->take(2);
		foreach ($news as $n) {
			$n->content = substr($n->content, 0, 100*2);
		}
		$array = array('movies' => $movies, 'news' => $news);
		return View::make('index')->with('array', $array);

	}

}