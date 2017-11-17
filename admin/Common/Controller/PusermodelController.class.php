<?php

namespace Common\Controller;

use Common\Controller\PpublicController;

class PusermodelController extends PpublicController {
    //
    public function _initialize() {
        $v = $this->page_chk_login ();
        $this->page_vals ();
        $this->page_valcount ();
    }
    
    /**
     * 猎取(加载)模块,合并加入模块使用的控件
     */
    public function load_model(){
        $id=$_POST['id'];
        $resu=M('model')->where('id='.$id.' and isshow=1')->order('id desc')->find();
        if($resu!=false){
            $mcid=explode(',',$resu['mcid']);
            foreach($mcid as $k => $v){
                $ctrl=M('model_ctrls')->where('id='.$v)->order('id desc')->find();
                $resu['ctrls'][$k]=$ctrl;
            }
            $this->ajaxReturn($resu);
        }else{
            echo 'err';
        }
    }
}
