$(function() {
	$('.app').hover(function(){
		$(this).css({
			background: '#444',		//ע�⣬ǧ��Ҫ�÷ֺţ�����ֵһ�������ţ�����
			color: '#666',
		}).find('.list').show();
	}, function(){
		$(this).css({
			background: '#666',		//ע�⣬ǧ��Ҫ�÷ֺţ�����ֵһ�������ţ�����
			color: '#fff',
		}).find('.list').hide();
	});
});