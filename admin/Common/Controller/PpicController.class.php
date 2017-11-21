<?php

namespace Common\Controller;

use Common\Controller\PpublicController;

class PpicController extends PpublicController {
	
	//
	public function _initialize() {
		$this->page_chk_login ();
		$this->page_vals ();
		$this->page_valcount ();
	}
	/**
	 * 保存数据（新建和编辑） 图库
	 */
	public function save_pic() {
		$id = $_POST ['id'];
		$pictitle = $_POST ['pictitle'];
		
		$c = M ( "pic" )->where ( "pictitle='" . $pictitle . "'" )->count ();
		if ($c > 0 && $id == '0') {
			echo "rename";
		} else {
			$d ['pictitle'] = $pictitle;
			
			if ($id != '0') {
				$resu = M ( "pic" )->where ( 'id=' . $id )->save ( $d );
			} else {
				$resu = M ( "pic" )->add ( $d );
			}
			if ($resu != false) {
				echo 'ok';
			} else {
				echo 'err';
			}
		}
	}
	/**
	 * 列表 图库
	 */
	public function list_pic() {
		$s = $_POST ['s'];
		$num = $this->get_conf_byname ( 'sh1_page_listnum1' );
		if ($num == false) {
			$num = 10;
		}
		$d = M ( 'pic' )->limit ( $s, intval ( $num ) )->order ( 'id desc' )->select ();
		foreach ( $d as $k => $val ) {
			// 随便取一张图片，没有就算了
			$p = M ( 'pic_item' )->where ( 'picid=' . $d [$k] ['id'] )->limit ( 1 )->getField ( 'Picurl' );
			if ($p != null && $p != '') {
				$d [$k] ['pic1'] = $p;
			} else {
				$d [$k] ['pic1'] = '0';
			}
		}
		
		$this->ajaxReturn ( $d, 'JSON' );
	}
	
	/**
	 * 读取用于编辑图库
	 */
	public function load_cate() {
		$id = $_POST ['id'];
		$d = M ( 'category' )->where ( 'id=' . $id )->find ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	
	/**
	 * 删除一个图库
	 */
	public function del_pic() {
		$id = $_POST ['id'];
		$c = M ( 'pic_item' )->where ( 'picid=' . $id )->count ();
		if ($c > 0) {
			echo 'hasfiles';
		} else {
			$d = M ( 'pic' )->where ( 'Id=' . $id )->delete ();
			if ($d != 0 && $d != false) {
				echo 'ok';
			} else {
				echo 'err';
			}
		}
	}
	
	/**
	 * 读取图库标题（图库详情页用）
	 */
	public function load_pic_title() {
		$id = $_POST ['id'];
		echo M ( 'pic' )->where ( 'Id=' . $id )->getField ( 'pictitle' );
	}
	
	/**
	 * 保存数据（新建和编辑）图片
	 */
	public function save_pic_item() {
		$id = $_POST ['id'];
		$picurl = $_POST ['picurl'];
		$pictype = $_POST ['pictype'];
		$picid = $_POST ['picid'];
		
		$c = M ( "pic_item" )->where ( "Picurl='" . $picurl . "'" )->count ();
		if ($c > 0 && $id == '0') {
			echo "rename";
		} else {
			$d ['Picurl'] = $picurl;
			$d ['Pictype'] = $pictype;
			$d ['picid'] = $picid;
			
			if ($id != '0') {
				$resu = M ( "pic_item" )->where ( 'Id=' . $id )->save ( $d );
			} else {
				$resu = M ( "pic_item" )->add ( $d );
			}
			if ($resu != false) {
				echo 'ok';
			} else {
				echo 'err';
			}
		}
	}
	
	/**
	 * 图片列表
	 */
	public function list_pic_item() {
		$s = $_POST ['s'];
		$picid = $_POST ['picid'];
		$num = $this->get_conf_byname ( 'sh1_page_listnum1' );
		if ($num == false) {
			$num = 10;
		}
		$d = M ( 'pic_item' )->where ( 'picid=' . $picid )->limit ( $s, intval ( $num ) )->order ( 'id desc' )->select ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	
	/**
	 * 删除一个图片
	 */
	public function del_pic_item() {
		$id = $_POST ['id'];
		$path = M ( 'pic_item' )->where ( 'Id=' . $id )->getField ( 'Picurl' );
		$d = M ( 'pic_item' )->where ( 'Id=' . $id )->delete ();
		if ($d != 0 && $d != false) {
			if (unlink ( './' . $path )) {
				echo 'ok';
			} else {
			    echo 'delerr_' . './' . $path;
			}
		} else {
			echo 'err';
		}
	}
	
	/**
	 * 删除图片文件（取消上传）
	 */
	public function del_temp_pic() {
		$url = $_POST ['url'];
		if (unlink ( '.' . $url )) {
			echo 'ok';
		} else {
			echo 'err';
		}
	}
	
	/**
	 * 需要在控制器调用
	 * 幻灯片
	 * top显示数量
	 */
	public function Carousel_list($top) {
		$d = M ( 'pic_item' )->field ( 'Picurl,picid' )->limit ( $top )->order ( 'id desc' )->select ();
		$this->assign ( 'carousel_list', $d );
	}
}


