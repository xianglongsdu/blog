<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller {
	public function index() {
		$this->display();
	}
	
	public function verify() {
		$verify = new \Think\Verify();
		$verify->entry(1);
	}
}