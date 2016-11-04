<?php
namespace Home\Controller;

class IndexController extends HomeController {
    public function index() {
		if ($this->login()) {
			echo "Login successfully";
		}
	}
}