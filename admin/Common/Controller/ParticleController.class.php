<?php

namespace Common\Controller;

use Common\Controller\PpublicController;

class ParticleController extends PpublicController {
	
	//装入……
	public function _initialize() {
		$this->page_chk_login ();
		$this->page_vals ();
		$this->page_valcount ();
	}
	/**
	 * 更新
	 */
	public function save_article() {
		$id = $_POST ['id'];
		$d ['Atitle'] = $_POST ['atitle'];
		$d ['Acont'] = $_POST ['acont'];
		$d ['Acont_top'] = $_POST ['acont_top'];
		$d ['Fid'] = $_POST ['fid'];
		$d ['isshow'] = $_POST ['isshow'];
		$d ['Adate'] = date ( "Ymd" );
		$d['zhuanti']=$_POST['zhuanti'];
		$c = M ( "article" )->where ( "Atitle='" . $_POST ['atitle'] . "'" )->count ();
		if ($c > 0 && $id == '0') {
			echo "rename";
		} else {
			if ($id != '0') {
				$resu = M ( "article" )->where ( 'Id=' . $id )->save ( $d );
			} else {
				$resu = M ( "article" )->add ( $d );
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
	public function list_article() {
		$s = $_POST ['s'];
		$num = $this->get_conf_byname ( 'sh1_page_listnum1' );
		if ($num == false) {
			$num = 10;
		}
		$d = M ( 'article' )->limit ( $s, intval ( $num ) )->select ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	/**
	 * 读取
	 */
	public function load_article() {
		$id = $_POST ['id'];
		$d = M ( 'article' )->where ( 'id=' . $id )->find ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	/**
	 * 删除
	 */
	public function del_article() {
		$id = $_POST ['id'];
		$d = M ( 'article' )->where ( 'Id=' . $id )->delete ();
		if ($d != 0 && $d != false) {
			echo 'ok';
		} else {
			echo 'err';
		}
	}
}


