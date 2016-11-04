<?php
namespace Home\Controller;

class LoginController extends HomeController {
	public function index() {
		$this->display();
	}
	
	public function verify() {
		$verify = new \Think\Verify();
		$verify->entry(1);
	}
}