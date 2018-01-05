<?php

namespace Common\Controller;

use Think\Controller;

class Sim_publicController extends Controller {
	
	/**
	 * 调用aliapi
	 */
	public function load_aliapi(){
		$id=$_GET['id'];
		$d=M('aliapi')->where('id='.$id)->find();
		
		if($d){
			$host = $d['apihost'];
			$path = $d['apipath'];
			$method = $d['apimethod'];
			$appcode = $d['appcode'];
			$headers = array();
			array_push($headers, "Authorization:APPCODE " . $appcode);
			$querys = $d['apiquerys'];
			$bodys = $d['apibodys'];
			$url = $host . $path . "?" . $querys;
			
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($curl, CURLOPT_FAILONERROR, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HEADER, true);
			if (1 == strpos("$".$host, "https://"))
			{
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			}
			//var_dump(curl_exec($curl));
			$this->ajaxReturn(curl_exec($curl));			
		}else{
			$this->ajaxReturn('error');
		}
	}
}