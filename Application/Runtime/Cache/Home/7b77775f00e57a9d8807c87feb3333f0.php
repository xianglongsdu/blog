<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
<title>微博系统--我的首页</title>
<script type="text/javascript" src="/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Home/js/rl_exp.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.ui.js"></script>
<script type="text/javascript" src="/Public/Home/js/index.js"></script>
<link rel="stylesheet" href="/Public/Home/css/jquery.ui.css">
<link rel="stylesheet" href="/Public/Home/css/index.css">
<link rel="stylesheet" href="/Public/Home/css/rl_exp.css">
<script type="text/javascript">
			var ThinkPHP = {
				"IMG" : "/Public/<?php echo MODULE_NAME;?>/img",
				"FACE" : "/Public/<?php echo MODULE_NAME;?>/face",
				"MODULE" : "/index.php/Home",
				"INDEX"	: "<?php echo U('Index/index');?>",
			};
</script>
</head>
<body>
	<div id="header">
	<div class="header_main">
		<div class="logo">微博系统</div>
		<div class="nav">
			<ul>
				<li><a href="#" class="selected">首页</a></li>
				<li><a href="#">广场</a></li>
				<li><a href="#">图片</a></li>
				<li><a href="#">找人</a></li>				
			</ul>
		</div>
		<div class="person">
			<ul>
				<li><a href="#">juedi</a></li>
				<li class="app">消息
					<dl class="list">
						<dd><a href="#">@到我的</a></dd>
						<dd><a href="#">收到的评论</a></dd>
						<dd><a href="#">发出的评论</a></dd>
						<dd><a href="#">我的私信</a></dd>
						<dd><a href="#">系统消息</a></dd>
						<dd><a href="#" class="line">发私信>></a></dd>
					</dl>
				</li>
				<li class="app">账号
					<dl class="list">
						<dd><a href="#">个人设置</a></dd>
						<dd><a href="#">排行榜</a></dd>
						<dd><a href="#">申请认证</a></dd>
						<dd><a href="<?php echo U('User/logout');?>" class="line">退出</a></dd>
					</dl>
				</li>	
			</ul>
		</div>
		<div class="search">
			<form method="post" action="">
				<input type="text" id="search" placeholder="请输入关键字">
				<a href="javascript:void(0)"></a>
			</form>
		</div>
	</div>
</div>
	<div id="main">
	
	<div class="main_left">
		<div class="weibo_form">
			<span class="left">和大家分享一点儿新鲜事儿吧？</span>
			<span class="right weibo_num">可以输入<strong>140</strong>个字符</span>
			<textarea class="weibo_text" id="rl_exp_input"></textarea>
			<a href="javascript:void(0);" class="weibo_face" id="rl_exp_btn">表情</a>
			<div class="rl_exp" id="rl_bq" style="display:none;">
				<ul class="rl_exp_tab clearfix">
					<li><a href="javascript:void(0);" class="selected">默认</a></li>
					<li><a href="javascript:void(0);">拜年</a></li>
					<li><a href="javascript:void(0);">浪小花</a></li>
					<li><a href="javascript:void(0);">暴走漫画</a></li>
				</ul>
				<ul class="rl_exp_main clearfix rl_selected"></ul>
				<ul class="rl_exp_main clearfix" style="display:none;"></ul>
				<ul class="rl_exp_main clearfix" style="display:none;"></ul>
				<ul class="rl_exp_main clearfix" style="display:none;"></ul>
				<a href="javascript:void(0);" class="close">×</a>
			</div>
			<input class="weibo_button" type="submit" value="提交">
			
		</div>
	</div>
	<div class="main_right">
		right
	</div>

</div>
	<div id="error">....</div>
<div id="loading">....</div>
<div id="footer">
	<div class="footer_left">&copy; 2014 juedi.com All Rights Reserved.</div>
	<div class="footer_right">Powered By ThinkPHP.</div>
</div>
</body>
</html>