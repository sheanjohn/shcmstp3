<?php

namespace Home\Model;

use Home\Model\BaseModel;

class ManagersModel extends BaseModel {
	protected $tablePrefix = '';
	
	/**
	 * 创建一个新的管理
	 */
	public function addnewmanager() {
		$d ['uname'] = 'admin';
		$d ['upswd'] = md5 ( 'admin' );
		$resu = $this->add_data ( $d );
		echo $resu;
	}
	
	/**
	 * 管理员登录
	 */
	public function mgr_login($uname, $upswd) {
		$resu = $this->where ( "uname='" . $uname . "' and upswd='" . $upswd . "'" )->getField ( 'uname' );
		return $resu;
	}
	/**
	 * 登录
	 */
	public function mgr_login1($uname, $upswd) {
		$r = $this->where ( "uname='" . $uname . "' and upswd='" . $upswd . "'" )->find ();
		if ($r != null && $r != false && $r != 0) {
			return $r;
		} else {
			return false;
		}
	}
}
?>