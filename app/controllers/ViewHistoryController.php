<?php
/**
* @author sheldon_wong
* @since  2014/6/22
*/
class ViewHistoryController extends BaseController {

	public function index($userId)
	{

		$user = User::find($userId);
		$viewHistories = $user->viewHistories->movie;
		return View::make('')->with('viewHistories', $viewHistories);

	}

}