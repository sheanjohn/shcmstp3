<?php

namespace Common\Controller;

use Common\Controller\PpublicController;

class PmgrsController extends PpublicController {
	
	//
	public function _initialize() {
		$v = $this->page_chk_login ();
		$this->page_vals ();
		$this->page_valcount ();
	}
	/**
	 * 管理员列表
	 */
	public function list_mgrs() {
		$s = $_POST ['s'];
		$num = $this->get_conf_byname ( 'sh1_page_listnum1' );
		if ($num == false) {
			$num = 10;
		}
		$d = M ( 'managers' )->limit ( $s, intval ( $num ) )->select ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	/**
	 * 读取一条数据
	 */
	public function load_mgrs() {
		$id = $_POST ['id'];
		$d = M ( 'managers' )->where ( 'id=' . $id )->find ();
		$this->ajaxReturn ( $d, 'JSON' );
	}
	/**
	 * 更新数据
	 */
	public function save_mgrs() {
		$id = $_POST ['id'];
		$d ['uname'] = $_POST ['uname'];
		$d ['upswd'] = md5 ( $_POST ['upswd'] );
		$d ['utype'] = $_POST ['utype'];
		$c = M ( "managers" )->where ( "uname='" . $_POST ['uname'] . "'" )->count ();
		if ($c >1) {
		    $this->write_log(session('uname'),'被无情拒绝了','试图创建一个已经存在管理员账号');
			echo "rename";
		} else {
			if ($id != '0') {
				$resu = M ( "managers" )->where ( 'id=' . $id )->save ( $d );
			} else {
				$resu = M ( "managers" )->add ( $d );
			}
			if ($resu != false) {
			    $this->write_log(session('uname'),'干得漂亮！','成功的编辑/创建了一个管理员账号');
				echo 'ok';
			} else {
			    $this->write_log(session('uname'),'手法欠妥','在试图创建/编辑管理员账号的时候发生错误');
				echo 'err';
			}
		}
	}
	/**
	 * 删除一行
	 */
	public function del_mgrs() {
		$id = $_POST ['id'];
		$d = M ( 'managers' )->where ( 'id=' . $id )->delete ();
		if ($d != 0 && $d != false) {
		    $this->write_log(session('uname'),'从坚固的长城上成功的取下一块砖','成功删除一名管理员');
			echo 'ok';
		} else {
		    $this->write_log(session('uname'),'手法欠妥','试图删除一名管理员，但失败了');
			echo 'err';
		}
	}
	/**
	 * 下拉菜单，所有权限（根据所有控制器加载）
	 */
	public function list_type(){
	    $Clist=$this->getController('home');
	    foreach($Clist as $k => $v){
	        $arr[$k]['con_name']=A($v)->cname;
	        $arr[$k]['con_val']=C('UT_'.$v);
	    }
	    //Rsort($arr);
	    $this->ajaxReturn($arr);
	}
}


