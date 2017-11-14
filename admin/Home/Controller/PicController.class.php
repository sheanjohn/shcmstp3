<?php

namespace Home\Controller;

use Common\Controller\PpicController;

class PicController extends PpicController {
	/**
	 * 图库首页
	 */
	public function index() {
		$this->Carousel_list ( 5 );
		$this->display ();
	}
	
	/**
	 * 图库图片列表
	 */
	public function items() {
		$this->display ();
	}
}