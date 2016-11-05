<?php
namespace Home\Controller;
use Think\Controller;

class HomeController extends Controller {
	protected function login() {
		//处理自动登录，当cookie存在且session不存在的情况下，生成session
		if (!is_null(cookie('auto')) && !session('?user_auth')) {
			
			$username = encryption(cookie('auto'), 1);
			$map['username'] = $username;
			
			$db = D('user');
			$user = $db->field('id, username, last_login, last_ip')->where($map)->find();
			
			//登陆信息写入SESSION
			$auth = array(
				'id'			=> $user['id'],
				'username'		=> $user['username'],
				'last_login'	=> $user['last_login'],
				'last_ip'		=> $user['last_ip'],
			);
			
			session('user_auth', $auth);
		}
		
		//判断session是否存在
		if (session('?user_auth')) {
			return 1;
		} else {
		    $this->redirect('Login/index');		//redirect方法自带U方法
		}
	}
}