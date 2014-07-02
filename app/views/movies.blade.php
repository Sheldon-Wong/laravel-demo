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
		<link rel="stylesheet" href="js/vendor/raty/jquery.raty.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/page/admin.css">
		<link rel="stylesheet" href="css/page/categories.css">
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
			<div class="modal fade" id="js-order-to-confirm">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
					  	<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">订单确认</h4>
						</div>
						<div class="modal-body card-content">
							<div class="order-picture"></div>
							<div class="order-main">
								<h3></h3>
								<b>价格：<span></span></b>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">取消订单</button>
							<button type="button" class="btn btn-primary js-btn-to-buy">确认支付</button>
						</div>
					</div>
				</div>
			</div>
			<!-- the conent of the page is wrapped in the '.conent' -->
			<div id="categories" class="content">
				<div class="card main-card">
					<nav class="card-content">
						<ul>
							<li class="current"><a href="/search?category=category">全部类型</a></li>
							<li><a href="/search?keyword=category-title&&category=category">电影</a></li>
							<li><a href="/search?keyword=category-title&&category=category">动漫</a></li>
							<li><a href="/search?keyword=category-title&&category=category">演员</a></li>
						</ul>
					</nav>
				</div>
				<ul class="card-list row cards-picture">
					@foreach ($movies as $movie)
					<li class="col-sm-12 col-md-6">
						<div class="card has-actions">
							<div class="card-content" data-dom-movie="{{ $movie->id }}">
								<div class="content-picture">
									<a href="/movie/{{ $movie->id }}"><img src="{{ $movie->coverUri }}" alt="{{ $movie->title }}"></a>
								</div>
								<div class="content-main">
									<h3><a href="/movie/{{ $movie->id }}">{{ $movie->title }}({{ $movie->year }})</a></h3>
									<div class="js-raty" data-score="{{ $movie->rank }}" data-read-only="true"></div>
									<p>价格：<span class="price"><i class="fa fa-jpy"></i> {{ $movie->unitPrice }}</span></p>
									<p>{{ $movie->summary }}</p>

								</div>
							</div>
							<ul class="card-action">
								<li>
									<a href="/movie/{{ $movie->id }}"><i class="fa fa-eye"></i> 预览详情</a>
								</li>
								<li>
									<a href="#" data-toggle="modal" data-movie-id="{{ $movie->id }}" data-target="#js-order-to-confirm" class="red-text"><i class="fa fa-shopping-cart"></i> 立即购买</a>
								</li>
							</ul>
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
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="js/vendor/raty/jquery.raty.js"></script>
		<script src="js/vendor/sidr/jquery.sidr.min.js"></script>
		<script src="js/vendor/masonry.pkgd.min.js"></script>
		<script src="js/watch.global.top-navigator.js"></script>
		<script src="js/watch.global.js"></script>
		<script src="js/watch.global.bottom-navigator.js"></script>
		<script src="js/watch.categories.js"></script>
	</body>
</html>
