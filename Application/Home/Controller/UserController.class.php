<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserModel;

class UserController extends Controller {
	//注册行为返回Ajax
	public function register() {
		$user = new UserModel();
		$uid = $user->register(I('username'), I('password'), I('email'));
		echo $uid;
	}
}