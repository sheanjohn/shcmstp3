<?php

namespace Home\Controller;

use Common\Controller\PusersController;

class UsersController extends PusersController {
	/**
	 * 会员首页
	 */
	public function index() {
		// $this->add_user1();
		$this->display ();
	}
}