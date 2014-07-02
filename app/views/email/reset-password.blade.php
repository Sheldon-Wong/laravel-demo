<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>重置密码</title>
		<base href="http://localhost:8888/" />
		<link rel="stylesheet" href="css/vendor/bootstrap.min.css">
		<link rel="stylesheet" href="css/vendor/bootflat.css">
		<link rel="stylesheet" href="css/vendor/pure-grids.css">
		<link rel="stylesheet" href="css/vendor/font-awesome.min.css">
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
						<header>Back !</header>
						{{ Form::open(array('url' =>'/reset/'.$token)); }}
			            <input class="input" type="text" name="name" placeholder="请输入您注册的用户名" required autofocus>
			            <input class="input" type="password" name="newPassword" placeholder="请输入您的新密码" required>
			            <input class="input" type="password" name="confirmPassword" placeholder="请再次输入您的新密码" required>
			            <button class="btn btn-lg btn-danger btn-block" type="submit"><i class="fa fa-lock"></i> 启用密码</button>
			            {{ Form::close(); }}
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
