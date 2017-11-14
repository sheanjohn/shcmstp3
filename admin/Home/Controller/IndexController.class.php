<?php

namespace Home\Controller;

use Common\Controller\PhomeController;

class IndexController extends PhomeController {
	/**
	 * 控制台首页
	 */
	public function index() {
		$this->display ();
	}
	/**
	 * 登录页
	 */
	public function login() {
		$this->display ();
	}
}