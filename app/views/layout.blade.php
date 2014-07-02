<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no;">
		<title>watch.io</title>
		@yield('styles')
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

		@if( Auth::id() )
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
		@endif

		<!-- top navigator is shown and fixed at the top of the window,
				which appears in every page -->
		<div class="navigator">
			<header class="logo">
				<h1><a href="/">watch.io</a></h1>
			</header>
			<div class="nav-icon">
				<a id="js-btn-side-left" href="#js-sider-left"><i class="fa fa-bars"></i></a>
			</div>
			@if( Auth::id() )
			<div class="nav-icon">
				<a id="js-btn-side-right" href="#js-sider-right"><i class="fa fa-user"></i></a>
			</div>
			@else
			<div class="nav-icon" id="login">
				<a href="/login" class="btn weaken">登录</a>
				<a href="/signup" class="btn btn-danger">注册</a>
			</div>
			@endif
		</div>
		<div class="iwatch-wrapper">
			<!-- // -->
			@yield('content')
			<!-- search bar, which appears in every page to offer a quick navigation -->
				<a class="search-icon" href="#"><img src="images/search-icon.png"></a>
				<div class="search-input bench">
					<input type="text" placeholder="试试输入‘钢铁侠’">
				</div>
				<div class="search-content nav-content">
					<ul>
						
					</ul>
				</div>
				<!-- // -->
				@yield('actions')
			</div>
		</div>
	@yield('scripts')
	</body>
</html>
