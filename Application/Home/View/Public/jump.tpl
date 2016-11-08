<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>{$msgTitle}</title>
	<style type="text/css">
		body {
			background: #eee;
		}
		
		.info {
			margin: 100px auto;
			padding: 200px 0 0 0;
			height: 300px;
			width: 1200px;
			background: #fafafa;
			text-align: center;
		}
		
		span {
			padding: 240px auto;
		}
		
		.text {
			display: inline-block;
			height: 38px;
			font-size: 32px;
			font-weight: bold;
			color: #000;
			text-indent: 40px;
		}
		
		.error {
			background: url(__PUBLIC__/{:MODULE_NAME}/img/jump_error.png) no-repeat left bottom;
		}
		
		.success {
			background: url(__PUBLIC__/{:MODULE_NAME}/img/jump_success.png) no-repeat left bottom;
		}
		
		.jump {
			padding: 155px 15px 0 0;
			text-align: right;
		}
	</style>
	
</head>
<body>
{$status}
<?php
if ($status) {		//注意，这里是PHP语句，所以$status不用加{}
?>
<div class="info">
	<span class="text success">{$message}!</span>
	<p class="jump">
		页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
	</p>
</div>
<?php
} else {
?>
<div class="info">
	<span class="text error">{$error}!</span>
	<p class="jump">
		页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
	</p>
</div>
<?php
}
?>

<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>


</body>
</html>