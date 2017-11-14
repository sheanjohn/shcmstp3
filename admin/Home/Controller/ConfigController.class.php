<?php

namespace Home\Controller;

use Common\Controller\PconfigController;

class ConfigController extends PconfigController {
	/**
	 * 首页
	 */
	public function index() {
		// $this->add_user1();
		$this->display ();
	}
}