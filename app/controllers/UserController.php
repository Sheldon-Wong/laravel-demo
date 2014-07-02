<?php
/**
* @author sheldon_wong
* @since  2014/5/7
*/
class UserController extends BaseController {

	public function showSignup()
	{

		return View::make('registration');

	}

	public function register()
	{

		// User::insert([
		// 	'name' => Input::get('name'),
		// 	'email' => Input::get('email'),
		// 	'password' => Hash::make(Input::get('password'))
		// ]);
		$user = new User;
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->avatarUri = 'images/avatars/avatar-boy.png';
		$user->save();

		return Redirect::to('login');

	}

	public function showLogin()
	{

		return View::make('login');

	}

	public function logIn()
	{

		$userdata = array(
				'name' => Input::get('name'),
				'password' => Input::get('password')
			);

		if ( Auth::attempt($userdata) ) {
			if ( Auth::user()->role === 'ADMIN' ) {
				return Redirect::to('admin');
			} else {
				return Redirect::to('index');
			}
		}else{
			return 'Opps!!';
		}
		
	}

	public function logOut()
	{

		Auth::logout();
		return Redirect::to('login');
		
	}

	public function index()
	{

		$user = User::all();
		// if ( Auth::user()->roll === 'ADMIN' ) {
		 	return View::make('dashboard.users')->with('users', $user);
		// }

	}

	public function store()
	{

		$user = new User;
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->avatarUri = 'images/avatars/avatar-boy.png';
		$user->save();

	}

	public function showUpdate($userId)
	{

		$user = User::find($userId);
		return View::make('account')->with('user', $user);
		
	}

	public function update($userId)
	{

		$user = User::find($userId);
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->save();

		Auth::logout();
		return Redirect::to('login');
		
	}

	public function destroy($userId)
	{

		$user = User::find($userId);
		if ( $user->avatarUri != 'images/avatars/avatar-boy.png') File::delete($user->avatarUri);
		$user->delete();

	}

	public function forget()	//忘记密码页面
	{
		return View::make('email.forget-password');
	}

	public function requestPasswordReset()	//请求重置密码
	{
		
		$userName = Input::get('name');
		//if( !$userName ) return "请输入帐号";
		$userEmail = Input::get('email');

		$user = User::where('name', "=", $userName)->where('email', '=', $userEmail)->get();
		//if( $user == '[]') return "该帐号不存在";
		//return $user->name;

		$token = MD5(rand());

		$user = $user[0];
		$user->token = $token;
		$user->save();

		$myEmail = $user->email;
		
		$data = array('name' => $userName, 'token' => $token);

		Mail::send('email.hello', $data, function($message) use ($myEmail)
		{
			$message->to( $myEmail )->subject('Welcome to imax!');
			
		});

		$email_url = null;
		$arr = explode('@', $myEmail);
		$email_url = $arr[1];
		
		return View::make('email.forget-password-success')->with('email_url', $email_url);
	}

	public function responsePasswordReset($token)	//响应请求重置密码
	{
		$user = User::where('token', "=", $token)->get();

		if($user != '[]') {

			return View::make('email.reset-password')->with('token', $token);

		} else {

			return "链接已经失效，请重新获取！";

		}
		
	}

	public function passwordReset($token)	//重置密码
	{
		$user = User::where('token', "=", $token)->get();
		$user = $user[0];
		$user->token = null;

		if( Input::get('newPassword') != "" ) {

			if( Input::get('newPassword') === Input::get('confirmPassword') ) {

				$user->password = Hash::make( Input::get('newPassword') );

			} else return "密码输入不一致";

		} else return "请输入密码！";

		$user->save();

		return View::make('email.reset-password-success');
	}

}
