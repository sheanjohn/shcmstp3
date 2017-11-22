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
    public function int_model(){
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
            $num =10;
        }
        $d1=M('model_items')->where('model_id='.$modelid)->distinct(true)->group('sessc')->field('sessc')->order('orderid')->select();
        
        foreach($d1 as $k => $v){
            $d2[$k]=$v;
            $d2[$k]['list']=M('model_items')->where("sessc='".$v['sessc']."'")->field('id,ctrl_id,strval')->order('orderid')->select();
            foreach($d2[$k]['list'] as $kk => $vv){
                $tcid=$d2[$k]['list'][$kk]['ctrl_id'];
                $d2[$k]['list'][$kk]['cui']=M('model_ctrls')->where('id='.$tcid)->getField('cui');
            }
        }
        $resu=array_slice($d2,$s,$num);
        $this->ajaxReturn($resu);
    }
    
    
    /**
     * 保存
     */
    public function save_model(){
        $val=$_POST['val'];
        $id=$_POST['id'];
        $mid=$_POST['mid'];
        $d['strval']=$val;
        $sessc=$_POST['sessc'];
        $isedit=$_POST['isedit'];
        if($isedit=='0'){
            $d['orderid']=$_POST['orderid'];
            $d['ctrl_id']=$id;
            $d['model_id']=$mid;
            $d['sessc']=$sessc;
            $resu=M('model_items')->add($d);
            if($resu!=false){
                $this->write_log(session('uname'),'干得漂亮！','成功在模块中创建了一条数据');
                echo 'ok';
            }else{
                $this->write_log(session('uname'),'手法不行！','试图在模块中创建一条数据，但失败了');
                echo 'err1';
            }
        }else{
            $resu=M("model_items")->where("model_id=".$mid.' and ctrl_id='.$id." and sessc='".$sessc."' and orderid=".$_POST['orderid'])->save($d);
            if($resu!=false){
                 $this->write_log(session('uname'),'干得漂亮！','成功在模块中修改了一条数据');
                 echo 'ok';
            }else{
                 $this->write_log(session('uname'),'手法不行！','试图在模块中修改一条数据，但失败了');
                 echo 'err';
                }
        }
    }
    
    /**
     * 删除
     */
    public function del_model(){
        $id = $_POST ['id'];
        $d = M ( 'model_items' )->where ( "sessc='" . $id ."'" )->delete ();
        if ($d != 0 && $d != false) {
            $this->write_log(session('uname'),'手法很棒！','成功在模块中删除一条数据');
            echo 'ok';
        } else {
            $this->write_log(session('uname'),'手法不行！','试图在模块中删除一条数据，但失败了');
            echo 'err';
        }
    }
    
    /**
     * 读取
     */
    
    public function load_model(){
        $id = $_POST ['sessc'];
        $mid=$_POST['mid'];
        $d = M ( 'model_items' )->field('ctrl_id,strval')->where ( "sessc='".$id."' and model_id=".$mid )->select ();
        foreach($d as $kk => $vv){
            $tcid=$d[$kk]['ctrl_id'];
            $d[$kk]['cui']=M('model_ctrls')->where('id='.$tcid)->getField('cui');
        }
        $this->ajaxReturn ( $d, 'JSON' );
    }
}
