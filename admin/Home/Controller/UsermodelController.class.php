<?php

namespace Home\Controller;

use Common\Controller\PusermodelController;

class UsermodelController extends PusermodelController {
    public $cname="模块实例的使用与编辑";
	/**
	 * 自定义模块
	 */
    public function index() {
        $this->display();
	}
}