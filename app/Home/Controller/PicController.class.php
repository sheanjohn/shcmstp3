<?php

namespace Home\Controller;

use Home\Common\Controller\PpicController;

class PicController extends PpicController {
	public $cname = "图库管理";
	/**
	 * 图库首页
	 */
	public function index() {
		$this->display ();
	}
	
	/**
	 * 图库图片列表
	 */
	public function items() {
		$this->display ();
	}
}