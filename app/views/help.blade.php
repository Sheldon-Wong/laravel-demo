<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maxium-scale=1.0, user-scalable=no;">
		<title>watch.io</title>
		<link rel="stylesheet" href="css/vendor/bootstrap.min.css">
		<link rel="stylesheet" href="css/vendor/bootflat.css">
		<link rel="stylesheet" href="css/vendor/font-awesome.min.css">
		<link rel="stylesheet" href="css/vendor/animate.min.css">
		<link rel="stylesheet" href="js/vendor/sidr/stylesheets/jquery.sidr.dark.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/page/admin.css">
		<link rel="stylesheet" href="css/page/help.css">
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
				<a id="js-btn-side-right" href="#js-sider-right"><i class="fa fa-user"></i>></a>
			</div>
		</div>
		<div class="iwatch-wrapper">
			<!-- the conent of the page is wrapped in the '.conent' -->
			<div id="help" class="content">
				<div class="card main-card blank-form-card">
					<nav class="card-content justified-container">
						<input type="text" class="input" placeholder="输入关键词">
					</nav>
				</div>
				<ul class="card-list row">
					<li class="col-xs-12 col-sm-6">
						<div class="card">
							<div class="card-content" data-keyword-scope>
								<h3><span class="red-text">Q</span><b>如何提高我的账户安全性？</b></h3>
								<p>您可以登陆，在账户信息通过经常性修改密码的方式增加账户安全系数，保证账户安全。</p>
							</div>
						</div>
					</li>

					<li class="col-xs-12 col-sm-6">
						<div class="card">
							<div class="card-content" data-keyword-scope>
								<h3><span class="red-text">Q</span><b>如何进入账户中心？</b></h3>
								<p>您可以登陆，点击主页右上角的图标，再点击帐号管理</p>
							</div>
						</div>
					</li>


					<li class="col-xs-12 col-sm-6">
						<div class="card">
							<div class="card-content" data-keyword-scope>
								<h3><span class="red-text">Q</span><b>如何找回密码？</b></h3>
								<p>首先，在登陆页面点击“忘记密码”，其次填写帐号和邮箱，接着进入邮箱获取链接，然后，输入帐号密码，最后密码设置成功，可使用新密码登陆</p>
							</div>
						</div>
					</li>

					<li class="col-xs-12 col-sm-6">
						<div class="card">
							<div class="card-content" data-keyword-scope>
								<h3><span class="red-text">Q</span><b>邮箱、手机想修改怎么办？</b></h3>
								<p>对于未验证的手机或邮箱，若希望更改，您可以访问我的京东，点击左侧导航账户信息，修改“基本信息”中的手机或邮箱资料即可。对于已验证的手机或邮箱，您可以访问我的京东，点击左侧导航账户安全进行修改。如果您忘记任意一项或者无法操作，请您联系我们的客服人员，核实身份后，我们将协助您修改。</p>
							</div>
						</div>
					</li>

					<li class="col-xs-12 col-sm-6">
						<div class="card">
							<div class="card-content" data-keyword-scope>
								<h3><span class="red-text">Q</span><b>验证手机或邮箱时，提示已被他人验证了，怎么办？</b></h3>
								<p>遇到这种情况时，说明您需要验证的手机或者邮箱已经被他人验证了，请您更换您需要验证的手机或者邮箱，谢谢。</p>
							</div>
						</div>
					</li>

					<li class="col-xs-12 col-sm-6">
						<div class="card">
							<div class="card-content" data-keyword-scope>
								<h3><span class="red-text">Q</span><b>密码设置技巧有哪些？</b></h3>
								<p>为了您的账户安全，在设置密码时，请参考以下建议：
一、密码由6-20位字符组成（字母区分大小写）。
二、请使用数字、字母或符号的组合，如：gklfd_157、89712am%&等。
三、如果设置如下安全性较低的密码，系统会提醒您修改密码以保证安全性：
1、全部由数字组成；
2、全部由字母组成；
3、全部由同一字符组成；
4、与用户名或邮箱相同。
四、定期修改密码，并做好记录工作，以免忘记。
五、不要将支付密码和登录密码设置为同一密码。</p>
							</div>
						</div>
					</li>

					<li class="col-xs-12 col-sm-6">
						<div class="card">
							<div class="card-content" data-keyword-scope>
								<h3><span class="red-text">Q</span><b>如果我有问题或建议是否可以通过邮件向你们反馈？</b></h3>
								<p>可以。请您将订单号、姓名、联系方式及相关信息写明，发送至phpcourse@sina.cn，我们会尽快为您处理问题。谢谢！</p>
							</div>
						</div>
					</li>

					<li class="col-xs-12 col-sm-6">
						<div class="card">
							<div class="card-content" data-keyword-scope>
								<h3><span class="red-text">Q</span><b>如何修改密码？</b></h3>
								<p>登陆后点击页面右上角图标，然后点击账号管理，填写信息后修改密码。</p>
							</div>
						</div>
					</li>
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
		<script src="js/vendor/sidr/jquery.sidr.min.js"></script>
		<script src="js/watch.global.top-navigator.js"></script>
		<script src="js/vendor/jquery.highlight.js"></script>
		<script src="js/watch.home.categories-navigator.js"></script>
		<script src="js/watch.global.bottom-navigator.js"></script>
		<script src="js/vendor/masonry.pkgd.min.js"></script>
		<script src="js/watch.help.js"></script>
	</body>
</html>
