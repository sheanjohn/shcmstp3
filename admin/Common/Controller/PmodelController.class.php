<?php

namespace Common\Controller;

use Common\Controller\PpublicController;

class PmodelController extends PpublicController {
	
	//
	public function _initialize() {
		$v = $this->page_chk_login ();
		$this->page_vals ();
		$this->page_valcount ();
	}
	
	/**
	 * 更新
	 */
	public function save_model() {
	    $id = $_POST ['id'];
	    $d ['mname'] = $_POST ['mname'];
	    $d ['mcid'] = $_POST ['mcid'];
	    $d ['isshow'] = $_POST ['isshow'];
	    $c = M ( "model" )->where ( "mname='" . $_POST ['mname'] . "'" )->count ();
	    if ($c > 0 && $id == '0') {
	        echo "rename";
	    } else {
	        if ($id != '0') {
	            $resu = M ( "model" )->where ( 'id=' . $id )->save ( $d );
	        } else {
	            $resu = M ( "model" )->add ( $d );
	        }
	        if ($resu != false) {
	            echo 'ok';
	        } else {
	            echo 'err';
	        }
	    }
	}
	
	/**
	 * 列表
	 */
	public function list_model() {
	    $s = $_POST ['s'];
	    $num = $this->get_conf_byname ( 'sh1_page_listnum1' );
	    if ($num == false) {
	        $num = 10;
	    }
	    $d = M ( 'model' )->limit ( $s, intval ( $num ) )->select ();
	    $this->ajaxReturn ( $d, 'JSON' );
	}
	/**
	 * 读取
	 */
	public function load_model() {
	    $id = $_POST ['id'];
	    $d = M ( 'model' )->where ( 'id=' . $id )->find ();
	    $this->ajaxReturn ( $d, 'JSON' );
	}
	/**
	 * 删除
	 */
	public function del_model() {
	    $id = $_POST ['id'];
	    $d = M ( 'model' )->where ( 'id=' . $id )->delete ();
	    if ($d != 0 && $d != false) {
	        echo 'ok';
	    } else {
	        echo 'err';
	    }
	}
	
}


