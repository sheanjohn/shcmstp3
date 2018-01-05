<?php

namespace Home\Common\Controller;

use Home\Common\Controller\PpublicController;

class PaliapiController extends PpublicController {
	// 装入……
	public function _initialize() {
		$this->page_chk_login ();
		$this->page_vals ();
		$this->page_valcount ();
	}
	/**
	 * 更新
	 */
	public function save_api() {
		$id = $_POST ['id'];
		$d ['apiname'] = $_POST ['apiname'];
		$d ['appcode'] = $_POST ['appcode'];
		$d ['isshow'] = $_POST ['isshow'];
		$d ['apihost'] = $_POST ['apihost'];
		$d ['apipath'] = $_POST ['apipath'];
		$d ['apimethod'] = $_POST ['apimethod'];
		$d ['apiquerys'] = $_POST ['apiquerys'];
		$d ['apibodys'] = $_POST ['apibodys'];
		
		$c = M ( "aliapi" )->where ( "apiname='" . $_POST ['apiname'] . "'" )->count ();
		if ($c > 1) {
			$this->write_log ( session ( 'uname' ), '被无情拒绝了', '试图导入一个已经存在的API产品' );
			echo "rename";
		} else {
			if ($id != '0') {
				$resu = M ( "aliapi" )->where ( 'id=' . $id )->save ( $d );
			} else {
				$resu = M ( "aliapi" )->add ( $d );
			}
			if ($resu != false) {
				$this->write_log ( session ( 'uname' ), '干得漂亮！', '成功的编辑/导入了一个阿里API' );
				echo 'ok';
			} else {
				$this->write_log ( session ( 'uname' ), '手法欠妥', '在试图导入/编辑阿里API的时候发生错误' );
				echo 'err';
			}
		}
	}
		/**
	 * api列表
	 */
	public function list_api(){
		$s = $_POST ['s'];
		$sea = $_POST ['sea'];
		$num = $this->get_conf_byname ( 'sh1_page_listnum1' );
		if ($num == false) {
			$num = 10;
		}
		$d = M ( 'aliapi' )->limit ( $s, intval ( $num ) )->order ( 'id desc' )->select ();
		
		
		$this->ajaxReturn ( $d, 'JSON' );
	}/**
	* 读取
	*/
	public function load_api() {
		$id = $_POST ['id'];
		$d = M ( 'aliapi' )->where ( 'id=' . $id )->find ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	/**
	 * 删除
	 */
	public function del_api() {
		$id = $_POST ['id'];
		$d = M ( 'aliapi' )->where ( 'id=' . $id )->delete ();
		if ($d != 0 && $d != false) {
			$this->write_log ( session ( 'uname' ), '从坚固的长城上成功的取下一块砖', '成功删除一个阿里API产品' );
			echo 'ok';
		} else {
			$this->write_log ( session ( 'uname' ), '手法欠妥', '试图删除一个阿里API产品，但失败了' );
			echo 'err';
		}
	}
}