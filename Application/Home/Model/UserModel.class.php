<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model {
	
	//打开批量验证功能
	//protected $patchValidate = true;
	
	//用户表自动验证
	protected $_validate = array(
		//-1, 用户名长度不合法
		array('username', '2, 20', -1, self::EXISTS_VALIDATE, 'length'),
		//-2, 密码长度不合法
	    array('password', '6, 30', -2, self::EXISTS_VALIDATE, 'length'),
		//-3, 密码和密码确认不一致
        array('repassword', 'password', -3, self::EXISTS_VALIDATE, 'confirm'),
		//-4, 邮箱格式不正确
		array('email', 'email', -4, self::EXISTS_VALIDATE),
		//-5, 用户名被占用
		array('username', '', -5, self::EXISTS_VALIDATE, 'unique', self::MODEL_INSERT),
		//-6, 邮箱被占用
		array('email', '', -6, self::EXISTS_VALIDATE, 'unique', self::MODEL_INSERT),
		//-7, 验证码错误
		array('verify', 'check_verify', -7, self::EXISTS_VALIDATE, 'function'),
	);
		
	//用户表自动完成
	protected $_auto = array(
			array("password", "sha1", self::MODEL_BOTH, "function"),
			array("create", "time", self::MODEL_INSERT, "function"),
		);
		
	
	//注册一个用户
	public function register($username, $password, $repassword, $email, $verify) {
		$data = array(
			'username'   => $username,
			'password'   => $password,
			'repassword' => $repassword,
			'email'	     => $email,
			'create'     => time(),
			'verify' 	 => $verify,
		);
		
		if ($this->create($data)) {
			$uid = $this->add($data);
			return $uid? $uid : 0;
		} else {
			return $this->getError();
		}
	}
	
	//验证占用字段
	public function checkField($field, $type) {
		$data = array();
		switch ($type) {
			case 'username':
				$data['username'] = $field;
				break;
			case 'email':
				$data['email'] = $field;
				break;
			case 'verify':
				$data['verify'] = $field;
				break;
			default:
				return 0;
		}
		
		return $this->create($data)? 1 : $this->getError();
		
	}
}