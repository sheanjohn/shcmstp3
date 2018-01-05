<?php

namespace Home\Common\Controller;

use Home\Common\Controller\PpublicController;

class PhomeController extends PpublicController {
	
	//
	public function _initialize() {
		$v = $this->page_chk_login ();
		$this->page_vals ();
		$this->page_valcount ();
	}
}


