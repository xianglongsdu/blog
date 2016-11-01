<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>微博系统——登录界面</title>
		<script type="text/javascript" src="__JS__/jquery.js"></script>
		<script type="text/javascript" src="__JS__/jquery.ui.js"></script>
		<script type="text/javascript" src="__JS__/login.js"></script>
		<script type="text/javascript" src="__JS__/jquery.validate.js"></script>
		<script type="text/javascript" src="__JS__/jquery.form.js"></script>
		<link rel="stylesheet" href="__CSS__/jquery.ui.css">
		<link rel="stylesheet" href="__CSS__/login.css">
		<script type="text/javascript">
			var ThinkPHP = {
				"IMG" : "__PUBLIC__/{:MODULE_NAME}/img",
				"MODULE" : "__MODULE__"
			};
		</script>
	</head>
	<body>
		<div id="header"></div>
		
		<div id="main">
			<form id="login">
				<div class="top">
					<input type="text" name="username" placeholder="用户名/邮箱">
					<input type="password" name="password" placeholder="密码">
					<input type="submit" name="submit" value="登录">
				</div>
				<div class="bottom">
					<a href="javascript:void(0)" id="reg_link">注册新用户</a>
					<a href="javascript:void(0)">忘记密码？</a>
				</div>
			</form>
		</div>
		
		<div id="footer"></div>
		<p class="footer_text">Juedi's blog</p>
		
		<form id="register" action="123.html">
			<ol class="register_errors"></ol>
			<p>
				<label for="username">账号：</label>
				<input type="text" name="username" class="text" id="username" placeholder="昵称，不小于两位！">
				<span class="star">*</span>
			</p>
			<p>
				<label for="password">密码：</label>
				<input type="password" name="password" class="text" id="password" placeholder="密码，不小于6位！">
				<span class="star">*</span>
			</p>
			<p>
				<label for="repassword">确认：</label>
				<input type="password" name="repassword" class="text" id="repassword" placeholder="密码和密码确认必须一致！">
				<span class="star">*</span>
			</p>
			<p>
				<label for="email">邮箱：</label>
				<input type="email" name="email" class="text" id="email" placeholder="邮箱，用于找回密码！">
				<span class="star">*</span>
			</p>
		</form>
		
		<div id="loading">数据交互中...</div>
		
		<form id="verify_register">
			<ol class="ver_error"></ol>
			<p>
				<label for="verify">验证码：</label>
				<input type="text" name="verify" class="text" id="verify">
				<span class="star">*</span>
				<a href="javascript:void(0)" class="changeimg">换一换</a>
			</p>
			<p>
				<img src='{:U("Login/verify",'','')}' class="changeimg verifyimg">
			</p>
		</form>
	</body>
</html>