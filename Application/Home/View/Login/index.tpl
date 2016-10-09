<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>微博系统——登录界面</title>
		<script type="text/javascript" src="__JS__/jquery.js"></script>
		<script type="text/javascript" src="__JS__/jquery.ui.js"></script>
		<script type="text/javascript" src="__JS__/login.js"></script>
		<link rel="stylesheet" href="__CSS__/jquery.ui.css">
		<link rel="stylesheet" href="__CSS__/login.css">
		<script type="text/javascript">
			var ThinkPHP = {
				"IMG" : "__PUBLIC__/{:MODULE_NAME}/img",
			};
		</script>
	</head>
	<body>
		<div id="header"></div>
		
		<div id="main">
			<form id="login">
				<div class="top">
					<input type="text" name="user" placeholder="用户名">
					<input type="password" name="password" placeholder="密码">
					<input type="submit" name="submit" value="登录">
				</div>
				<div class="bottom">
					<a href="javascript:void()" id="reg_link">注册新用户</a>
					<a href="javascript:void(0)">忘记密码？</a>
				</div>
			</form>
		</div>
		
		<div id="footer"></div>
		<p class="footer_text">Juedi's blog</p>
		
		<div id="register">
			<form>
				<p>
					<label for="user">账号：</label>
					<input type="text" name="user" class="text" id="user" placeholder="昵称，不小于两位！">
					<span class="star">*</span>
				</p>
				<p>
					<label for="password">密码：</label>
					<input type="password" name="password" class="text" id="password" placeholder="密码，不小于6位！">
					<span class="star">*</span>
				</p>
				<p>
					<label for="email">邮箱：</label>
					<input type="email" name="email" class="text" id="email" placeholder="邮箱，用于找回密码！">
					<span class="star">*</span>
				</p>
			</form>
		</div>
	</body>
</html>