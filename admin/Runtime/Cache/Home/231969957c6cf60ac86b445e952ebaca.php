<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<title><?php echo C('WEB_NAME');?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/Public/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/admin/css/bootstrap-responsive.min.css"
	rel="stylesheet">
<link href="/Public/admin/css/bootstrap-theme.min.css"
	rel="stylesheet">
<link href="/Public/admin/css/site.css" rel="stylesheet">
<link href="/Public/lity/lity.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/Public/jquery-ui/jquery-ui.min.css">

<!--上传插件-->
<link rel="stylesheet" type="text/css"
	href="/Public/uploadify/uploadify.css">
<!--loading-->
<link rel="stylesheet" href="/Public/loading/load.css" media="all">
<!--图标-->
<link rel="stylesheet"
	href="/Public/font-awesome/css/font-awesome.min.css" media="all">

</head>

<script src="/Public/admin/js/jquery.min.js"></script>
<script src="/Public/admin/js/bootstrap.min.js"></script>
<script src="/Public/admin/js/site.js"></script>
<script src="/Public/lity/lity.min.js"></script>
<script src="/Public/jquery-ui/jquery-ui.min.js"></script>
<!--上传-->
<script src="/Public/uploadify/jquery.uploadify.js"
	type="text/javascript"></script>
<!--加载-->
<script type="text/javascript" src="/Public/loading/load.js"></script>


<script type="text/javascript">
	function uploadfile(DIR,CTRL,WCTRL,PICCTRL){
		//dir,要创建的目录 /uploads/这里创建
		//CTRL 指定上传文件的控件
		//WCTRL将上传好的图片地址写进去这个控件
		//PICCTRL 将上传好的图片地址写进去这个图片控件，并显示
		
		//$(PICCTRL).slideUp(800);
		<?php $timestamp = time();?>
		var SWF="/Public/uploadify/uploadify.swf";
		var UPDER="/Public/uploadify/uploadify.php";
		var myDate = new Date();
		var DT=getNowFormatDate("1")+'_'+myDate.getHours()+myDate.getMinutes()+myDate.getSeconds()+myDate.getMilliseconds();
		$(CTRL).uploadify({
			'formData'     : {
				'timestamp' : '<?php echo $timestamp;?>',
				'token'     : "<?php echo md5('unique_salt' . $timestamp);?>",
				'subpath':DIR,
				'date':DT
			},
		    //是否自动上传
		    //'auto': false,
			//'buttonClass' : 'shbtn shbtn-r shbtn-sm shbtn-color-blue form-control',
		    'buttonText': '选择文件',
		    'swf': SWF,
		    'uploader': UPDER,
		    'multi': false,
		    'fileTypeDesc': '选择文件',
		    'fileTypeExts': '*.jpg;*.jpge;*.gif;*.png;',
		 
		    //返回一个错误，选择文件的时候触发
		    'onSelectError': function (file, errorCode, errorMsg) {
		    	switch (errorCode) {
		     		case -100:
		     			alert("上传的文件数量已经超出系统限制的" + $('#file_upload').uploadify('settings', 'queueSizeLimit') + "个文件！");
		    			break;
		    		case -110:
		     			alert("文件 [" + file.name + "] 大小超出系统限制的" + $('#file_upload').uploadify('settings', 'fileSizeLimit') + "大小！");
		     			break;
		     		case -120:
		     			alert("文件 [" + file.name + "] 大小异常！");
		      			break;
		    		case -130:
		      			alert("文件 [" + file.name + "] 类型不正确！");
		      			break;
		        }
		     },
		     //检测FLASH失败调用
		     'onFallback': function () {
		     	alert("您未安装FLASH控件，无法上传图片！请安装FLASH控件后再试。");
		     },
		     //上传到服务器，服务器返回相应信息到data里
		     'onUploadSuccess': function (fileObj, data, response) {
				if(data!='0'){
			 		$(WCTRL).val(data);
					$(PICCTRL).attr('src',data);
				}else{
					alert('上传图片失败，请重试');
				}
				
		}
	});
	}
	//日期
	//sw=1只有日期，0全部
	function getNowFormatDate(sw) {
	    var date = new Date();
	    var seperator1 = "-";
	    var seperator2 = ":";
	    var month = date.getMonth() + 1;
	    var strDate = date.getDate();
	    if (month >= 1 && month <= 9) {
	        month = "0" + month;
	    }
	    if (strDate >= 0 && strDate <= 9) {
	        strDate = "0" + strDate;
	    }
	    var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
	            + " " + date.getHours() + seperator2 + date.getMinutes()
	            + seperator2 + date.getSeconds();
	    var currentdate1=date.getFullYear() + seperator1 + month + seperator1 + strDate;
	    if(sw=="1") {
		    return currentdate1;
	    }else{
	    	return currentdate;
	    }
	}

	/*
	提示窗口,太难看，不要了
	*/
	function msgbox(msg){
		$("#msgbox_box").html(msg);
		$("#msgbox_box").fadeIn(1000);
	}
	function cmsgbox(){
		$("#msgbox_box").fadeOut(1000);
	}
	
	/*
	获取COOKIE
	*/
	function getCookie(c_name)
	{
	if (document.cookie.length>0)
	  {
	  c_start=document.cookie.indexOf(c_name + "=")
	  if (c_start!=-1)
		{ 
		c_start=c_start + c_name.length+1 
		c_end=document.cookie.indexOf(";",c_start)
		if (c_end==-1) c_end=document.cookie.length
		return unescape(document.cookie.substring(c_start,c_end))
		} 
	  }
	return ""
}
</script>
<!--提示窗口-->
<div id="msgbox_box"
	style="width: 30%; height: 25px; vertical-align: middle; padding: 10px; z-index: 999; background: #333; border: solid 3px #950000; color: #fff; border-radius: 5px; position: absolute; top: 300px; left: 35%; display: none; text-align: center;">
	adflkh</div>

<!-- jquery加载插件 -->
<script type="text/javascript">
		//加载层-全屏
		function sh_loading(){
			$.mask_fullscreen();
			
		}
		//加载层-指定元素
		function mask_element(){
			$.mask_element('#test_mask', 3000);
		}
		//加载层-指定元素:不自动关闭
		function mask_element_continuious(){
			$.mask_element('#test_mask_2');
		}
		//关闭指定元素加载层
		function mask_close(){
			$.mask_close('#test_mask_2');
		}
		//关闭所有加载层
		function sh_loading_close(){
			$.mask_close_all();
		}
		
	</script>



<body>
	<!--登录页面视觉差效果-->
	<link rel="stylesheet" type="text/css"
		href="/Public/admin/eff_index/css/normalize.css" />
	<link rel="stylesheet" type="text/css"
		href="/Public/admin/eff_index/css/styles.css">
	<main>
	<div id="overlay"></div>
	<ul id="scene">
		<li class="layer" data-depth="0.2">
			<div class="layer1"></div>
		</li>
	</ul>
	<div class="wrapper">
		<div class="htmleaf-header">
			<div id="login-page" class="container">
				<h1>
					<font color="#FFFFFF"><?php echo C('WEB_NAME');?></font>
				</h1>
				<form id="login-form" class="well">
					<input type="text" class="" id="uname" style="width: 95%;"
						placeholder="账号" /> <br /> <input type="password" class=""
						id="upswd" style="width: 95%;" placeholder="密码" /> <br /> <input
						type="text" class="" id="verify" style="width: 95%;"
						placeholder="请输入下面验证码数字" /> <img src="<?php echo U('home/index/verify');?>"
						style="border: solid 1px #999; border-radius: 5px; width: 99%;"
						onclick="this.src=this.src+'?'" />
					<div style="margin-top: 10px;"></div>
					<div style="padding: 5px; color: #999; float: left;">
						<span id="info"
							style="width: 170px; display: block; padding: 5px; text-align: left; float: left; font-size: 11px;">请点击按钮登录</span>
						<button type="button" id="login_sub" class="btn btn-primary">登录</button>
					</div>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
	</main>
	<!--登录页面视觉差效果-->
	<script src='/Public/admin/eff_index/js/jquery.parallax.min.js'></script>
	<script>
	$("#login_sub").click(function(e) {
        var URL='/admin.php/Home/Index';
		var codev=$("#verify").val();
		if(codev==''){
			$("#info").html("<font color='#950000'>请输入验证码...</font>");
			return;
		}
		$.ajax({
			type:'GET',
			url:URL + '/check_verify',
			data:{
				code:codev
				},
			dataType:"text",
											beforeSend:function() { 
												$("#info").html('正在发送请求...');
												}, 
												complete:function(data) { 
												//sh_loading_close();
												}, 
			success: function(data){
				if (data == '1') {
					$("#login_sub").addClass('btn-primary');
					$("#login_sub").removeClass('btn-danger');
					$("#info").html('正在登录,稍后将自动跳转...');
					gologin();
				} else  {
					//验证码输入错误
					$("#info").html("<font color='#950000'>验证码错误</font>");
					$("#login_sub").removeClass('btn-primary');
					$("#login_sub").addClass('btn-danger');
				}
			}
		});
    });
	$(document).keydown(function (event) {
		if (event.keyCode == 13) {
			$("#login_sub").click();
		}
	});
	$(document).ready(function () {
	    $('#scene').parallax();
	});
	</script>

	<script language="javascript">
	function gologin() {
		var uname=$("#uname").val();
		var upswd=$("#upswd").val();
		if(uname==''||upswd==''){
			$("#info").html("<font color='#950000'>请填写完整</font>");
			return;
		}
        var URL='/admin.php/Home/Index';
		$.ajax({
			type:'POST',
			url:URL + '/chk_login',
			data:{
				uname:uname,
				upswd:upswd
				},
			dataType:"text",
											beforeSend:function() { 
												sh_loading();
												}, 
												complete:function(data) { 
												sh_loading_close();
												}, 
			success: function(data){
				if(data!='err'){
					window.location.href="<?php echo C('ROOT_DIR');?>";
				}else{
					alert('登录失败');
				}
			}
		});
    };
</script>
</body>
</html>