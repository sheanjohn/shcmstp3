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
            //dump($resu);
            $this->ajaxReturn($resu);
        }else{
            echo 'err';
        }
    }
    
    /**
     * 列表
     */
    public function list_model() {
        $s = $_POST ['s'];
        $modelid=$_POST['modelid'];
        $num = $this->get_conf_byname ( 'sh1_page_listnum1' );
        if ($num == false) {
            $num = 10;
        }
        $d1=M('model_items')->where('model_id='.$modelid)->distinct(true)->field('sessc,ctrl_id')->select();
        
       
        foreach($d1 as $k => $v){            
            $d2[$k]=M('model_items')->field('id,strval,ctrl_id')->where("sessc='".$v['sessc']."' and ctrl_id=".$v['ctrl_id'])->limit($s,intval($num))->order("id desc")->select();
            $cui=M('model_ctrls')->where('id='.$v['ctrl_id'])->getField('cui');
            if($cui=='1' || $cui=='3' || $cui=='4'){    
            }else{
                
                $d3[$k]['list']=$d2[$k];
            }
        }
        $this->ajaxReturn ( $d3, 'JSON' );
        //dump($d2);
    }
    
    /**
     * 保存
     */
    public function save_model(){
        $val=$_POST['val'];
        $id=$_POST['id'];
        $mid=$_POST['mid'];
        $d['strval']=$val;
        $d['ctrl_id']=$id;
        $sessc=$_POST['sessc'];
        $isedit=$_POST['isedit'];
        if($isedit=='0'){
            $d['model_id']=$mid;
            $d['sessc']=$sessc;
            $resu=M('model_items')->add($d);
            if($resu!=false){
                echo 'ok';
            }else{
                echo 'err1';
            }
        }else{
            $c=M('model_items')->where('model_id='.$mid." and sessc='".$sessc."'")->count();
            if($c>0){
                echo 'rename';
            }else{
                $d['model_id']=$mid;
                $resu=M("model_items")->where("sessc='".$sessc."'")->save($d);
                if($resu!=false){
                    echo 'ok';
                }else{
                    echo 'err';
                }
            }
        }
    }
}
