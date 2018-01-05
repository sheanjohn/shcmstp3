<?php

namespace Home\Controller;

use Home\Common\Controller\PusersController;

class UsersController extends PusersController {
	public $cname = "会员管理";
	/**
	 * 会员首页
	 */
	public function index() {
		// $this->add_user1();
		$this->display ();
	}
}