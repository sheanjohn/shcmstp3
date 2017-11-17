<?php

namespace Common\Controller;

use Common\Controller\PpublicController;

class PmodelController extends PpublicController {
	
	//
	public function _initialize() {
		$v = $this->page_chk_login ();
		$this->page_vals ();
		$this->page_valcount ();
	}
	
	//==================模块部分
	
	/**
	 * 更新
	 */
	public function save_model() {
	    $id = $_POST ['id'];
	    $d ['mname'] = $_POST ['mname'];
	    $d ['mcid'] = $_POST ['mcid'];
	    $d ['isshow'] = $_POST ['isshow'];
	    $c = M ( "model" )->where ( "mname='" . $_POST ['mname'] . "'" )->count ();
	    if ($c > 0 && $id == '0') {
	        echo "rename";
	    } else {
	        if ($id != '0') {
	            $resu = M ( "model" )->where ( 'id=' . $id )->save ( $d );
	        } else {
	            $resu = M ( "model" )->add ( $d );
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
	public function list_model() {
	    $s = $_POST ['s'];
	    $num = $this->get_conf_byname ( 'sh1_page_listnum1' );
	    if ($num == false) {
	        $num = 10;
	    }
	    $d = M ( 'model' )->limit ( $s, intval ( $num ) )->select ();
	    $this->ajaxReturn ( $d, 'JSON' );
	}
	/**
	 * 读取
	 */
	public function load_model() {
	    $id = $_POST ['id'];
	    $d = M ( 'model' )->where ( 'id=' . $id )->find ();
	    $this->ajaxReturn ( $d, 'JSON' );
	}
	/**
	 * 删除
	 */
	public function del_model() {
	    $id = $_POST ['id'];
	    $d = M ( 'model' )->where ( 'id=' . $id )->delete ();
	    if ($d != 0 && $d != false) {
	        $dd=M('model_items')->where('model_id='.$id)->delete();
	        echo 'ok';
	    } else {
	        echo 'err';
	    }
	}
	
	
	//==================控件部分
	
	/**
	 * 更新
	 */
	public function save_ctrl() {
	    $id = $_POST ['id'];
	    $d ['cname'] = $_POST ['cname'];
	    $d ['cval'] = $_POST ['cval'];
	    $d ['ccnt'] = $_POST ['ccnt'];
	    $d ['clen'] = $_POST ['clen'];
	    $d ['ccond'] = $_POST ['ccond'];
	    $d ['cloc'] = $_POST ['cloc'];
	    $d ['ctype'] = $_POST ['ctype'];
	    $d ['cinfo'] = $_POST ['cinfo'];
	    $d ['useor'] = $_POST ['useor'];
	    $d ['upic'] = $_POST ['upic'];
	   
	        if ($id != '0') {
	            $resu = M ( "model_ctrls" )->where ( 'id=' . $id )->save ( $d );
	        } else {
	            $resu = M ( "model_ctrls" )->add ( $d );
	        }
	        if ($resu != false) {
	            echo 'ok';
	        } else {
	            echo 'err';
	        }
	}
	
	/**
	 * 列表
	 */
	public function list_ctrl() {
	    $s = $_POST ['s'];
	    $num = $this->get_conf_byname ( 'sh1_page_listnum1' );
	    if ($num == false) {
	        $num = 10;
	    }
	    $d = M ( 'model_ctrls' )->limit ( $s, intval ( $num ) )->order('id desc')->select ();
	    $this->ajaxReturn ( $d, 'JSON' );
	}
	/**
	 * 读取
	 */
	public function load_ctrl() {
	    $id = $_POST ['id'];
	    $d = M ( 'model_ctrls' )->where ( 'id=' . $id )->find ();
	    $this->ajaxReturn ( $d, 'JSON' );
	}
	/**
	 * 删除
	 */
	public function del_ctrl() {
	    $id = $_POST ['id'];
	    $fm_items=M('model_items')->where('ctrl_id='.$id)->count();
	    $fm_model=M('model')->where("mcid like '%".$id."%'")->count();
	    if($fm_items > 0 || $fm_model >0){
	        echo 'hasuse';
	    }else{
    	    $d = M ( 'model_ctrls' )->where ( 'id=' . $id )->delete ();
    	    if ($d != 0 && $d != false) {
    	        echo 'ok';
    	    } else {
    	        echo 'err';
    	    }
	    }
	}
	
}


