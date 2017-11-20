<?php

namespace Common\Controller;

use Think\Controller;

class PpublicController extends Controller {
	//
	public function _initialize() {
	}
	/**
	 * 每页面检查是否登录,SESSION不存在就跳到登录页面
	 */
	public function page_chk_login() {
		$value = session ( 'uname' );
		if (ACTION_NAME != 'login' && ACTION_NAME != 'chk_login' && ACTION_NAME != 'verify' && ACTION_NAME != 'check_verify') {
			if ($value == null) {
				$this->error ( '请登录', C ( 'ROOT_DIR' ) . '/home/index/login' );
			} else if ($value == '') {
				$this->error ( '请登录', C ( 'ROOT_DIR' ) . '/home/index/login' );
			} else {
				// 权限
				$s = session ( "utype" );
				$ut = C ( 'UT_' . CONTROLLER_NAME );
				if ($s < $ut) {
					$this->error ( '无权限操作' );
				}
				// dump('UT_'.CONTROLLER_NAME);
			}
		}
	}
	/**
	 * 统计个模块的数据数据，每页面
	 */
	public function page_valcount() {
		$tabs = array (
				'article',
				'category',
				'config',
				'log',
				'managers',
				'pic',
				'users',
		        'model',
		        'model_ctrls'
		);
		foreach ( $tabs as $k => $v ) {
			if ($v == 'category') {
				$this->assign ( $v, M ( $v )->where ( 'fid=0' )->count () );
			} else
				$this->assign ( $v, M ( $v )->count () );
		}
		$reval = "";
		foreach ( $tabs as $key => $val ) {
			switch ($val) {
				case 'article' :
					$reval = '文章';
					break;
				case 'category' :
					$reval = '栏目';
					break;
				case 'config' :
					$reval = '配置';
					break;
				case 'log' :
					$reval = '日志';
					break;
				case 'managers' :
					$reval = '管理员';
					break;
				case 'pic' :
					$reval = '图库';
					break;
				case 'users' :
					$reval = '会员';
					break;
				case 'model_ctrls' :
				    $reval= '控件';
				    break;
				case 'model' :
				    $reval ='模块';
				    break;
				default :
					$reval = '未知';
			}
			$d [$key] ['tabname'] = $reval;
			$d [$key] ['count'] = M ( $val )->count ();
		}
		$this->assign ( 'menu_count', $d );
	}
	
	/**
	 * 每页面提供变量->标签
	 */
	public function page_vals() {
		// 控制器
		$this->assign ( 'CONTROLLER_NAME', CONTROLLER_NAME );
		// 配置值
		// -列表每页项数量
		$sh1_page_listnum1 = $this->get_conf_byname ( 'sh1_page_listnum1' );
		if ($sh1_page_listnum1 != false) {
			$this->assign ( 'sh1_page_listnum1', $sh1_page_listnum1 );
		} else {
			$this->assign ( 'sh1_page_listnum1', 10 );
		}
	}
	
	/**
	 * 注销
	 */
	public function logout() {
		session ( 'uname', null );
		redirect ( C ( 'ROOT_DIR' ) . '/home/index/login' );
	}
	
	/**
	 * 管理员登录
	 */
	public function chk_login() {
		$uname = $_POST ['uname'];
		$upswd = md5 ( $_POST ['upswd'] );
		$mgr = D ( 'managers' );
		$res = $mgr->mgr_login1 ( $uname, $upswd );
		if ($res == false) {
			echo 'err';
			session ( 'uname', null );
		} else {
			session ( 'uname', $uname );
			session ( 'utype', $res ['utype'] );
			echo $res;
		}
	}
	
	/**
	 * 拿着ID到图库去找图片，返回图片地址
	 */
	public function get_iconurl_byid() {
		$id = $_POST ['id'];
		$strurl = M ( 'pic_item' )->where ( 'Id=' . $id )->getField ( 'Picurl' );
		if ($strurl != '' && $strurl != null) {
			echo $strurl;
		} else {
			echo 'err';
		}
	}
	
	/**
	 * 栏目下拉列表
	 */
	public function cate_list_select() {
		$d = M ( 'category' )->where ( 'fid=0' )->order ( 'orderid' )->select ();
		foreach ( $d as $k => $v ) {
			$d [$k] ['sub'] = M ( 'category' )->where ( 'fid=' . $d [$k] ['id'] )->order ( 'orderid' )->select ();
		}
		$this->assign ( 'cate_list', $d );
	}
	
	/**
	 * 生成验证码
	 */
	public function verify() {
		$config = array (
				'fontSize' => 50, // 验证码字体大小
				'length' => C('CFG_CODNUM'), // 验证码位数
				'useNoise' => False, // 关闭验证码杂点
				'useCurve ' => True, // 曲线
				'bg' => array (
						255,
						255,
						255 
				) 
		);
		$Verify = new \Think\Verify ( $config );
		$Verify->codeSet = '0123456789';
		$Verify->entry ();
	}
	/**
	 * 检测验证码
	 */
	function check_verify($code, $id = '') {
		$verify = new \Think\Verify ();
		$res = $verify->check ( $code, $id );
		// $this->ajaxReturn($res, 'json');
		echo $res;
	}
	
	/**
	 * POST
	 * 通过提供表名称、字段，获取值
	 */
	public function find_field() {
		$tabname = $_POST ['tabname'];
		$fieldname = $_POST ['fieldname'];
		$condition = $_POST ['condition'];
		$resu = M ( $tabname )->where ( $condition )->getField ( $fieldname );
		echo $resu;
		// $this->ajaxReturn($resu, 'json');
	}
	
	/**
	 * 通过栏目ID获取完整的路径比如 \网站名\根栏目\子栏目
	 */
	public function get_path() {
		$id = $_POST ['cateid'];
		$sub = M ( 'category' )->where ( 'id=' . $id )->find ();
		if ($sub != false) {
			$root = M ( 'category' )->where ( 'id=' . $sub ['fid'] )->getField ( 'catetitle' );
		} else {
			$root = false;
		}
		if ($root != false) {
			echo '/ ' . $root . ' / ' . $sub ['catetitle'];
		} else {
			echo '/(获取栏目发生错误) / ' . $sub ['catetitle'];
		}
	}
	
	/**
	 * 需要调用
	 * 读取参数 config
	 */
	public function get_conf_byname($cname) {
		$d = M ( 'config' )->where ( "cname='" . $cname . "'" )->getField ( 'cvalue' );
		if ($d != null && $d != false) {
			return $d;
		} else {
			return false;
		}
	}
	
	/**
	 * 送出所有模块
	 */
	public function getmod(){
	    $d=M('model')->order('id desc')->select();
	    $this->ajaxReturn($d);
	}
	
	/**
	 * 获取所有控件
	 */
	public function get_ctrls(){
	    $d=M('model_ctrls')->order('id desc')->select();
	    $this->ajaxReturn($d);
	}
	
	/**
	 * 日期
	 */
	public function get_dt(){
	    return date("Ymdhis");
	}
}


