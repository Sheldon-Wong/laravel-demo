<?php
/**
* @author sheldon_wong
* @since  2014/6/11
*/
class ActorController extends BaseController {

	public function index()
	{

		$actor = Actor::all();
		// if ( Auth::user()->role === 'ADMIN' ) {
		 	return View::make('dashboard.actors')->with('actors', $actor);
		// }

	}

	public function store()
	{

		$file = Input::file('avatar');
		$fileName = str_random(12) . '.jpg';
		$destinationPath = 'images/actors/';
		$file->move($destinationPath, $fileName);

		$actor = new Actor;
		$actor->name = Input::get('name');
		$actor->introduce = Input::get('description');
		$actor->avatarUri = $destinationPath . $fileName;
		$actor->save();

		return Redirect::back();

	}

	public function update($actorId)
	{

		$actor = Actor::find($actorId);
		$actor->name = Input::get('name');
		$actor->introduce = Input::get('description');
		$actor->save();

	}

	public function destroy($actorId)
	{

		$actor = Actor::find($actorId);
		File::delete($actor->avatarUri);
		$actor->delete();

	}

}
