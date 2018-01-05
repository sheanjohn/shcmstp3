<?php

namespace Home\Controller;

use Home\Common\Controller\PaliapiController;

class AliapiController extends PaliapiController {
	public $cname = "阿里API管理";
	/**
	 * 首页
	 */
	public function index() {
		$this->display ();
	}
}