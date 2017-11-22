<?php

namespace Home\Controller;

use Common\Controller\PmgrsController;

class MgrsController extends PmgrsController {
    public $cname="管理员账户管理";
	/**
	 * 首页
	 */
	public function index() {
		$this->display ();
	}
}