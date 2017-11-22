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
		if ($c > 1) {
		    $this->write_log(session('uname'),'笨到家了','试图创建一个已经存在的图片库，这当然行不通');
			echo "rename";
		} else {
			$d ['pictitle'] = $pictitle;
			
			if ($id != '0') {
				$resu = M ( "pic" )->where ( 'id=' . $id )->save ( $d );
			} else {
				$resu = M ( "pic" )->add ( $d );
			}
			if ($resu != false) {
			    $this->write_log(session('uname'),'干得漂亮！','成功的编辑/创建了一个图片库');
				echo 'ok';
			} else {
			    $this->write_log(session('uname'),'手法欠妥','试图创建一个图片库，但失败了');
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
		    $this->write_log(session('uname'),'笨的可以','试图删除一个含有图片的图库，结果当然失败了');
			echo 'hasfiles';
		} else {
			$d = M ( 'pic' )->where ( 'Id=' . $id )->delete ();
			if ($d != 0 && $d != false) {
			    $this->write_log(session('uname'),'从坚固的长城上成功的取下一块砖','成功删除个图片库');
				echo 'ok';
			} else {
			    $this->write_log(session('uname'),'手法欠妥','试图删除一个图片库，但失败了');
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
		if ($c > 1) {
		    $this->write_log(session('uname'),'被无情拒绝了','试图上传一张已经存在的图片');
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
			    $this->write_log(session('uname'),'干得漂亮！','成功的编辑/上传了一张图片');
				echo 'ok';
			} else {
			    $this->write_log(session('uname'),'手法欠妥','在试图创建/上传图片的时候发生错误');
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
		        $this->write_log(session('uname'),'从坚固的长城上成功的取下一块砖','成功删除一张图片');
				echo 'ok';
			} else {
			    $this->write_log(session('uname'),'手法欠妥','试图删除一张图片，但失败了');
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
}


