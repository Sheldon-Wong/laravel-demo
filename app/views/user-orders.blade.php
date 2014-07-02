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
		<link rel="stylesheet" href="css/page/admin.css">
		<link rel="stylesheet" href="css/page/user-orders.css">
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
			<div id="user-orders" class="content">
				<ul class="card-list card-list-striped row cards-order">
					@foreach ( $orders as $order )
					<li class="col-xs-12">
						<div class="card">
							<div class="card-content">
								<div class="order-info">
									<img src="{{ $order->buyers->avatarUri }}" alt="">
									<p><b>订单编号</b> {{ $order->id }}</p>
									<p><b>购买用户</b> {{ $order->buyers->name }}</p>
								</div>
								<div class="order-content">
									<ul>
										@foreach ( $order->orderItems as $orderItem )
										<li><a href="/movie/{{ $orderItem->items->id }}"><img src="{{ $orderItem->items->coverUri }}" alt=""></a></li>
										@endforeach
									</ul>
								</div>
								<div class="order-price">
									<p><span><i class="fa fa-jpy"></i></span>{{ $order->totalPrice }}</p>
								</div>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
				
			<div class="bottom-navigator">
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
				<!-- category nav items, which only appears in the home page -->
				<div class="navs bench">
					<!-- <button class="btn btn-block" style="height:100%">加入购物车</button> -->
				</div>
			</div>
		</div>
		<script src="js/vendor/jquery.min.js"></script>
		<script src="js/vendor/sidr/jquery.sidr.min.js"></script>
		<script src="js/watch.global.top-navigator.js"></script>
		<script src="js/watch.global.bottom-navigator.js"></script>
	</body>
</html>
