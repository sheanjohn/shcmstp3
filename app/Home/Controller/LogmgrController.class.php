<?php

namespace Home\Controller;

use Home\Common\Controller\PlogmgrController;

class LogmgrController extends PlogmgrController {
	public $cname = "系统日志";
	/**
	 * 日志首页
	 */
	public function index() {
		$this->display ();
	}
}