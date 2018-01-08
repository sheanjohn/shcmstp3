<?php

namespace Home\Common\Controller;

// use Think\Controller;
use Common\Controller\Sim_publicController;

class PpublicController extends Sim_publicController {
	
	//
	public function _initialize() {
	}
	
	/**
	 * 处理标签
	 */
	public function insert_tag($tagstr) {
		$tagarr=explode(',',$tagstr);
		if(count($tagarr)){
			foreach($tagarr as $k => $v){
				if(!$v){
					continue;
				}else{
					$c=M('tags')->where("tagname='".$v."'")->count();
					if($c){
						continue;
					}else{
						$d['tagname']=$v;
						$r=M('tags')->add($d);
					}
				}
			}
		}
	}
	
	/**
	 * 每页面检查是否登录,SESSION不存在就跳到登录页面
	 */
	public function page_chk_login() {
		$value = session ( 'uname' );
		if (ACTION_NAME != 'login' && ACTION_NAME != 'chk_login' && ACTION_NAME != 'verify' && ACTION_NAME != 'check_verify') {
			if ($value == null) {
				$this->error ( '请稍等……', __MODULE__ . '/index/login', 1 );
			} else if ($value == '') {
				$this->error ( '请稍等……', __MODULE__ . '/home/index/login', 1 );
			} else {
				// 权限
				$s = session ( "utype" );
				$ut = C ( 'UT_' . CONTROLLER_NAME );
				if ($s < $ut) {
					$this->write_log ( session ( 'uname' ), '不幸被挡在门外', '试图进入没有权限的管理页面' );
					$this->error ( '无权限操作', '', 1 );
				}
				// dump('UT_'.CONTROLLER_NAME);
			}
		}
	}
	
	/**
	 * 从参数表中读取两个下拉列表(等级，类型)
	 */
	public function get_levelandtype($cname) {
		$d = $this->get_conf_byname ( $cname );
		if ($d != '' && $d != null) {
			$d = explode ( ',', $d );
		}
		$this->assign ( $cname, $d );
	}
	
	/**
	 * 统计个模块的数据数据，每页面
	 */
	public function page_valcount() {
		$tabs = array (
				'article',
				'category',
				'config',
				'logmgr',
				'managers',
				'pic',
				'users',
				'model',
				'model_ctrls',
				'message' 
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
				case 'logmgr' :
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
					$reval = '控件';
					break;
				case 'model' :
					$reval = '模块';
					break;
				case 'message' :
					$reval = '站内信、消息';
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
		// 控制器->cname变量（页面名称）
		$this->assign ( 'CNAME', $this->cname );
		// 配置值
		// -列表每页项数量
		$sh1_page_listnum1 = $this->get_conf_byname ( 'sh1_page_listnum1' );
		if ($sh1_page_listnum1 != false) {
			$this->assign ( 'sh1_page_listnum1', $sh1_page_listnum1 );
		} else {
			$this->assign ( 'sh1_page_listnum1', 10 );
		}
		// -背景颜色
		$sh1_page_bkc = $this->get_conf_byname ( 'sh1_page_bkc' );
		if ($sh1_page_bkc != false) {
			$this->assign ( 'sh1_page_bkc', $sh1_page_bkc );
		} else {
			$this->assign ( 'sh1_page_bkc', '#fff' );
		}
	}
	
	/**
	 * 注销
	 */
	public function logout() {
		$this->write_log ( session ( 'uname' ), '头也不回的走了', '成功退出系统' );
		session ( 'uname', null );
		redirect ( __MODULE__ . '/index/login' );
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
			$this->write_log ( '外来者', '被轰了出去', '登录失败' );
		} else {
			session ( 'uname', $uname );
			session ( 'utype', $res ['utype'] );
			$this->write_log ( session ( 'uname' ), '风尘仆仆的来了', '成功登录系统' );
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
			echo __ROOT__ . '/' . $strurl;
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
				'length' => C ( 'CFG_CODNUM' ), // 验证码位数
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
	public function getmod() {
		$d = M ( 'model' )->order ( 'id desc' )->select ();
		$this->ajaxReturn ( $d );
	}
	
	/**
	 * 获取所有控件
	 */
	public function get_ctrls() {
		$d = M ( 'model_ctrls' )->order ( 'id desc' )->select ();
		$this->ajaxReturn ( $d );
	}
	
	/**
	 * 日期
	 */
	public function get_dt() {
		return date ( "Ymdhis" );
	}
	
	/**
	 * 获取所有控制器名称
	 */
	protected function getController($module) {
		if (empty ( $module ))
			return null;
		$module_path = APP_PATH . '/' . $module . '/Controller/'; // 控制器路径
		if (! is_dir ( $module_path ))
			return null;
		$module_path .= '/*.class.php';
		$ary_files = glob ( $module_path );
		foreach ( $ary_files as $file ) {
			if (is_dir ( $file )) {
				continue;
			} else {
				$files [] = basename ( $file, C ( 'DEFAULT_C_LAYER' ) . '.class.php' );
			}
		}
		$i = array (
				'Com',
				'Qq',
				'Shop',
				'Payment',
				'abc' 
		);
		foreach ( $files as $func ) {
			if (! in_array ( $func, $i )) {
				$arrr [] = $func;
			}
		}
		return $arrr;
	}
	
	/**
	 * 获取所有方法名称
	 */
	protected function getAction($controller) {
		if (empty ( $controller ))
			return null;
		$con = A ( $controller );
		$functions = get_class_methods ( $con );
		// 排除部分方法
		$inherents_functions = array (
				'_initialize',
				'__construct',
				'getActionName',
				'isAjax',
				'display',
				'show',
				'fetch',
				'buildHtml',
				'assign',
				'__set',
				'get',
				'__get',
				'__isset',
				'__call',
				'error',
				'success',
				'ajaxReturn',
				'redirect',
				'__destruct',
				'_empty',
				'verify',
				'validateUser',
				'createSn',
				'getpage',
				'json',
				'xml',
				'xmlTo',
				'theme' 
		);
		foreach ( $functions as $func ) {
			if (! in_array ( $func, $inherents_functions )) {
				$customer_functions [] = $func;
			}
		}
		return $customer_functions;
	}
	
	/**
	 * 获取所有控制器下的所有方法
	 */
	public function abc() {
		$a = $this->getController ( 'Shequapp' );
		for($i = 0; $i < count ( $a ); $i ++) {
			$c [$a [$i]] = $this->getAction ( $a [$i] );
		}
		
		p ( $c );
	}
	
	/**
	 * 写入一条LOG
	 * 参数，用户名，动作，详情
	 */
	public function write_log($uname, $action, $actcont) {
		$swt = $this->get_conf_byname ( 'sh1_log_pwr' );
		if ($swt == 'true' || $swt = false) {
			$d ['uname'] = $uname;
			$d ['Action'] = $action;
			$d ['actcont'] = $actcont;
			$d ['Logdate'] = $this->get_dt ();
			$resu = M ( 'logmgr' )->add ( $d );
			if ($resu == false || $resu == 0) {
				$this->error ( '有一个小状况，程序在写入日志的时候发生了问题。不过不用担心，只是日志写入错误，这不会影响你刚才的操作。', '', 10 );
			}
		}
	}
	
	/**
	 * 最新10条日志
	 */
	public function log_top10() {
		$d = M ( 'logmgr' )->limit ( 10 )->order ( 'id desc' )->select ();
		$this->ajaxReturn ( $d );
	}
	
	/**
	 * 脏字过滤
	 */
	public function guolv($str) {
		$allergicWord = $this->get_conf_byname ( 'sh1_sys_guolv' ); // array('脏话','骂人话');
		                                                            // $str = '这句话里包含了脏话和骂人话';
		for($i = 0; $i < count ( $allergicWord ); $i ++) {
			$content = substr_count ( $str, $allergicWord [$i] );
			if ($content > 0) {
				$info = $content;
				// return false;
				break;
			}
		}
		if ($info > 0) {
			// 有违法字符
			return 'yes';
		} else {
			// 没有违法字符
			return 'no';
		}
	}
}


