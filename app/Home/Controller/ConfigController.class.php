<?php

namespace Home\Controller;

use Home\Common\Controller\PconfigController;

class ConfigController extends PconfigController {
	public $cname = "网站参数配置与管理";
	/**
	 * 首页
	 */
	public function index() {
		// $this->add_user1();
		$this->display ();
	}
}