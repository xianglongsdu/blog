$(function() {
	//消息和账号的下拉菜单
	$('.app').hover(function(){
		$(this).css({
			background: '#444',		//注意，千万不要用分号，属性值一定加引号！！！
			color: '#666',
		}).find('.list').show();
	}, function(){
		$(this).css({
			background: '#666',		//注意，千万不要用分号，属性值一定加引号！！！
			color: '#fff',
		}).find('.list').hide();
	});
	
	//高度保持一致
	if ($('.main_left').height() > 800) {
		$('.main_right').height($('.main_left').height());
		$('#main').height($('.main_left').height());
	};
	
	//微博发布的按钮
	$('.weibo_button').button().click(function() {
		// if ($('.weibo_text').val().length == 0) {
			/* $("#error").html('请输入微博内容...').dialog('open');
			setTimeout(function() {
				$("#error").html('...').dialog('close');
				$('.weibo_text').focus();
			}, 1000);
		} else { */
			// if (weibo_num()) {
				$.ajax({
					url: ThinkPHP['MODULE'] + '/Topic/publish',
					type: 'POST',
					data: {
						allContent: $('.weibo_text').val(),
					},
					beforeSend: function() {
						$('#loading').html('微博发布中...').dialog('open');
					},
					success: function(response, status) {
						$('#loading').css('background', 'url(' + ThinkPHP['IMG'] + '/reg_success.png) no-repeat 20px 65%').html('微博发布成功...');
						setTimeout(function(){
							$('.weibo_text').val('');		//清空微博内容输入区的内容
							$('#loading').css('background', 'url(' + ThinkPHP['IMG'] + '/loading.png) no-repeat 20px 65%').html('...').dialog('close');
						}, 500);
						
					},
				});
			// }
		// }
	});

	//微博输入内容计算字个数
	$('.weibo_text').on('keyup', weibo_num);
	
	//微博输入内容得到光标计算字个数
	$('.weibo_text').on('focus', function() {
		setTimeout(weibo_num, 300);
	});
	
	function weibo_num() {
		var total = 280;
		var len = $('.weibo_text').val().length;
		var temp = 0;
		if (len > 0) {
			for (var i = 0; i < len; i++) {
				if ($('.weibo_text').val().charCodeAt(i) > 255) {
					temp += 2;
				} else {
					temp ++;
				}
			}
			
			var result = parseInt((total - temp) / 2 - 0.5);
			if (result > 0) {
				$('.weibo_num').html('您还可以输入<strong>' + result + '</strong>个字');
				return true;
			} else {
				result = -result;
				$('.weibo_num').html('您已超过了<strong>' + result + '</strong>个字');
				return false;
			}
		}
	}
	
	//error
	$("#error").dialog({
		width: 180,
		height: 40,
		modal: true,
		closeOnEscape: false,    //不允许按Escape键关闭
		resizable: false,
		autoOpen: false,
		draggable: false,
	}).parent().find('.ui-dialog-titlebar').hide();
	
	//loading
	$("#loading").dialog({
		width: 180,
		height: 40,
		modal: true,
		closeOnEscape: false,    //不允许按Escape键关闭
		resizable: false,
		autoOpen: false,
		draggable: false,
	}).parent().find('.ui-dialog-titlebar').hide();
	
	
});