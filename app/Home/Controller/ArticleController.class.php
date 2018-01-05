<?php

namespace Home\Controller;

use Home\Common\Controller\ParticleController;

class ArticleController extends ParticleController {
	public $cname = "文章管理";
	/**
	 * 文章首页
	 */
	public function index() {
		$this->cate_list_select (); // 栏目下拉列表
		$this->display ();
	}
}