<?php

namespace Common\Controller;

use Common\Controller\PpublicController;

class PusersController extends PpublicController {
	
	//
	public function _initialize() {
		$v = $this->page_chk_login ();
		$this->page_vals ();
		$this->page_valcount ();
		$this->get_levelandtype('sh1_user_level');
		$this->get_levelandtype('sh1_user_type');
	}
	/**
	 * 从参数表中读取两个下拉列表(等级，类型)
	 */
	public function get_levelandtype($cname){
		$d=$this->get_conf_byname($cname);
		if($d!='' && $d!=null){
			$d=explode(',',$d);
		}
		$this->assign($cname,$d);
	}
	/**
	 * 创建一个测试用户
	 */
	public function add_user1() {
		$d ['uname'] = "shean";
		$d ['upswd'] = md5 ( 'zhangchen' );
		$d ['Shengri'] = '19840803';
		$d ['Realname'] = "真实姓名";
		M ( 'users' )->add ( $d );
	}
	/**
	 * 保存一行
	 */
	public function save_users() {
		$id = $_POST ['id'];
		$d['uname']=$_POST['uname'];
		$d['uType']=$_POST['utype'];
		$d['uleve']=$_POST['uleve'];
		$d['Shengri']=$_POST['shengri'];
			if ($id != '0' && $id!=null) {
				$resu = M ( "users" )->where ( 'id=' . $id )->save ( $d );
			} else {
				$resu=false;
			}
			if ($resu != false) {
			    $this->write_log(session('uname'),'成功改造人……','成功编辑了一名会员的参数');
				echo 'ok';
			} else {
			    $this->write_log(session('uname'),'改造失败','试图修改一名会员的参数，但失败了');
				echo 'err';
			}
	}
	
	/**
	 * 列表
	 */
	public function list_users() {
		$s = $_POST ['s'];
		$key=$_POST['key'];
		$num = $this->get_conf_byname ( 'sh1_page_listnum1' );
		if ($num == false) {
			$num = 10;
		}
		if($key=='null'){
			$d = M ( 'users' )->limit ( $s, intval ( $num ) )->select ();
		}else{
			$d = M ( 'users' )->where("uname='".$key."'")->limit ( $s, intval ( $num ) )->select ();
		}
		$this->ajaxReturn ( $d, 'JSON' );
	}
	
	/**
	 * 读取一个
	 */
	public function load_users() {
		$id = $_POST ['id'];
		$d = M ( 'users' )->where ( 'id=' . $id )->find ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	
	/**
	 * 删除一个
	 */
	public function del_users() {
		$id = $_POST ['id'];
		$d = M ( 'users' )->where ( 'id=' . $id )->delete ();
		if ($d != 0 && $d != false) {
		    $this->write_log(session('uname'),'让一名会员在人间蒸发了','成功删除一名会员');
			echo 'ok';
		} else {
		    $this->write_log(session('uname'),'需要职业杀手……','试图删除一名会员，但失败了');
			echo 'err';
		}
	}
}


