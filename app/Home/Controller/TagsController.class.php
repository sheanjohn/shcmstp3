<?php

namespace Home\Controller;

use Home\Common\Controller\PtagsController;

class TagsController extends PtagsController {
	public $cname = "标签管理";
	/**
	 * 首页
	 */
	public function index() {
		$this->display ();
	}
}