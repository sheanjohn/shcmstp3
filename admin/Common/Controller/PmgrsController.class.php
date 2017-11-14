<?php

namespace Common\Controller;

use Common\Controller\PpublicController;

class PmgrsController extends PpublicController {
	
	//
	public function _initialize() {
		$v = $this->page_chk_login ();
		$this->page_vals ();
		$this->page_valcount ();
	}
	/**
	 * 管理员列表
	 */
	public function list_mgrs() {
		$s = $_POST ['s'];
		$num = $this->get_conf_byname ( 'sh1_page_listnum1' );
		if ($num == false) {
			$num = 10;
		}
		$d = M ( 'managers' )->limit ( $s, intval ( $num ) )->select ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	/**
	 * 读取一条数据
	 */
	public function load_mgrs() {
		$id = $_POST ['id'];
		$d = M ( 'managers' )->where ( 'id=' . $id )->find ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	/**
	 * 更新数据
	 */
	public function save_mgrs() {
		$id = $_POST ['id'];
		$d ['uname'] = $_POST ['uname'];
		if ($_POST ['pswd'] != '0') {
			$d ['upswd'] = md5 ( $_POST ['upswd'] );
		}
		$d ['utype'] = $_POST ['utype'];
		$c = M ( "managers" )->where ( "uname='" . $_POST ['uname'] . "'" )->count ();
		if ($c > 0 && $id == '0') {
			echo "rename";
		} else {
			if ($id != '0') {
				$resu = M ( "managers" )->where ( 'id=' . $id )->save ( $d );
			} else {
				$resu = M ( "managers" )->add ( $d );
			}
			if ($resu != false) {
				echo 'ok';
			} else {
				echo 'err';
			}
		}
	}
	/**
	 * 删除一行
	 */
	public function del_mgrs() {
		$id = $_POST ['id'];
		$d = M ( 'managers' )->where ( 'id=' . $id )->delete ();
		if ($d != 0 && $d != false) {
			echo 'ok';
		} else {
			echo 'err';
		}
	}
}


