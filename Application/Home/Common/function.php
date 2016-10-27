<?php
function check_verify($code, $id=1) {
	$verify = new \Think\Verify();
	$verify->reset = false;
	
	return $verify->check($code, $id);
}