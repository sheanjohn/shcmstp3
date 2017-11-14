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



<body onLoad="loadmore()">
	<div id="alert_success"
	style="display: none; position: fixed; width: 20%; left: 35%; z-index: 999; top: 0px; margin-right: 300px;"
	class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert"
		aria-hidden="true">&times;</button>
	成功！很好地完成了提交。<br />
</div>
<div id="alert_info"
	style="display: none; position: fixed; width: 20%; left: 35%; z-index: 999; top: 0px; margin-right: 300px;"
	class="alert alert-info alert-dismissable">
	<button type="button" class="close" data-dismiss="alert"
		aria-hidden="true">&times;</button>
	信息！请注意这个信息。<br />
</div>
<div id="alert_warning"
	style="display: none; position: fixed; width: 20%; left: 35%; z-index: 999; top: 0px; margin-right: 300px;"
	class="alert alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert"
		aria-hidden="true">&times;</button>
	警告！请不要提交。<br />
</div>
<div id="alert_danger"
	style="display: none; position: fixed; width: 20%; left: 35%; z-index: 999; top: 0px; margin-right: 300px;"
	class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert"
		aria-hidden="true">&times;</button>
	错误！请进行一些更改。<br />
</div>

<script>
	function balert(type,text){
		$("#alert_"+type).append(text);
		$("#alert_"+type).slideDown(800);
	}
</script>
	<div class="container">
		<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse"
				data-target=".nav-collapse"> <span class="icon-bar"></span> <span
				class="icon-bar"></span> <span class="icon-bar"></span>
			</a> <a class="brand" href="<?php echo C('ROOT_DIR');?>"><?php echo C('WEB_NAME');?></a>
			<div class="nav-collapse">
				<ul class="nav">
					<li class="active"><a href="<?php echo C('ROOT_DIR');?>"><i
							class="fa fa-tachometer"></i> 控制台</a></li>
					<li><a href="/" target="_blank"><i class="fa fa-eye"></i>
							预览网站</a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown"> <i class="fa fa-wrench"></i> 数据统计 <b
							class="caret"></b>
					</a>
						<ul class="dropdown-menu">
							<?php if(is_array($menu_count)): $i = 0; $__LIST__ = $menu_count;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$i): $mod = ($i % 2 );++$i;?><li><a href="javascript:;" style="color: #333;"><?php echo ($i["tabname"]); ?>数量：<?php echo ($i["count"]); ?>
							</a></li>
							<li class="divider" style="display: none;"></li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul></li>
				</ul>
				<ul class="nav pull-right">
					<li><a href="javascript:;"><i class="fa fa-user-circle"></i>
							<?php echo (session('uname')); ?></a></li>
					<li><a href="javascript:;"><i
							class="fa fa-exclamation-circle"> <?php echo (session('utype')); ?></i></a></li>
					<li><a id="btn_logout" href="javascript:;"><i class="fa fa-sign-out"></i> 退出登录</a> <script>
				$("#btn_logout").click(function(e) {
                	var res=confirm("是否要退出登录？");
					if(res){
						window.location.href="/admin.php/Home/Config/logout"
					}
           		});
			</script></li>
				</ul>
			</div>
		</div>
	</div>
</div>

		<div class="row">
			<div class="span3">
				<div class="well" style="padding: 8px 0;">
					<ul class="nav nav-list" id="leftnav">
	<li class="nav-header"><i class="fa fa-cog"></i> 系统</li>
	<li class="active" name="Index"><a
		href="<?php echo C('ROOT_DIR');?>/home/index"><i class="fa fa-home"></i> 概览</a></li>
	<li name="Cate"><a href="<?php echo C('ROOT_DIR');?>/home/cate"><i
			class="fa fa-folder-open"></i> 栏目</a></li>
	<li name="Users"><a href="<?php echo C('ROOT_DIR');?>/home/users"><i
			class="fa fa-users"></i> 会员</a></li>
	<li name="Mgrs"><a href="<?php echo C('ROOT_DIR');?>/home/mgrs"><i
			class="fa fa-user-circle"></i> 管理员</a></li>

	<li class="nav-header"><i class="fa fa-shopping-cart"></i> 商城</li>
	<li name="Comm"><a href="<?php echo C('ROOT_DIR');?>/home/comm"><i
			class="fa fa-cubes"></i> 商品</a></li>
	<li name="Active"><a href="<?php echo C('ROOT_DIR');?>/home/active"><i
			class="fa fa-cart-plus"></i> 活动</a></li>
	<li name="Pinpai"><a href="<?php echo C('ROOT_DIR');?>/home/pinpai"><i
			class="fa fa-star"></i> 品牌</a></li>
	<li name="Dingdan"><a href="<?php echo C('ROOT_DIR');?>/home/dingdan"><i
			class="fa fa-list"></i> 订单</a></li>

	<li class="nav-header"><i class="fa fa-file-text"></i> 文章</li>
	<li name="Article"><a href="<?php echo C('ROOT_DIR');?>/home/article"><i
			class="fa fa-file"></i> 文章</a></li>
	<li name="Article1"><a href="javascript:;"><i
			class="fa fa-caret-square-o-right "></i> 专题</a></li>

	<li class="divider" style="display: none;"></li>
	<li class="nav-header"><i class="fa fa-tasks"></i> 其他</li>
	<li name="Log"><a href="<?php echo C('ROOT_DIR');?>/home/log"><i
			class="fa fa-clock-o"></i> 日志</a></li>
	<li name="Config"><a href="<?php echo C('ROOT_DIR');?>/home/config"><i
			class="fa fa-cogs"></i> 参数配置</a></li>
	<li name="Pic"><a href="<?php echo C('ROOT_DIR');?>/home/pic"><i
			class="fa fa-image"></i> 图片库</a></li>
</ul>
<script>
	/**
	自动设置样式指针(class=active)
	**/
	var CONTROLLER_NAME;
	CONTROLLER_NAME="<?php echo ($CONTROLLER_NAME); ?>";
	$("#leftnav li").each(function(index, element) {
        if($(this).attr("name")==CONTROLLER_NAME){
			$(this).addClass("active");
		}else{
			$(this).removeClass("active");
		}
    });
</script>
				</div>
			</div>

			<!---开始--->
			<div class="span9">
				<h2>参数列表</h2>
				<table id="tcontent" class="table table-bordered table-striped"
					style="text-align: center">
					<thead>
						<tr>
							<th style="text-align: center">参数名</th>
							<th style="text-align: center">参数值</th>
							<th style="text-align: center">说明</th>
							<th style="text-align: center">操作</th>
						</tr>
					</thead>
					<tbody id="content">
						<tr>
							<td style="text-align: center"><input type="text"
								placeholder="请输入新的参数名" style="float: left; width: 220px;"
								id="cname_add" onKeyUp="value=value.replace(/[^\w\.\/]/ig,'')" />
								<input type="button"
								style="float: left; width: 60px; padding: 3px; margin-left: 5px;"
								class="btn btn-sm btn-default" value="预置" id="btn_ot" /> <script>
											$("#btn_ot").click(function(e) {
                                                $("#selbox").slideDown(800);
                                            });
										</script></td>
							<td style="text-align: center"><input type="text"
								placeholder="请输入新的参数值" id="cvalue_add" /></td>
							<td style="text-align: center"><input type="text"
								placeholder="请输入说明" id="ccont_add" /></td>
							<td style="text-align: center">
								<div class="dropdown">
									<button type="button" class="btn dropdown-toggle"
										id="dropdownMenu1" data-toggle="dropdown">
										〓 <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu"
										aria-labelledby="dropdownMenu1">
										<li role="presentation"><a id="btn_save_addnew"
											role="menuitem" style="color: #096;" tabindex="-1"
											href="javascript:;">保存</a></li>
									</ul>
								</div>
							</td>
						</tr>
					</tbody>
					<tbody>
					</tbody>
				</table>
				<div id="selbox"
					style="background: #eee; position: absolute; top: 200px; border-radius: 5px; border: solid 1px #999999; z-index: 999; display: none; width: 300px; padding: 0px;">
					<div
						style="padding: 5px; font-weight: bold; border-bottom: solid 1px #999; border-radius: 5px;">预置参数名</div>
					<div style="padding: 5px; background: #fff; border-radius: 5px;">
						<span
							style="margin-bottom: 5px; padding-bottom: 5px; display: block;">
							系统约定并预置了以下参数名，请选择<br />(也可以不使用此功能)：
						</span> <select id="sel1">
							<option selected>请选择...</option>
							<option value="sh1_page_listnum0" label="前台列表项数量">列表项数量(后台)</option>
							<option value="sh1_page_listnum1" label="后台列表项数量">列表项数量(前台)</option>
							<option value="sh1_site_name0" label="网站名称">网站名</option>
							<option value="sh1_site_name1" label="网站标题">网站标题</option>
							<option value="sh1_site_key" label="网站关键字">网站关键字</option>
							<option value="sh1_site_desc" label="网站描述">网站描述</option>
							<option value="sh1_site_copyright" label="网站底部文字">网站底部文字</option>
							<option value="sh1_user_level" label="会员等级">会员等级说明符</option>
							<option value="sh1_user_type" label="会员类型">会员类型说明符</option>
						</select>
						<div style="margin-top: 5px;"></div>
						<button id="btn-ok" type="button" class="btn btn-lg btn-success">确
							定</button>
						<button id="btn-cal" type="button" class="btn btn-lg btn-danger">取
							消</button>
						<script>
								$("#btn-ok").click(function(e) {
									$("#cname_add").val($("#sel1").val());
									var t=$("#sel1").find("option:selected").attr('label'); 
                                    $("#selbox").slideUp(500);
									$("#ccont_add").val(t);
                                });
								$("#btn-cal").click(function(e) {
                                    $("#selbox").slideUp(500);
                                });
							</script>
					</div>
				</div>
				<div id="pagebox" style="padding: 5px; text-align: center;">
					<span class="btn btn-sm btn-info" id="btn_nextpage">>>>
						继续加载<?php echo ($sh1_page_listnum1); ?>条数据</span>
					<script>
								$("#btn_nextpage").click(function(e) {
									loadmore();
                                 
                                });
							</script>
				</div>
				<script>
								function clearinput(){
									$("#cname_add").val('');
									$("#cvalue_add").val('');
									$("#ccont_add").val('');
								}
								$("#btn_save_addnew").click(function(e) {
									var id="0";
									var cname=$("#cname_add").val();
									var cvalue=$("#cvalue_add").val();
									var ccont=$("#ccont_add").val();
									if(id=='' || cname=='' || cvalue==''){
										balert('warning','信息不完整');
										return;
									}
									if(ccont==''||ccont==null){
										ccont='无说明';
									}
                                    var URL='/admin.php/Home/Config';
									$.ajax({
										type:'POST',
										url:URL + '/save_conf',
										data:{
											id:id,
											cname:cname,
											cvalue:cvalue,
											ccont:ccont
											},
										dataType:"text",
											beforeSend:function() { 
												sh_loading();
												}, 
												complete:function(data) { 
												sh_loading_close();
												}, 
										success: function(data){
											clearinput();
											if(data=='ok'){
												window.location.reload();
											}else if(data=='rename'){
												balert('warning','参数已存在');
											}else{
												balert('danger','保存失败');
											}
										}
									});

                                });
								function saveconf(id){
									var cname=$("#cname_"+id).val();
									var cvalue=$("#cvalue_"+id).val();
									var ccont=$("#ccont_"+id).val();
									if(id=='' || cname=='' || cvalue==''){
										balert('warning','信息不完整');
										return;
									}
									if(ccont==''||ccont==null){
										ccont='无说明';
									}
                                    var URL='/admin.php/Home/Config';
									$.ajax({
										type:'POST',
										url:URL + '/save_conf',
										data:{
											id:id,
											cname:cname,
											cvalue:cvalue,
											ccont:ccont
											},
										dataType:"text",
											beforeSend:function() { 
												sh_loading();
												}, 
												complete:function(data) { 
												sh_loading_close();
												}, 
										success: function(data){
											clearinput();
											if(data=='ok'){
												window.location.reload();
											}else if(data=='rename'){
												balert('warning','参数已存在');
											}else{
												balert('danger','保存失败');
											}
										}
									});
								}
							</script>
				<ul class="pager"
	style="border-bottom: solid 1px #eee; padding-bottom: 10px;">
	<li class="next">葫芦岛明远科技提供技术支持</li>
</ul>

			</div>
		</div>
	</div>
	<script>
		//加载
			function loadmore(){
										$("#btn_nextpage").html('请稍后...');
										$("#btn_nextpage").removeClass("btn-info");
										var URL='/admin.php/Home/Config';
										var s=$("#curpage").val();
										$.ajax({
											type:'POST',
											url:URL + '/list_conf',
											data:{
												s:s
												},
											dataType:"text",
											beforeSend:function() { 
												sh_loading();
												}, 
												complete:function(data) { 
												sh_loading_close();
												}, 
											success: function(data){
												var b=$.parseJSON(data);
												var str="";
												if(b.length<1){
													$("#btn_nextpage").html('我也是有底线的');
													$("#btn_nextpage").slideUp(1000);
													return;
												}
												for (var i=0;i<b.length;i++)
												{
str=str+'<tr>';
str=str+'	<td style="text-align:center">';
str=str+'<input type="text" disabled="disabled" value="'+b[i].cname+'" id="cname_'+b[i].id+'" onKeyUp="value=value.replace(/[^\w\.\/]/ig,'+"''"+')" />';
str=str+'	</td>';
str=str+'	<td style="text-align:center">';
str=str+'<input type="text" value="'+b[i].cvalue+'" id="cvalue_'+b[i].id+'" />';
str=str+'	</td>';
str=str+'	<td style="text-align:center">';
str=str+'<input type="text" value="'+b[i].ccont+'" id="ccont_'+b[i].id+'" />';
str=str+'	</td>';
str=str+'	<td style="text-align:center">';
str=str+'	<div class="dropdown">';
str=str+'		<button type="button" class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"> 〓 ';
str=str+'			<span class="caret"></span>';
str=str+'		</button>';
str=str+'		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">';
str=str+'			<li role="presentation">';
str=str+'				<a onclick="saveconf('+"'"+b[i].id+"'"+')" role="menuitem" style="color:#096;" tabindex="-1" href="javascript:;">保存</a>';
str=str+'			</li>';
str=str+'			<li role="presentation" class="divider"></li>';
str=str+'			<li role="presentation">';
str=str+'				<a onclick="del_conf('+"'"+b[i].id+"'"+')" role="menuitem" style="color:#F30;" tabindex="-1" href="javascript:;">删除</a>';
str=str+'			</li>';
str=str+'		</ul>';
str=str+'	</div>';
str=str+'	</td>';
str=str+'</tr>';
												}
											var pgn="<?php echo ($sh1_page_listnum1); ?>";
											$("#curpage").val(parseInt(s)+parseInt(pgn));
											$("#content").append(str);
											$("#btn_nextpage").html('>>> 继续加载<?php echo ($sh1_page_listnum1); ?>条数据');
											$("#btn_nextpage").addClass("btn-info");
											}
										});
			}
		
		 //删除
		 function del_conf(id){
			 if(id==""){
				 balert('danger',"数据错误");
				 return;
			 }else if(confirm("确定要删除吗？")){
				 
				 var URL='/admin.php/Home/Config';
				 $.ajax({
					 type:'POST',
			     url:URL+'/del_conf',
			     data:{
			    	 	id:id
			    	 },
			     datatype:"text",
											beforeSend:function() { 
												sh_loading();
												}, 
												complete:function(data) { 
												sh_loading_close();
												},  
			     success:function(data){
			    	 if(data=='ok'){
							window.location.reload();
						}else{
							balert('danger','删除失败:'+data);
						}
			     }
			 });
				 
			 }
		 }
		 </SCRIPT>
	<input type="hidden" id="curpage" value="0" />
</body>
</html>