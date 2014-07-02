<?php
/**
* @author sheldon_wong
* @since  2014/6/10
*/
class NewsController extends BaseController {

	public function index()
	{

		$news = News::all();
		if ( Auth::user()->role === 'ADMIN' ) {
		 	return View::make('dashboard.news')->with('news', $news);
		} else {
			return View::make('news')->with('news', $news);
		}

	}

	public function store()
	{

		$file = Input::file('img-uri');
		$fileName = str_random(12) . '.jpg';
	    $destinationPath = 'images/news/';
	    $file->move($destinationPath, $fileName);

		$news = new News;
		$news->title = Input::get('title');
		$news->content = Input::get('news-content');
		$news->imgUri = $destinationPath . $fileName;
		$news->save();

		return Redirect::back();

	}

	public function update($newsId)
	{

		$news = News::find($newsId);
		$news->title = Input::get('title');
		$news->content = Input::get('news-content');
		$news->save();

	}

	public function destroy($newsId)
	{

		$news = News::find($newsId);
		File::delete($news->imgUri);
		$news->delete();

	}

	public function show($newsId)
	{

		$news = News::find($newsId);
		return View::make('news-details')->with('news', $news);

	}

}
