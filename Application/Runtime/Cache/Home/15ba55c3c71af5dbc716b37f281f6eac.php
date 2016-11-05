<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>微博系统——登录界面</title>
		<script type="text/javascript" src="/Public/Home/js/jquery.js"></script>
		<script type="text/javascript" src="/Public/Home/js/jquery.ui.js"></script>
		<script type="text/javascript" src="/Public/Home/js/login.js"></script>
		<script type="text/javascript" src="/Public/Home/js/jquery.validate.js"></script>
		<script type="text/javascript" src="/Public/Home/js/jquery.form.js"></script>
		<link rel="stylesheet" href="/Public/Home/css/jquery.ui.css">
		<link rel="stylesheet" href="/Public/Home/css/login.css">
		<script type="text/javascript">
			var ThinkPHP = {
				"IMG" : "/Public/<?php echo MODULE_NAME;?>/img",
				"MODULE" : "/index.php/Home",
				"INDEX"	: "<?php echo U('Index/index');?>",
			};
		</script>
	</head>
	<body>
		<div id="header"></div>
		
		<div id="main">
			<form id="login">
				<div class="top">
					<span class="username">
						<input type="text" name="username" placeholder="用户名/邮箱">
						<label class="auto" for="auto"><input type="checkbox" id="auto" name="auto">自动登录</label>
					</span>
					<span class="password">
						<input type="password" name="password" placeholder="密码">
					</span>
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
		
		<form id="verify_register" form-click="">
			<ol class="ver_error"></ol>
			<p>
				<label for="verify">验证码：</label>
				<input type="text" name="verify" class="text" id="verify">
				<span class="star">*</span>
				<a href="javascript:void(0)" class="changeimg">换一换</a>
			</p>
			<p>
				<img src='<?php echo U("Login/verify",'','');?>' class="changeimg verifyimg">
			</p>
		</form>
	</body>
</html>