<?php

namespace Home\Common\Controller;

use Home\Common\Controller\PpublicController;

class PcateController extends PpublicController {
	
	//
	public function _initialize() {
		$this->page_chk_login ();
		$this->page_vals ();
		$this->page_valcount ();
	}
	/**
	 * 保存栏目数据（新建和编辑）
	 */
	public function save_cate() {
		$id = $_POST ['id'];
		$catetitle = $_POST ['catetitle'];
		$fid = $_POST ['fid'];
		$url = $_POST ['url'];
		$cont = $_POST ['cont'];
		$ismenu = $_POST ['ismenu'];
		$isshow = $_POST ['isshow'];
		$orderid = $_POST ['orderid'];
		$icon = $_POST ['icon'];
		$zhuanti = $_POST ['zhuanti'];
		$cmod = $_POST ['cmod'];
		
		$c = M ( "category" )->where ( "catetitle='" . $catetitle . "' and fid=" . $fid )->count ();
		if ($c > 1) {
			$this->write_log ( session ( 'uname' ), '被无情拒绝了', '试图创建一个已经存在的栏目' );
			echo "rename";
		} else {
			$d ['catetitle'] = $catetitle;
			$d ['fid'] = $fid;
			$d ['url'] = $url;
			$d ['cont'] = $cont;
			$d ['ismenu'] = $ismenu;
			$d ['isshow'] = $isshow;
			$d ['orderid'] = $orderid;
			$d ['icon'] = $icon;
			$d ['cmod'] = $cmod;
			if ($zhuanti != '') {
				$d ['zhuanti'] = $zhuanti;
			}
			if ($id != '0') {
				$resu = M ( "category" )->where ( 'id=' . $id )->save ( $d );
			} else {
				$resu = M ( "category" )->add ( $d );
			}
			if ($resu != false) {
				$this->write_log ( session ( 'uname' ), '干得漂亮！', '成功的编辑/创建了栏目' );
				echo 'ok';
			} else {
				$this->write_log ( session ( 'uname' ), '手法欠妥', '在试图创建/编辑栏目的时候发生错误' );
				echo 'err';
			}
		}
	}
	/**
	 * 根栏目列表
	 */
	public function list_cate() {
		$s = $_POST ['s'];
		$num = $this->get_conf_byname ( 'sh1_page_listnum1' );
		if ($num == false) {
			$num = 10;
		}
		$d = M ( 'category' )->where ( 'fid=0' )->limit ( $s, intval ( $num ) )->order ( 'orderid' )->select ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	
	/**
	 * 栏目列表，根据FID
	 */
	public function list_cate_byid() {
		$id = $_POST ['id'];
		$s = $_POST ['s'];
		$num = $this->get_conf_byname ( 'sh1_page_listnum1' );
		if ($num == false) {
			$num = 10;
		}
		$d = M ( 'category' )->where ( 'fid=' . $id )->limit ( $s, intval ( $num ) )->order ( 'orderid' )->select ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	
	/**
	 * 读取用于编辑
	 */
	public function load_cate() {
		$id = $_POST ['id'];
		$d = M ( 'category' )->where ( 'id=' . $id )->find ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	
	/**
	 * 删除一个
	 */
	public function del_cate() {
		$id = $_POST ['id'];
		$dd = M ( 'category' )->where ( 'fid=' . $id )->count ();
		if ($dd > 0) {
			$this->write_log ( session ( 'uname' ), '手法欠妥', '试图删除栏目，但失败了' );
			echo 'hassub';
		} else {
			$d = M ( 'category' )->where ( 'id=' . $id )->delete ();
			if ($d != 0 && $d != false) {
				$this->write_log ( session ( 'uname' ), '从坚固的长城上成功的取下一块砖', '成功删除栏目' );
				echo 'ok';
			} else {
				$this->write_log ( session ( 'uname' ), '手法欠妥', '试图删除栏目，但失败了' );
				echo 'err';
			}
		}
	}
	
	/**
	 * 根栏目列表，用于下拉
	 */
	public function select_list() {
		$d = M ( 'category' )->where ( 'fid=0' )->order ( 'id desc' )->select ();
		$this->assign ( 'sellist', $d );
	}
}


