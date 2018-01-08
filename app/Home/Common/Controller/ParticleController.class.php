<?php

namespace Home\Common\Controller;

use Home\Common\Controller\PpublicController;

class ParticleController extends PpublicController {
	
	// 装入……
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
		//处理标签
		$this->insert_tag($_POST ['tag']);
		$d ['Atitle'] = $_POST ['atitle'];
		$d ['Acont'] = $_POST ['acont'];
		$d ['Acont_top'] = $_POST ['acont_top'];
		$d ['Fid'] = $_POST ['fid'];
		$d ['isshow'] = $_POST ['isshow'];
		$d ['Adate'] = date ( "Ymd" );
		$d ['zhuanti'] = $_POST ['zhuanti'];
		$d ['photo'] = $_POST ['photo'];
		$d ['tag'] = $_POST ['tag'];
		$c = M ( "article" )->where ( "Atitle='" . $_POST ['atitle'] . "'" )->count ();
		if ($c > 1) {
			$this->write_log ( session ( 'uname' ), '被无情拒绝了', '试图创建一个已经存在的文章' );
			echo "rename";
		} else {
			if ($id != '0') {
				$resu = M ( "article" )->where ( 'Id=' . $id )->save ( $d );
			} else {
				$resu = M ( "article" )->add ( $d );
			}
			if ($resu != false) {
				$this->write_log ( session ( 'uname' ), '干得漂亮！', '成功的编辑/创建了一篇文章' );
				echo 'ok';
			} else {
				$this->write_log ( session ( 'uname' ), '手法欠妥', '在试图创建/编辑文章的时候发生错误' );
				echo 'err';
			}
		}
	}
	
	/**
	 * 列表
	 */
	public function list_article() {
		$s = $_POST ['s'];
		$sea = $_POST ['sea'];
		$num = $this->get_conf_byname ( 'sh1_page_listnum1' );
		if ($num == false) {
			$num = 10;
		}
		if ($sea == '' || $sea == '0') {
			$d = M ( 'article' )->limit ( $s, intval ( $num ) )->order ( 'id desc' )->select ();
		} else {
			$d = M ( 'article' )->where ( 'fid=' . $sea )->limit ( $s, intval ( $num ) )->order ( 'id desc' )->select ();
		}
		
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
			$this->write_log ( session ( 'uname' ), '从坚固的长城上成功的取下一块砖', '成功删除一篇文章' );
			echo 'ok';
		} else {
			$this->write_log ( session ( 'uname' ), '手法欠妥', '试图删除一篇文章，但失败了' );
			echo 'err';
		}
	}
}


