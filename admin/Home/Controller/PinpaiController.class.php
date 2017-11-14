<?php

namespace Home\Controller;

use Common\Controller\PpinpaiController;

class PinpaiController extends PpinpaiController {
	/**
	 * 品牌首页
	 */
	public function index() {
		$this->cate_list_select (); // 栏目下拉列表
		$this->display ();
	}
}