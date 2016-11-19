<?php
namespace Home\Controller;

class TopicController extends HomeController {
	public function publish() {
		if (IS_AJAX) {
		    $topic = D('topic');
			$tip = $topic->publish(I('allContent'), session('user_auth')['id']);
			
		} else {
			$this->error('非法访问');
		}
	}
}