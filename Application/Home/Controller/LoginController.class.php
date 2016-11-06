<?php
namespace Home\Controller;

class LoginController extends HomeController {
	public function index() {
		if (!session('?user_auth')) {		//只有当session不存在时才可以看到登录界面
			$this->display();
		} else {
			$this->redirect('Index/index');
		}
		
	}
	
	public function verify() {
		$verify = new \Think\Verify();
		$verify->entry(1);
	}
}