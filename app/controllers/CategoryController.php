<?php
/**
* @author sheldon_wong
* @since  2014/6/11
*/
class CategoryController extends BaseController {

	public function index()
	{

		$category = Category::all();
		// if ( Auth::user()->role === 'ADMIN' ) {
		 	return View::make('dashboard.categories')->with('categories', $category);
		// }

	}

	public function store()
	{

		$Category = new Category;
		$Category->title = Input::get('title');
		$Category->save();

	}

	public function update($categoryId)
	{

		$category = Category::find($categoryId);
		$category->title = Input::get('title');
		$category->save();

	}

	public function destroy($categoryId)
	{

		$category = Category::find($categoryId);
		$category->delete();

	}

}
