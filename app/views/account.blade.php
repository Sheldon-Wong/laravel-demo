<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maxium-scale=1.0, user-scalable=no;">
		<title>watch.io</title>
		<base href="http://localhost:8888/" />
		<link rel="stylesheet" href="css/vendor/bootstrap.min.css">
		<link rel="stylesheet" href="css/vendor/bootflat.css">
		<link rel="stylesheet" href="css/vendor/font-awesome.min.css">
		<link rel="stylesheet" href="css/vendor/animate.min.css">
		<link rel="stylesheet" href="js/vendor/sidr/stylesheets/jquery.sidr.dark.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/page/account.css">
	</head>
	<body>
		<nav id="js-sidr-left">
			<ul>
				<li class="active"><a href="/index">首页</a></li>
				<li><a href="/movie">全部电影</a></li>
				<li><a href="/news">电影资讯</a></li>
				<li><a href="/help">帮助中心</a></li>
			</ul>
		</nav>

		<nav id="js-sidr-right" style="display:none">
			<ul>
				<li class="user-info">
					<div class="person-info big-avatar">
		                <img class="person-cycle-avatar" src="{{ User::find(Auth::id())->avatarUri }}" alt="">
		                <span>{{ User::find(Auth::id())->name }}</span>
		            </div>
				</li>
				<li><a href="/user/{{ Auth::id() }}">账号管理</a></li>
				<li><a href="/cart">购物车</a></li>
				<li><a href="/order">订单历史</a></li>
				<li><a href="/logout">退出</a></li>
			</ul>
		</nav>

		<!-- top navigator is shown and fixed at the top of the window,
				which appears in every page -->
		<div class="navigator">
			<header class="logo">
				<h1><a href="/">watch.io</a></h1>
			</header>
			<div class="nav-icon">
				<a id="js-btn-side-left" href="#js-sider-left"><i class="fa fa-bars"></i></a>
			</div>
			<div class="nav-icon">
				<a id="js-btn-side-right" href="#js-sider-right"><i class="fa fa-user"></i></a>
			</div>
		</div>
		<div class="iwatch-wrapper">
			<!-- the conent of the page is wrapped in the '.conent' -->
			<div id="account" class="content">
				{{ Form::open(array('url'=>'/user/'.Auth::id(), 'class'=>'card blank-form-card')); }}
					<div class="card-content">
						<label for="" class="input-label">用户名（不可更改）</label>
						<input class="input" type="text" placeholder="用户名" disabled value="{{ $user->name }}">
						<label for="" class="input-label">邮箱</label>
			            <input class="input" type="email" name="email" placeholder="邮箱" value="{{ $user->email }}">
			            <label for="" class="input-label">密码</label>
			            <input class="input" type="password" name="password" placeholder="请输入新密码">
			            <label for="" class="input-label">确认密码</label>
			            <input class="input" type="password" placeholder="请再输入新密码">
			            <button class="btn btn-lg btn-danger btn-block" type="submit">更新信息</button>
		            </div>
				{{ Form::close(); }}
			</div>
				
			<div class="bottom-navigator">
				<!-- search bar, which appears in every page to offer a quick navigation -->
				<a class="search-icon" href="#"><img src="images/search-icon.png"></a>
				<div class="search-input bench">
					<input type="text" placeholder="试试输入‘钢铁侠’">
				</div>
				<div class="search-content nav-content">
					<ul>
						<li>
							<!-- poster -->
							<img src="images/category-nav-content/final-destination-4.jpg" alt="">
							<!-- brief introduction -->
							<div class="intro">
								<p style="color:#fff">死神来了 4<span>(2009)</span></p>
								<p style="color:#fff"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></p>
								<p style="color:#fff">The world is too crowded, while the hell is empty, so here comes the death.</p>
							</div>
						</li>
					</ul>
				</div>
				<!-- // -->
				<!-- category nav items, which only appears in the home page -->
				<div class="navs bench">
					<!-- <button class="btn btn-block" style="height:100%">加入购物车</button> -->
				</div>
			</div>
		</div>
		<script src="js/vendor/jquery.min.js"></script>
		<script src="js/vendor/sidr/jquery.sidr.min.js"></script>
		<script src="js/watch.global.top-navigator.js"></script>
		<script src="js/watch.global.js"></script>
		<script src="js/watch.global.bottom-navigator.js"></script>
	</body>
</html>
