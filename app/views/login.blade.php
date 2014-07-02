<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>登录</title>
		<link rel="stylesheet" href="css/vendor/bootstrap.min.css">
		<link rel="stylesheet" href="css/vendor/bootflat.css">
		<link rel="stylesheet" href="css/vendor/pure-grids.css">
		<link rel="stylesheet" href="css/vendor/vegas/jquery.vegas.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/page/login.css">
	</head>
	<body>
		<header class="logo">
			<h1>imax.io</h1>
		</header>
		<div class="container">
			<div id="login">
				<div class="card blank-form-card red-shadow">
					<div class="card-content">
						<?php
						echo Form::open(array('url' =>'/user/auth'));
						echo Form::text('name', '', array('placeholder' => '账号', 'required', 'autofocus', 'class' => 'input'));
						echo Form::password('password', array('placeholder' => '密码', 'required', 'class' => 'input'));
						echo Form::button('登录', array('class' => 'btn btn-lg btn-danger btn-block', 'type' => 'submit'));
						echo Form::close();
						?>
					</div>
	    		</div>

	    		<div class="card" id="login-card">
					<div class="card-content justified-container">
						<div class="justified-item"><a href="/forget">找回密码</a></div>
						<div class="justified-item"><a href="/signup" class="red-text">立即注册</a></div>
					</div>
				</div>
			</div>
	    </div>
	    <script type="text/javascript" src="js/vendor/jquery.min.js"></script>
		<script type="text/javascript" src="js/vendor/vegas/jquery.vegas.min.js"></script>
		<script type="text/javascript">
			$(function() {
				$.vegas({
				    src: '/images/login-bg/wallpaper-1866199.jpg'
                });
			})
		</script>
	</body>
</html>
