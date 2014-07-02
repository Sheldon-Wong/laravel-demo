<?php
/**
* @author sheldon_wong
* @since  2014/5/17
*/
class ImageController extends BaseController {

	public function uploadUserAvatar()
	{

	    $file = Input::file('avatar');
		$fileName = str_random(12) . '.jpg';
	    $destinationPath = '/images/avatars/';
		$file->move($destinationPath, $fileName);

		$user = User::find(Auth::user()->id);
		if ( $user->avatarUri != '/images/avatars/avatar-boy.png') File::delete($user->avatarUri);
		$user->avatarUri = $destinationPath . $fileName;
		$user->save();
		
		echo '<img src="../' . $user->avatarUri . '">';
		
	}

}