<?php

class SearchController extends BaseController {

	public function search()
	{
		$keyword = Input::get('keyword');
		$category = Input::get('category');

		$arr = null;

		if( $category == 'movie' ) {

			$arr = Movie::where('title', 'like', "%$keyword%")->take(4)->get();
		
		} else {

			$arr = Category::where('title', '=', $category)->first()->movies;

		}
		
		return $arr->toJson();
	}

}