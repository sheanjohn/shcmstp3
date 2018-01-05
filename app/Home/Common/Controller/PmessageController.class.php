<?php

namespace Home\Common\Controller;

use Home\Common\Controller\PpublicController;

class PmessageController extends PpublicController {
	
	//
	public function _initialize() {
		$this->page_chk_login ();
		$this->page_vals ();
		$this->page_valcount ();
		$this->get_levelandtype ( 'sh1_user_level' );
		$this->get_levelandtype ( 'sh1_user_type' );
	}
	
	/**
	 * 列表
	 */
	public function list_msg() {
		$forsys = $_POST ['forsys']; // 条件，是列出系统消息还是普通消息
		$s = $_POST ['s'];
		$num = $this->get_conf_byname ( 'sh1_page_listnum1' );
		if ($num == false) {
			$num = 10;
		}
		if ($forsys == '1') {
			$d = M ( 'message' )->where ( 'forsys=1' )->distinct ( true )->group ( 'tit' )->limit ( $s, intval ( $num ) )->order ( 'id desc' )->select ();
		} else {
			$d = M ( 'message' )->where ( 'forsys=0' )->limit ( $s, intval ( $num ) )->order ( 'id desc' )->select ();
		}
		$this->ajaxReturn ( $d, 'JSON' );
	}
	
	/**
	 * 读取一条
	 */
	public function load_msg() {
		$id = $_POST ['id'];
		$d = M ( 'message' )->where ( 'id=' . $id )->find ();
		$this->ajaxReturn ( $d );
	}
	
	/**
	 * 给所有用户留言
	 */
	public function newsend() {
		$d ['tit'] = $_POST ['tit'];
		$d ['poster'] = session ( 'uname' );
		if ($this->guolv ( $_POST ['msg'] ) == 'yes') {
			echo 'guolv';
		} else {
			$d ['msg'] = $_POST ['msg'];
			$d ['datetime'] = $this->get_dt ();
			$d ['stat'] = 0;
			$d ['forsys'] = 1;
			
			// 用户等级
			$ulv = $_POST ['uleve'];
			// 用户类型
			$utp = $_POST ['utype'];
			
			if ($ulv == '#') {
				$ulv = '';
			} else {
				$ulv = " and uleve='" . $ulv . "' ";
			}
			if ($utp == '#') {
				$utp = '';
			} else {
				$utp = " and utype='" . $utp . "' ";
			}
			
			// echo $utp.$ulv;
			$u = M ( 'users' )->where ( "uname!='admin' " . $utp . $ulv )->Field ( 'uname' )->select ();
			
			foreach ( $u as $k => $v ) {
				$d ['user'] = $v ['uname'];
				$r [$k] ['user'] = $v ['uname'];
				$r [$k] ['resu'] = M ( 'message' )->add ( $d );
			}
			$this->ajaxReturn ( $r );
		}
	}
}