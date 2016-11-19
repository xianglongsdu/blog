<?php
namespace Home\Model;
use Think\Model;

class TopicModel extends Model {
	
	//微博自动验证
	protected $_validate = array(
		array('allcontent', '1, 280', -1, self::EXISTS_VALIDATE, 'length'),		//注意数组元素之间用逗号！！！
	);
	
	//微博自动完成
	protected $_auto = array(
		array('create', 'time', self::MODEL_INSERT, 'function'),
	);
	
	
	//发布微博
	public function publish($allContent, $uid) {
		
		//微博内容分离
		$len = mb_strlen($allContent, 'utf8');
		$content = $content_over = '';		//设置默认值
		if ($len > 255) {
			$content = mb_substr($allConent, 0, 255, 'utf8');
			$content_over = mb_substr($allContent, 255, 25, 'utf8');
		} else {
			$content = $allContent;
		}
		
		$data = array(
			'content'		=> $content,		//注意数组元素之间用逗号！！！
			'content_over'	=> $content_over,
			'ip'			=> get_client_ip(1),
			'uid'			=> $uid,
		);
		
		if ($result = $this->create($data)) {
			$uid = $this->add();
			return $uid ? $uid : 0;
		} else {
			return $this->getError();
		}
	}
}