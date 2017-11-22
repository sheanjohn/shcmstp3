<?php

namespace Home\Controller;

use Common\Controller\PmodelController;

class ModelController extends PmodelController {
    public $cname="模块的管理与编辑";
	/**
	 * 模块首页
	 */
	public function index() {
		$this->display ();
	}
}