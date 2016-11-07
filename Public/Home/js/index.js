$(function() {
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
});