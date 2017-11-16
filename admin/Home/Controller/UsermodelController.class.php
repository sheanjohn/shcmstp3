<?php

namespace Home\Controller;

use Common\Controller\PusermodelController;

class UsermodelController extends PusermodelController {
	/**
	 * 自定义模块
	 */
    public function index() {
        $this->display();
	}
}