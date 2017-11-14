<?php

namespace Common\Controller;

use Common\Controller\PpublicController;

class PconfigController extends PpublicController {
	
	//
	public function _initialize() {
		$v = $this->page_chk_login ();
		$this->page_vals ();
		$this->page_valcount ();
	}
	/**
	 * 新建一行,保存一行
	 */
	public function save_conf() {
		$id = $_POST ['id'];
		$cname = $_POST ['cname'];
		$cvalue = $_POST ['cvalue'];
		$ccont = $_POST ['ccont'];
		$d ['cname'] = $cname;
		$d ['cvalue'] = $cvalue;
		$d ['ccont'] = $ccont;
		$c = M ( "config" )->where ( "cname='" . $cname . "'" )->count ();
		if ($c > 0 && $id == '0') {
			echo "rename";
		} else {
			if ($id != '0') {
				$resu = M ( "config" )->where ( 'id=' . $id )->save ( $d );
			} else {
				$resu = M ( "config" )->add ( $d );
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
	public function list_conf() {
		$s = $_POST ['s'];
		$num = $this->get_conf_byname ( 'sh1_page_listnum1' );
		if ($num == false) {
			$num = 10;
		}
		$d = M ( 'config' )->limit ( $s, intval ( $num ) )->order ( "id desc" )->select ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	
	/**
	 * 删除一个
	 */
	public function del_conf() {
		$id = $_POST ['id'];
		$d = M ( 'config' )->where ( 'id=' . $id )->delete ();
		if ($d != 0 && $d != false) {
			echo 'ok';
		} else {
			echo 'err';
		}
	}
}


