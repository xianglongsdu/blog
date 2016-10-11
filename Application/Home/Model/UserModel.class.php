<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model {
	
	protected $_auto = array(
			array("password", "sha1", self::MODEL_BOTH, "function"),
			array("create", "time", self::MODEL_INSERT, "function"),
		);
		
	//注册一个用户
	public function register($username, $password, $email) {
		$data = array(
			'username' => $username,
			'password' => sha1($password),
			'email'	   => $email,
			'create'   => time(),
		);
		
		if ($this->create($data)) {
			$uid = $this->add($data);
			return $uid? $uid : 0;
		}
	}
}