<?php
/**
* @author sheldon_wong
* @since  2014/6/8
*/
class MovieController extends BaseController {

	public function index()
	{

		$movie = Movie::all();
		if ( Auth::user()->role === 'ADMIN' ) {
		 	return View::make('dashboard.movies')->with('movies', $movie);
		} else {
			return View::make('movies')->with('movies', $movie);
		}

	}

	public function destroy($movieId)
	{

		$movie = Movie::find($movieId);
		$movie->delete();

	}

	public function show($movieId)
	{

		$movie = Movie::find($movieId);
		$user = Auth::id();
		$orderItems = OrderItem::where('item', '=', $movieId)->where('buyer', '=', $user)->first();
		$keyword = $movie->name;
		$news = News::where('content', 'like', '%' . $keyword . '%')->get();
		foreach ($news as $n) {
			$n->content = substr($n->content, 0, 100*2);
		}
		return View::make('movie-details')->with( array('movie' => $movie, 'news' => $news, 'orderItems' => $orderItems ) );

	}

	public function comment()
	{
		$comment = new Comment;
		$comment->movie = Input::get('movieId');
		$comment->poster = Auth::id();
		$movie = Movie::find(Input::get('movieId'));
		$movie->rank = Input::get('rates');
		$movie->save();
		$comment->content = Input::get('content');
		$comment->save();
	}

	public function watch()
	{
		$user = Auth::id();
		$movie = Input::get('id');

		$role = OrderItem::where('buyer', '=', $user)->where('item', '=', $movie)->first();
		
		if($role) {

			/*
			//观看历史
			if( !($hasHistory = ViewHistory::where('viewer', '=', $user)->where('movie', '=', $movie)->first()) ) {
				$viewHistory = new ViewHistory;
				$viewHistory->viewer = $user;
				$viewHistory->movie = $movie;
				$viewHistory->save();				
			} else {
				$viewHistory = ViewHistory::find($hasHistory->id);
				$viewHistory->save();
			}*/



			return Moive::find($movie)->movieUri;

		} else {
			
			return "";

		}
	}

	public function watchTrailer()
	{
		$trailer = Input::get('id');

		return Moive::find($trailer)->trailerUri;
	}

}