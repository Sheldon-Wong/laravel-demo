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
		<link rel="stylesheet" href="js/vendor/flowplayer/skin/functional.css">
		<link rel="stylesheet" href="js/vendor/raty/jquery.raty.css">
		<link rel="stylesheet" href="js/vendor/sidr/stylesheets/jquery.sidr.dark.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/page/admin.css">
		<link rel="stylesheet" href="css/page/movie-details.css">
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
			@if ( $orderItems )
			<div class="modal fade" id="js-watch-movie">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
					  	<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">{{ $movie->title }}({{ $movie->year }})</h4>
						</div>
						<div class="modal-body">
							<div class="flowplayer" data-ratio="0.4167">
								<video>
									<source type="video/mp4" src="{{ $movie->movieUri }}"></source>
								</video>
							</div>
							<div class="modal-footer"></div>
						</div>
					</div>
				</div>
			</div>
			@endif
			<!-- // -->
			<!-- the conent of the page is wrapped in the '.conent' -->
			<div id="movie-details" class="content">
				<div class="card card-detailed-content main-card">
					<div class="card-heading">
						<div class="movie-cover">
							<div style="background-image:url('{{ $movie->bgUri }}')"></div>
						</div>
						<div class="movie-poster col-xs-4 col-sm-2">
							<img class="img-movie-poster" src="{{ $movie->coverUri }}" alt="">
						</div>
						<div class="movie-intro col-xs-8 col-sm-10">
							<h2>{{ $movie->title }} ({{ $movie->year }})</h2>
							<ul>
								<li><div class="js-raty" data-score="{{ $movie->rank }}" data-read-only="true"></div></li>
								<li>导演：{{ $movie->directors }}</li>
								<li>国家：{{ $movie->countries }}</li>
								<li>金额：<span><i class="fa fa-jpy"></i> {{ $movie->unitPrice }}</span></li>
								@if ( !$orderItems )
								<li><a href="#" class="btn btn-danger" data-movie-id="{{ $movie->id }}" data-toggle="modal" data-target="#js-order-to-confirm"><i class="fa fa-jpy"></i> {{ $movie->unitPrice }} 立即购买</a><button class="btn btn-info js-btn-cart-add" data-movie-id="{{ $movie->id }}">加入购物车</button></li>
								@else
								<li><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#js-watch-movie">已购买，点击观看</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>

				<div class="card movie-details-nav">
					<ul class="nav nav-tabs card-content">
						<li class="active"><a href="#intro" data-toggle="tab">简介</a></li>
						<li><a href="#trailer" data-toggle="tab">预告片</a></li>
					</ul>
				</div>
				<div class="tab-content movie-details-item">
					<div class="card tab-pane active" id="intro">
						<div class="card-content">
							<p>{{ $movie->summary }}</p>
						</div>
					</div>
					<div class="card tab-pane" id="trailer">
						<div class="card-content">
							<div class="flowplayer" data-ratio="0.4167">
								<video>
									<source type="video/mp4" src="{{ $movie->trailerUri }}"></source>
								</video>
							</div>
						</div>
					</div>
				</div>

				<div class="card movie-details-nav">
					<ul class="nav nav-tabs card-content">
						<li class="active"><a href="#comments" data-toggle="tab">评论</a></li>
						<li><a href="#related-news" data-toggle="tab">相关新闻</a></li>
					</ul>
				</div>
				<div class="tab-content movie-details-item">
					<div class="card tab-pane active" id="comments">
						<div class="card-content">
							<div class="blank-form-card">
								<div class="card-content">
									<div class="js-comment-rates js-raty"></div>
									<textarea class="input" id="comment" cols="30" rows="3" placeholder="输入评论"></textarea>
									<button type="submit" class="btn btn-danger btn-block js-btn-comment" data-movie-id="{{ $movie->id }}">提交评论</button>
								</div>
							</div>
							<ul class="comment-list">
								@foreach( $movie->comments as $comment )
								<li class="comment">
									<div class="comment-poster person-info">
										<img class="person-cycle-avatar" src="{{ $comment->posters->avatarUri }}" alt="">
									</div>
									<div class="comment-body">
										<span class="addon">{{ $comment->posters->name }}</span>
										<span class="addon">{{ $comment->posters->created_at }}</span>
										<p>{{ $comment->content }}</p>
									</div>
									<div class="clearfix"></div>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="card tab-pane" id="related-news">
						<ul class="card-content container">
							@foreach( $news as $news )
							<li class="col-xs-12 col-sm-6">
								<div class="row">
								<div class="content-picture col-xs-3">
									<a href="/news/{{ $news->id }}"><img src="{{ $news->imgUri }}" alt="{{ $news->title }}"></a>
								</div>
								<div class="content-main col-xs-9">
									<h3><a href="/news/{{ $news->id }}">{{ $news->title }}</a></h3>
									<p>{{ $news->content }}, <a href="/news/{{ $news->id }}">阅读</a></p>
								</div>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
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
		<script src="js/watch.global.top-navigator.js"></script>
		<script src="js/watch.global.js"></script>
		<script src="js/watch.global.bottom-navigator.js"></script>
		<script src="js/watch.movie-details.js"></script>
		<script src="js/vendor/flowplayer/flowplayer.min.js"></script>
	</body>
</html>
