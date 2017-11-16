<?php

namespace Common\Controller;

use Common\Controller\PpublicController;

class PusermodelController extends PpublicController {
    //
    public function _initialize() {
        $v = $this->page_chk_login ();
        $this->page_vals ();
        $this->page_valcount ();
    }
}
