<?php
/**
 * URL 路由。
 * 
 * @author billy96322, sheldon_wong, zhoufuxin, doray_hong
 * @since  2014/5/7
 */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*主页*/
Route::get('index', 'HomeController@index');

/*后台管理页*/
Route::get('admin', function(){
	return View::make('dashboard');
});

/*登录*/
Route::get('/login', 'UserController@showLogin');
Route::post('/user/auth', 'UserController@logIn');
Route::get('/user/logout', 'UserController@logOut');

/*注册*/
Route::get('/signup', 'UserController@showSignup');
Route::post('/user/registration', 'UserController@register');

/*修改个人信息页面*/
Route::get('/user/{userId}', array('before' => 'auth', 'uses' => 'UserController@showUpdate'))->where('id', '[0-9]+');
/*修改个人信息*/
Route::post('/user/{userId}', array('before' => 'auth', 'uses' => 'UserController@update'))->where('id', '[0-9]+');

/*上传头像*/
Route::get('/avatar', array('before' => 'auth', function(){

	echo Form::open(array('url' =>'/image/user', 'files'=>true));
	echo Form::file('avatar');
	echo Form::button('upload', array('class' => 'btn btn-lg btn-danger btn-block', 'type' => 'submit'));
	echo Form::close();
	
}));

Route::post('/image/user', array('before' => 'auth', 'uses' => 'ImageController@uploadUserAvatar'));

/*登出*/
Route::get('/logout', 'UserController@logOut');

/*查看全部电影*/
Route::get('/movie', array('before' => 'auth', 'uses' => 'MovieController@index'));
/*删除电影资源*/
Route::delete('/movie/{movieId}', 'MovieController@destroy');
/*查看电影信息*/
Route::get('/movie/{movieId}', 'MovieController@show');

/*查看全部新闻*/
Route::get('/news', 'NewsController@index');
/*查看新闻*/
Route::get('/news/{newsId}', 'NewsController@show');
/*添加新闻*/
Route::post('/news', 'NewsController@store');
/*更新新闻*/
Route::put('/news/{newsId}', 'NewsController@update');
/*删除新闻*/
Route::delete('/news/{newsId}', 'NewsController@destroy');

/*查看演员*/
Route::get('/actor', 'ActorController@index');
/*添加演员*/
Route::post('/actor', 'ActorController@store');
/*更新演员*/
Route::put('/actor/{actorId}', 'ActorController@update');
/*删除演员*/
Route::delete('/actor/{actorId}', 'ActorController@destroy');

/*查看类型*/
Route::get('/category', 'CategoryController@index');
/*添加类型*/
Route::post('/category', 'CategoryController@store');
/*更新类型*/
Route::put('/category/{categoryId}', 'CategoryController@update');
/*删除类型*/
Route::delete('/category/{categoryId}', 'CategoryController@destroy');

/*查看用户*/
Route::get('/user', 'UserController@index');
/*添加用户*/
Route::post('/user', 'UserController@store');
/*更新用户*/
Route::put('/user/{userId}', 'UserController@update');
/*删除用户*/
Route::delete('/user/{userId}', 'UserController@destroy');

/*查看订单*/
Route::get('/order', 'OrderController@index');
/*查找订单*/
Route::get('/order/{orderId}', 'OrderController@show');
/*创建订单*/
Route::post('/order', 'OrderController@store');

/*查看用户购物车*/
Route::get('/cart', 'CartController@show');
/*向购物车添加商品*/
Route::post('/cart', 'CartController@store');
/*从购物车移除商品*/
Route::delete('/cart/{cartItemId}', 'CartController@destroy');
/*更新购物车商品*/
Route::put('/cart/{cartItemId}', 'CartController@update');


/*查看观影记录*/
Route::get('/user/{userId}/movieHistory', 'ViewHistoryController@index');

/*评论电影*/
Route::post('/comment', 'MovieController@comment');

/*搜索电影*/
Route::get('/movieFinder', function()
{

});

/*查看最新电影*/
Route::get('/movie/newest', function()
{

});

/*观看电影*/
Route::get('/movie/{movieId}/watch', 'MovieController@watch');

/*观看预告片*/
Route::get('/movie/{movieId}/trailer//watch', 'MovieController@watchTrailer');

/*上传电影资源*/
Route::post('/movie', function()
{

});

/*修改电源资源*/
Route::put('/movie/{movieId}', function($movieId)
{

});


// /*购买会员*/
// Route::post('/vip', function()
// {

// });

// /*添加角色*/
// Route::post('/role', function()
// {
	
// });

// /*查看全部角色*/
// Route::get('/role', function()
// {

// });

// /*删除角色*/
// Route::delete('/role/{roleId}', function($roleId)
// {

// });

// /*查看角色信息*/
// Route::get('/role/{roleId}', function($roleId)
// {

// });

/***************************通过邮箱重置密码*************************/

Route::get('/forget', 'UserController@forget');

Route::post('/requestPasswordReset', 'UserController@requestPasswordReset');

Route::get('/reset/{token}', 'UserController@responsePasswordReset');

Route::post('/reset/{token}', 'UserController@passwordReset');

/***************************通过邮箱重置密码*************************/





/*搜索电影*/
Route::get('/search', 'SearchController@search');

Route::get('/', 'HomeController@index');

Route::get('/help', function() {
	return View::make('help');
});
