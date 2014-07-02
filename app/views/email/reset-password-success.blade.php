<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>成功重置密码</title>
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
						<header>Done !</header>
						<p>欢迎回来！您已成功重置密码！请使用新密码登录。</p>
						<a href="/login" class="btn btn-lg btn-danger btn-block" type="submit">登录账号</a>
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
