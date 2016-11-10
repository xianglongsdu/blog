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
	$('.weibo_button').button();

	//微博输入内容计算字个数
	$('.weibo_text').on('keyup', weibo_num);
	
	function weibo_num() {
		var total = 280;
		var len = $(this).val().length;
		var temp = 0;
		if (len > 0) {
			for (var i = 0; i < len; i++) {
				if ($(this).val().charCodeAt(i) > 255) {
					temp += 2;
				} else {
					temp ++;
				}
			}
			
			var result = parseInt((total - temp) / 2);
			$('.weibo_num').html('您还可以输入<strong>' + result + '</strong>个字');
		}
	}
	
	
});