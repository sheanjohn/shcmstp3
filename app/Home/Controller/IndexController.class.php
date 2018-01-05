<?php

namespace Home\Controller;

use Home\Common\Controller\PhomeController;

class IndexController extends PhomeController {
	public $cname = "控制台首页";
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
	
	/**
	 * git
	 */
	public function git() {
		$this->display ();
	}
}