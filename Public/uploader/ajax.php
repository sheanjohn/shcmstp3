<?php
header("Content-type:text/html;charset=utf-8");


$typeArr = array("jpg", "png", "gif","ico");
//允许上传文件格式
$path = $_GET['rootpath'].'/uploads/'.$_GET['subpath'].'/';
//上传路径//要创建的多级目录

//判断目录存在否，存在给出提示，不存在则创建目录

//if (is_dir($path)){	
	//echo json_encode(array("error" => "目录已经存在"));
	//exit ;	
//}else{	
	//第三个参数是“true”表示能创建多级目录，iconv防止中文目录乱码
	//$res=mkdir(iconv("UTF-8", "GBK", $path),0777,true);
	//if ($res){
		//echo "目录 $path 创建成功";
	//}else{
		//echo "目录 $path 创建失败";
	//}
//}

if (!file_exists('../../uploads/'.$_GET['subpath'].'/')) {
	//mkdir($path);
	mkdir(iconv("UTF-8", "GBK", '../../uploads/'.$_GET['subpath'].'/'),0777,true);
}

if (isset($_POST)) {
	$name = $_FILES['file']['name'];
	$size = $_FILES['file']['size'];
	$name_tmp = $_FILES['file']['tmp_name'];
	if (empty($name)) {
		echo json_encode(array("error" => "您还未选择图片"));
		exit ;
	}
	$type = strtolower(substr(strrchr($name, '.'), 1));
	//获取文件类型

	if (!in_array($type, $typeArr)) {
		echo json_encode(array("error" => "清上传jpg,png或gif类型的图片！"));
		exit ;
	}
	if ($size > (5000 * 1024)) {
		echo json_encode(array("error" => "图片大小已超过500KB！"));
		exit ;
	}

	$pic_name = time() . rand(10000, 99999) . "." . $type;
	//图片名称
	//$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"].'/uploads/'.$_GET['subpath'].'/'. $pic_name;
	$pic_url =$path . $pic_name;
	//$pic_url=$pic_name;
	//上传后图片路径+名称
	if (move_uploaded_file($name_tmp, '../../uploads/'.$_GET['subpath'].'/'.$pic_name)) {//临时文件转移到目标文件夹
		echo json_encode(array("error" => "0", "pic" => $pic_url, "name" => $pic_name));
	} else {
		echo json_encode(array("error" => "上传有误，清检查服务器配置！".$pic_url));
	}
}
?>