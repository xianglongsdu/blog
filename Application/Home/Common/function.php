<?php
function check_verify($code, $id=1) {
	$verify = new \Think\Verify();
	$verify->reset = false;
	
	//return $verify->check($code, $id);
	return true;
}

//COOKIE加解密，0加密，1解密
function encryption($username, $type = 0) {
	$key = sha1(C('COOKIE_KEY'));
	
	if (!$type) {
		$username = base64_encode($username ^ $key);
	} else {
		$username = base64_decode($username) ^ $key;
	}
	
	return $username;	
}