@extends('layout')

@section('styles')
	<link rel="stylesheet" href="css/vendor/bootstrap.min.css">
	<link rel="stylesheet" href="css/vendor/bootflat.css">
	<link rel="stylesheet" href="css/vendor/pure-grids.css">
	<link rel="stylesheet" href="css/vendor/font-awesome.min.css">
	<link rel="stylesheet" href="css/vendor/animate.min.css">
	<link rel="stylesheet" href="js/vendor/sidr/stylesheets/jquery.sidr.dark.css">
	<link rel="stylesheet" href="js/vendor/unslider/unslider.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/page/admin.css">
	<link rel="stylesheet" href="css/page/index.css">
@stop

@section('content')
	<!-- the conent of the page is wrapped in the '.conent' -->
			<div class="content">
				<div class="banner">
				    <ul>
				        <li style="background-image:url(images/sliders/amazing-spiderman-2.jpg)"><a href="/movie-details.html"></a></li>
				        <li style="background-image:url(images/sliders/hobbit.jpg)"><a href="/movie-details.html"></a></li>
				        <li style="background-image:url(images/sliders/harry-potter.jpg)"><a href="/movie-details.html"></a></li>
				        <li style="background-image:url(images/sliders/resident-evil.jpg)"><a href="/movie-details.html"></a></li>
				    </ul>
				</div>
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
				<div id="hot-movies" class="section">
					<header>热门电影</header>
					<div class="card container">
						<ul class="card-content row">
							@foreach ($array['movies'] as $movie)
							<li class="col-xs-4 col-sm-3 col-md-2" data-dom-movie="{{ $movie->id }}">
								<a href="/movie/{{ $movie->id }}"><img class="img-movie-poster" src="{{ $movie->coverUri }}" alt=""></a>
								<h3>{{ $movie->title }}</h3>
								<p><i class="fa fa-jpy"></i> {{ $movie->unitPrice }}</p>
								<ul class="justified-container">
									<li class="justified-item"><a href="/movie/{{ $movie->id }}" class="btn btn-info btn-block">预览</a></li>
									<li class="justified-item"><a href="#" data-movie-id="{{ $movie->id }}" class="btn btn-danger btn-block" data-toggle="modal" data-target="#js-order-to-confirm">购买</a></li>
								</ul>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div id="hot-news" class="section">
					<header>电影资讯</header>
					<div class="card">
						<ul class="card-content container">
							@foreach ($array['news'] as $news)
							<li class="col-xs-12 col-sm-6">
								<div class="row">
								<div class="content-picture col-xs-3">
									<a href="/news/{{ $news->id }}"><img src="{{ $news->imgUri }}" alt="Andrew Garfield"></a>
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
			<!-- // -->
			
			<!-- categories navigator is shown and fixed at the bottom of the window -->
			<!-- bottom navigator's html structrue defined as follows :
				<div class="bottom-navigator red-shadow">
					<a href="" class="search-icon"><img src="images/search-icon.png" alt=""></a>
					<div class="search-input bench">
						<input type="text" placeholder="请输入关键词">
					</div>
					<div class="search-result nav-content">
					</div>
					<div class="navs bench">
					</div>
					<div class="nav-content">
						<div class="nav-content-bg">
						</div>
						<div class="nav-content-items">
						</div>
					</div>
				</div>
			-->
			<div id="categories" class="bottom-navigator">
@stop

@section('actions')
	<!-- category nav items, which only appears in the home page -->
				<div class="navs bench">
					<a href="#happy-ending">电影类型</a>
					<a href="#bad-ending">动漫类型</a>
					<a href="#horrible-ending">演员类型</a>
				</div>
				<!-- // -->
				<!-- detailed content of the first category -->
				<div id="happy-ending" class="nav-content">
					<!-- use a image as the background of this content -->
					<div class="nav-content-bg" style="background-image:url(images/category-nav-content/final-destination-4-bg.jpg)">
					</div>
					<!-- // -->
					<!-- the detailed content is here -->
					<div class="nav-content-items">
						<!-- 'recomendation' here is an alias of 'advertisement' -->
						<div class="recomendation">
							<!-- poster -->
							<img src="images/category-nav-content/final-destination-4.jpg" alt="">
							<!-- brief introduction -->
							<div class="intro">
								<p style="color:#fff">死神来了 4<span>(2009)</span></p>
								<p style="color:#fff"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></p>
								<p style="color:#fff">The world is too crowded, while the hell is empty, so here comes the death.</p>
							</div>
						</div>
						<!-- // -->
						<!-- sub-categories, the real content, is shown here -->
						<ul>
							<li><a href="#">中兴</a></li>
							<li><a href="#">华为</a></li>
							<li><a href="#">小米</a></li>
							<li><a href="#">波导</a></li>
							<li><a href="#">魅族</a></li>
						</ul>
						<!-- // -->
					</div>
					<!-- // -->
				</div>
				<!-- // -->
				<!-- detailed content of the second category -->
				<div id="bad-ending" class="nav-content">
					<div class="nav-content-bg" style="background-image:url(images/category-nav-content/iron-man-3-bg.jpg)">
					</div>
					<div class="nav-content-items">
						<div class="recomendation">
							<img src="images/category-nav-content/iron-man-3.jpg" alt="">
							<div class="intro">
								<p style="color:#fff">钢铁侠 3<span>(2013)</p>
								<p style="color:#fff"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></p>
								<p style="color:#fff">A man who is not an iron but dreamt to be an iron. Now the man's dream comes true.</p>
							</div>
						</div>
						<ul>
							<li><a href="#">Motorola</a></li>
							<li><a href="#">Lenovo</a></li>
							<li><a href="#">Google</a></li>
							<li><a href="#">BlackBerry</a></li>
						</ul>
					</div>
				</div>
				<!-- // -->
				<!-- detailed content of the third category -->
				<div id="horrible-ending" class="nav-content">
					<div class="nav-content-bg" style="background-image:url(images/category-nav-content/monster-university-bg.jpg)"></div>
					<div class="nav-content-items">
						<div class="recomendation">
							<img src="images/category-nav-content/monster-university.jpg" alt="">
							<div class="intro">
								<p style="color:#fff">怪兽大学<span>(2013)</span></p>
								<p style="color:#fff"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></p>
								<p style="color:#fff">A title monster, seen to be hopless, is meant to be a hopeful one.</p>
							</div>
						</div>
						<ul>
							<li><a href="#">北京中关村</a></li>
							<li><a href="#">深圳华强北</a></li>
						</ul>
					</div>
				</div>
	<!-- // -->
@stop

@section('scripts')
	<script src="js/vendor/jquery.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/vendor/unslider/unslider.min.js"></script>
	<script src="js/vendor/sidr/jquery.sidr.min.js"></script>
	<script src="js/watch.global.top-navigator.js"></script>
	<script src="js/watch.home.categories-navigator.js"></script>
	<script src="js/watch.global.bottom-navigator.js"></script>
	<script src="js/watch.home.js"></script>
@stop
