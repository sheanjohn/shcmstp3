<?php

namespace Home\Controller;

use Common\Controller\ParticleController;

class ArticleController extends ParticleController {
	/**
	 * 文章首页
	 */
	public function index() {
		$this->cate_list_select (); // 栏目下拉列表
		$this->display ();
	}
}