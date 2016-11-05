<?php
namespace Home\Controller;
use Think\Controller;

class HomeController extends Controller {
	protected function login() {
		//处理自动登录，当cookie存在且session不存在的情况下，生成session
		if (!is_null(cookie('auto')) && !session('?user_auth')) {
			
			$value = explode('|', encryption(cookie('auto'), 1));
			list($username, $ip) = $value;
			if ($ip == get_client_ip())
			{
				$map['username'] = $username;
				
				$db = D('user');
				$user = $db->field('id, username, last_ip')->where($map)->find();
				
				//自动登录更新登陆信息
				$update = array(
					'id' 			=> $user['id'],
					'last_login'	=> NOW_TIME,
				);
				$db->save($update);
				
				//登陆信息写入SESSION
				$auth = array(
					'id'			=> $user['id'],
					'username'		=> $user['username'],
					'last_login'	=> NOW_TIME,
					'last_ip'		=> $user['last_ip'],
				);
				
				session('user_auth', $auth);
			}
		}
		
		//判断session是否存在
		if (session('?user_auth')) {
			return 1;
		} else {
		    $this->redirect('Login/index');		//redirect方法自带U方法
		}
	}
}