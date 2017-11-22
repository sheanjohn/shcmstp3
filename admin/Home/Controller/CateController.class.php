<?php

namespace Home\Controller;

use Common\Controller\PcateController;

class CateController extends PcateController {
    public $cname="网站栏目管理";
	/**
	 * 栏目首页
	 */
	public function index() {
		$this->display ();
	}
	/**
	 * 子栏目操作页面
	 */
	public function subcate() {
		$this->select_list (); // 加载下拉列表
		$this->display ();
	}
}