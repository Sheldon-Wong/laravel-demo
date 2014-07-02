<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>成功请求重置密码</title>
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
						<header>Continue ...</header>
						<p>我们已成功发送一条验证邮件到您的邮箱，请查收该邮件，通过邮件内容提供的地址才能完成密码重置！</p>
						<a href="http://mail.{{ $email_url }}" class="btn btn-lg btn-danger btn-block" type="submit">前往邮箱</a>
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
