<?php

namespace Home\Controller;

use Home\Common\Controller\PmessageController;

class MessageController extends PmessageController {
	public $cname = "站内信、消息管理";
	/**
	 * 首页
	 */
	public function index() {
		$this->display ();
	}
}