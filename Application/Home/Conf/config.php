<?php
return array(
	'TMPL_PARSE_STRING'	=> array(
		'__CSS__'	=>	__ROOT__.'/Public/'.MODULE_NAME.'/css',
		'__JS__'	=>	__ROOT__.'/Public/'.MODULE_NAME.'/js',
		'__IMG__'	=>	__ROOT__.'/Public/'.MODULE_NAME.'/img',
	),
	
	//cookie秘钥
	'COOKIE_KEY'			=> 'www.juedi.com',
	
	//错误跳转模板
	'TMPL_ACTION_ERROR'		=> 'Public/jump',
	
	//成功跳转模板
	'TMPL_ACTION_SUCCESS'	=> 'Public/jump',
	
);