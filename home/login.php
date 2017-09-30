<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>分类页面</title>
	<link rel="stylesheet" href="public/css/index.css">
</head>
<body>
	<div class="main">
		<?php 
			include 'header.php';
		?>
		<div class="nav"></div>
		<div class="content2">
			<div class="login">
				<div class='loginForm'>
					<form action="check.php" method='post'>
						<p><input type="text" name='username' placeholder='用户名'></p>

						<p><input type="password" name='password' placeholder='密码'></p>

						<p><input type="submit" value="登录"></p>
					</form>	
				</div>
			</div>
		</div>	
		<div class="nav"></div>
		<?php 
			include 'footer.php';
		?>
	</div>	
</body>
</html>