<?php

namespace Home\Common\Controller;

use Home\Common\Controller\PpublicController;

class PtagsController extends PpublicController {
	
	//
	public function _initialize() {
		$v = $this->page_chk_login ();
		$this->page_vals ();
		$this->page_valcount ();
	}
	
	/**
	 * 保存
	 */
	public function save_tag() {
		$id = $_POST ['id'];
		$d ['tagname'] = $_POST ['tagname'];
		$d ['isshow'] = $_POST ['isshow'];
		$c = M ( "tags" )->where ( "tagname='" . $_POST ['tagname'] . "'" )->count ();
		if ($c > 1) {
			$this->write_log ( session ( 'uname' ), '被无情拒绝了', '试图创建一个已经存在的标签' );
			echo "rename";
		} else {
			if ($id != '0') {
				$resu = M ( "tags" )->where ( 'id=' . $id )->save ( $d );
			} else {
				$resu = M ( "tags" )->add ( $d );
			}
			if ($resu != false) {
				$this->write_log ( session ( 'uname' ), '干得漂亮！', '成功的编辑/创建了一个标签' );
				echo 'ok';
			} else {
				$this->write_log ( session ( 'uname' ), '手法欠妥', '在试图创建/编辑标签的时候发生错误' );
				echo 'err';
			}
		}
	}
	
	/**
	 * 列表
	 */
	public function list_tag() {
		$s = $_POST ['s'];
		$num = $this->get_conf_byname ( 'sh1_page_listnum1' );
		if ($num == false) {
			$num = 10;
		}
		$d = M ( 'tags' )->limit ( $s, intval ( $num ) )->select ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	
	/**
	 * 读取一个
	 */
	public function load_tag() {
		$id = $_POST ['id'];
		$d = M ( 'tags' )->where ( 'id=' . $id )->find ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	
	/**
	 * 删除一个
	 */
	public function del_tag() {
		$id = $_POST ['id'];
		$d = M ( 'tags' )->where ( 'id=' . $id )->delete ();
		if ($d != 0 && $d != false) {
			$this->write_log ( session ( 'uname' ), '操作成功', '成功删除一个标签' );
			echo 'ok';
		} else {
			$this->write_log ( session ( 'uname' ), '操作失败', '试图一个标签，但失败了' );
			echo 'err';
		}
	}
}