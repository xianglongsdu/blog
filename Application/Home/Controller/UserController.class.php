<?php
namespace Home\Controller;
use Home\Model\UserModel;

class UserController extends HomeController {
	//注册行为返回Ajax
	public function register() {
		if (IS_AJAX) {
			sleep(5);
			$user = new UserModel();
			$uid = $user->register(I('username'), I('password'), I('repassword'), I('email'));
			echo $uid;
		} else {
			$this->error("非法访问", U('Home/Login','',''), 3);
		}
	}
	
	//Ajax验证数据，账号返回给Ajax
	public function checkUserName() {
		if (IS_AJAX) {
			$user = new UserModel();
			$uid = $user->checkField(I('username'), 'username');
			echo $uid > 0? 'true' : 'false';
		} else {
			$this->error('非法访问');
		}
	}
	
	//Ajax验证数据，邮箱返回给Ajax
	public function checkEmail() {
		if (IS_AJAX) {
			$user = new UserModel();
			$uid = $user->checkField(I('email'), 'email');
			echo $uid > 0? 'true' : 'false';
		} else {
			$this->error('非法访问');
		}
	}
	
	//Ajax验证数据，验证码返回给Ajax
	public function checKVerify() {
		if (IS_AJAX) {
			$user = new UserModel();
			$uid = $user->checkField(I('verify'), 'verify');
			echo $uid > 0? 'true' : 'false';
		} else {
			$this->error('非法访问');
		}
	}
	
	//Ajax验证数据，账号返回给Ajax
	public function login() {
		if (IS_AJAX) {
			sleep(3);
			$user = new UserModel();
			$uid = $user->login(I('username'), I('password'), I('auto'));
			echo $uid;
		} else {
			$this->error('非法访问');
		}
	}
}