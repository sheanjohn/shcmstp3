<?php

namespace Common\Controller;

use Common\Controller\PpublicController;

class PpinpaiController extends PpublicController {
	
	//
	public function _initialize() {
		$v = $this->page_chk_login ();
		$this->page_vals ();
		$this->page_valcount ();
	}
	/**
	 * 创建新品牌（编辑和新建）
	 */
	public function save_pinpai() {
		$id = $_POST ['id'];
		$pinpaititle = $_POST ['pinpaititle'];
		$logo = $_POST ['logo'];
		$d ['Pinpaititle'] = $pinpaititle;
		$d ['Logo'] = $logo;
		$d ['fid'] = $_POST ['fid'];
		$d ['pcont'] = $_POST ['pcont'];
		$c = M ( "pinpai" )->where ( "Pinpaititle='" . $_POST ['pinpaititle'] . "'" )->count ();
		if ($c > 0 && $id == '0') {
			echo "rename";
		} else {
			if ($id != '0') {
				$resu = M ( "pinpai" )->where ( 'id=' . $id )->save ( $d );
			} else {
				$resu = M ( "pinpai" )->add ( $d );
			}
			if ($resu != false) {
				echo 'ok';
			} else {
				echo 'err';
			}
		}
	}
	
	/**
	 * 品牌列表
	 */
	public function list_pinpai() {
		$s = $_POST ['s'];
		$num = $this->get_conf_byname ( 'sh1_page_listnum1' );
		if ($num == false) {
			$num = 10;
		}
		$d = M ( 'pinpai' )->limit ( $s, intval ( $num ) )->select ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	
	/**
	 * 读取一个品牌用于编辑
	 */
	public function load_pinpai() {
		$id = $_POST ['id'];
		$d = M ( 'pinpai' )->where ( 'id=' . $id )->find ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	
	/**
	 * 删除一个品牌
	 */
	public function del_pinpai() {
		$id = $_POST ['id'];
		$d = M ( 'pinpai' )->where ( 'id=' . $id )->delete ();
		if ($d != 0 && $d != false) {
			echo 'ok';
		} else {
			echo 'err';
		}
	}
}


