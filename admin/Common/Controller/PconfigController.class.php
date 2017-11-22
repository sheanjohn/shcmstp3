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
		if ($c >1) {
		    $this->write_log(session('uname'),'被无情拒绝了','试图创建一个已经存在的参数');
			echo "rename";
		} else {
		    if ($id != '0') {
		        $this->write_log(session('uname'),'干得漂亮！','成功的编辑/创建了一条参数');
				$resu = M ( "config" )->where ( 'id=' . $id )->save ( $d );
		    } else {
		        $this->write_log(session('uname'),'手法欠妥','在试图创建/编辑参数的时候发生错误');
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
		    $this->write_log(session('uname'),'从坚固的长城上成功的取下一块砖','成功删除一条参数');
			echo 'ok';
		} else {
		    $this->write_log(session('uname'),'手法欠妥','试图删除一条参数，但失败了');
			echo 'err';
		}
	}
}


