<?php
namespace Home\Controller;
use Think\Controller;

class HomeController extends Controller {
	protected function login() {
		if (session('?user_auth')) {
			return 1;
		} else {
			$this->redirect('Login/index');		//redirect方法自带U方法
		}
	}
}