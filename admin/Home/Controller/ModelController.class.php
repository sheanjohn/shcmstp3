<?php

namespace Home\Controller;

use Common\Controller\PmodelController;

class ModelController extends PmodelController {
	/**
	 * 模块首页
	 */
	public function index() {
		$this->display ();
	}
}