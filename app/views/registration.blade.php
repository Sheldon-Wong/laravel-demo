<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>注册</title>
		<base href="http://localhost:8888/" />
		<link rel="stylesheet" href="css/vendor/bootstrap.min.css">
		<link rel="stylesheet" href="css/vendor/bootflat.css">
		<link rel="stylesheet" href="css/vendor/pure-grids.css">
		<link rel="stylesheet" href="css/vendor/vegas/jquery.vegas.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/page/registration.css">
	</head>
	<body>
		<div class="container">
			<div id="registration">
				<aside>
					watch.io
				</aside>
				<div class="card-list card blank-form-card red-shadow">
					<div class="card-content">
						<header>Hi</header>
						<?php
						echo Form::open(array('url' =>'/user/registration'));
						echo Form::text('name', '', array('placeholder' => '用户名', 'class' => 'input', 'required', 'autofocus'));
						echo Form::email('email', '', array('placeholder' => '邮箱', 'class' => 'input', 'required'));
						echo Form::password('password', array('placeholder' => '密码', 'class' => 'input', 'required'));
						echo Form::button('watch now', array('class' => 'btn btn-lg btn-danger btn-block', 'type' => 'submit'));
						echo Form::close();
			            ?>
					</div>
				</div>
	    	</div>
	    </div>
	    <script type="text/javascript" src="js/vendor/jquery.min.js"></script>
		<script type="text/javascript" src="js/vendor/vegas/jquery.vegas.min.js"></script>
		<script type="text/javascript">
			$(function() {
				$.vegas({
				    src: '/images/registration-bg/wallpaper-2753493.jpg'
                });
			})
		</script>
	</body>
</html>
