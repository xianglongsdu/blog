<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserModel;

class UserController extends Controller {
	//注册行为返回Ajax
	public function register() {
		if (IS_AJAX) {
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
			sleep(3);
			$user = new UserModel();
			$uid = $user->checkField(I('username'), 'username');
			echo $uid > 0? 'true' : 'false';
		}
	}
	
	//Ajax验证数据，邮箱返回给Ajax
	public function checkEmail() {
		if (IS_AJAX) {
			$user = new UserModel();
			$uid = $user->checkField(I('email'), 'email');
			echo $uid > 0? 'true' : 'false';
		}
	}
}