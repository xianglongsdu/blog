<?php
namespace Home\Controller;

class LoginController extends HomeController {
	public function index() {
		if (!session('?user_auth')) {
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