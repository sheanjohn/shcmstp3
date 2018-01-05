<?php

namespace Home\Common\Controller;

use Home\Common\Controller\PpublicController;

class PlogmgrController extends PpublicController {
	
	//
	public function _initialize() {
		$v = $this->page_chk_login ();
		$this->page_vals ();
		$this->page_valcount ();
	}
	
	/**
	 * 列表
	 */
	public function list_logs() {
		$s = $_POST ['s'];
		$num = $this->get_conf_byname ( 'sh1_page_listnum1' );
		if ($num == false) {
			$num = 10;
		}
		$d = M ( 'logmgr' )->limit ( $s, intval ( $num ) )->order ( 'id desc' )->select ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	
	/**
	 * 清空
	 */
	public function clear_logs() {
		// $sql="truncate logmgr";
		$d = M ( 'logmgr' )->where ( "1<>2" )->delete ();
		if ($d != 0 && $d != false) {
			$this->write_log ( session ( 'uname' ), '成功毁灭证据', '成功清空了系统日志' );
			echo 'ok';
		} else {
			$this->write_log ( session ( 'uname' ), '手法欠妥', '试图清空系统日志，但失败了' );
			echo 'err';
		}
	}
}


