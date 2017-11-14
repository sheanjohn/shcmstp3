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
						window.location.href="/admin.php/Home/Cate/logout"
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
				<h2>栏目</h2>
				<div class="well blank-slate" id="gbodx">
					<p>点击按钮添加栏目</p>
					<a href="#" class="btn btn-primary" id="btn_addnew"><i
						class="icon-plus icon-white"></i> 创建跟栏目</a>
					<script>
								$("#btn_addnew").click(function(e) {
                                    $("#div_addnew").fadeIn(800);
									$("#tcontent").fadeOut(800);
									$("#pagebox").fadeOut(800);
                                });
							</script>
				</div>
				<table id="tcontent" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>名称</th>
							<th>导航栏显示</th>
							<th>列表中显示</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody id="content"></tbody>
				</table>
				<div id="pagebox" style="padding: 5px; text-align: center;">
					<span class="btn btn-sm btn-info" id="btn_nextpage">>>>
						继续加载<?php echo ($sh1_page_listnum1); ?>条数据</span>
					<script>
								$("#btn_nextpage").click(function(e) {
                                    loadmore();
                                });
							</script>
				</div>

				<!-- 新建开始 -->
				<div class="span9" id="div_addnew" style="display: none;">
					<fieldset>
						<legend>编辑栏目</legend>
						<div class="control-group">
							<label class="control-label">名称</label>
							<div class="controls">
								<input type="text" class="input-xlarge" id="catetitle"
									placeholder="请输入名称..." />
								<script>
										function copytitle2cont(){
											var str=$("#catetitle").val();
											$("#cont")
										}
									</script>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">排序</label>
							<div class="controls">
								<input type="text" placeholder="请输入排序，越小越靠前" id="orderid"
									value="10" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">位置</label>
							<div class="controls">
								<select id="fid">
									<option disabled>请选择...</option>
									<option value="0">根栏目</option>
								</select>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">链接</label>
							<div class="controls">
								<input type="text" class="input-xlarge" id="url"
									placeholder="http://" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">图标</label>
							<div class="controls">
								<a href="javascript:;" id="btn_selicon"
									class="btn btn-sm btn-success">从图库中选择...</a> <a
									href="javascript:;" id="btn_icon_view"
									class="btn btn-sm btn-info">图标预览</a>
								<script>
										var lightbox;
										$("#btn_selicon").click(function(e) {
                                            // Open a URL in a lightbox
											lightbox = lity("<?php echo C('ROOT_DIR');?>/home/pic/index/select/yes");
											
											// Bind as an event handler
											$(document).on('click', '[data-lightbox]', lity);
                                        });
										$("#btn_icon_view").click(function(e) {
                                            if($("#icon").val()==''){
												balert('warning','还没设置图标');
											}else{
												var id=$("#icon").val();
												var URL='/admin.php/Home/Cate';
												$.ajax({
													type:'POST',
													url:URL + '/get_iconurl_byid',
													data:{
														id:id
														},
													dataType:"text",
											beforeSend:function() { 
												sh_loading();
												}, 
												complete:function(data) { 
												sh_loading_close();
												}, 
													success: function(data){
														lightbox = lity(data);
													}
												});

											}
                                        });
									</script>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">是否在导航栏中显示</label>
							<div class="controls">
								<select id="ismenu">
									<option selected value="1">显示</option>
									<option value="0">不显示</option>
								</select>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">是否在列表中显示</label>
							<div class="controls">
								<select id="isshow">
									<option value="1">显示</option>
									<option selected value="0">不显示</option>
								</select>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">栏目说明</label>
							<div class="controls">
								<div id="teditor"></div>
								<script type="text/javascript"
									src="/Public/editor/wangEditor.js"></script>
								<script type="text/javascript">
                                        var E = window.wangEditor
                                        var editor = new E('#teditor')
                                        // 或者 var editor = new E( document.getElementById('#editor') )
                                        editor.create()
                                    </script>
							</div>
						</div>

						<div class="form-actions">
							<button type="button" class="btn btn-primary" id="btn_save">保存</button>
							<button class="btn btn-sm btn-danger" id="btn-cancel">取消并收起</button>
							<input type="hidden" value="0" id="id" /> <input type="hidden"
								id="icon" />
							<script>
									//子窗口赋值
									function getV(v){
										$("#icon").val(v);
										lightbox.close();
									}
									//清空表单
									function clearfm(){
										$("#id").val("0");
										$("#catetitle").val("");
										$("#fid").val("0");
										$("#url").val("");
										editor.txt.clear();
										$("#ismenu").val("1");
										$("#isshow").val("0");
										$("#orderid").val("");
										$("#icon").val("");
									}
									$("#btn-cancel").click(function(e) {
										clearfm();
                                        $("#div_addnew").fadeOut(800);
									$("#tcontent").fadeIn(800);
									$("#pagebox").fadeIn(800);
                                    });
									$("#btn_save").click(function(e) {
										var id=$("#id").val();
										var catetitle=$("#catetitle").val();
										var fid=$("#fid").val();
										var url=$("#url").val();
										var icon=$("#icon").val();
										//var cont=$("#cont").val();
										var cont;
										cont=editor.txt.html();
										var ismenu=$("#ismenu").val();
										var isshow=$("#isshow").val();
										var orderid=$("#orderid").val();
										var icon=$("#icon").val();
										if(id=='' || fid=='' || cont=='' || orderid==''){
											balert('warning','信息不完整');
											return;
										}
                                        var URL='/admin.php/Home/Cate';
										$.ajax({
											type:'POST',
											url:URL + '/save_cate',
											data:{
												id:id,
												catetitle:catetitle,
												fid:fid,
												url:url,
												cont:cont,
												ismenu:ismenu,
												isshow:isshow,
												orderid:orderid,
												icon:icon
												},
											dataType:"text",
											beforeSend:function() { 
												sh_loading();
												}, 
												complete:function(data) { 
												sh_loading_close();
												}, 
											success: function(data){
												clearfm();
												if(data=='ok'){
													window.location.reload();
												}else if(data=='rename'){
													balert('warning','这个栏目已经有了');
												}else{
													balert('danger','保存失败');
												}
											}
										});

                                    });
								</script>
						</div>
					</fieldset>
				</div>
				<ul class="pager"
	style="border-bottom: solid 1px #eee; padding-bottom: 10px;">
	<li class="next">葫芦岛明远科技提供技术支持</li>
</ul>

			</div>
		</div>
	</div>
	<script>
			//栏目列表
			function loadmore(){
										$("#btn_nextpage").html('请稍后...');
										$("#btn_nextpage").removeClass("btn-info");
										var URL='/admin.php/Home/Cate';
										var s=$("#curpage").val();
										$.ajax({
											type:'POST',
											url:URL + '/list_cate',
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
												var show1,show2,u
												u="<?php echo C('ROOT_DIR');?>";
												for (var i=0;i<b.length;i++)
												{
/*private*/
if(b[i].isshow=='1'){
	show1='显示';
}else{
	show1='-'
}
if(b[i].ismenu=='1'){
	show2='显示';
}else{
	show2='-';
}

str=str+'<tr>';
str=str+'	<td>';
str=str+b[i].id;
str=str+'	</td>';
str=str+'	<td>';
str=str+'<a href="javascript:;" data-lity data-lity-target='+u+'/home/cate/subcate/id/'+b[i].id+'">'+b[i].catetitle+'</a>';
str=str+'	</td>';
str=str+'	<td>';
str=str+show2;
str=str+'	</td>';
str=str+'	<td>';
str=str+show1;
str=str+'	</td>';
/*
str=str+'	<td>';
if(b[i].icon!=''){
	str=str+'		<a href="javascript:;" data-lity data-lity-target="'+b[i].icon+'">查看图标</a>';
}

if(b[i].url!=''){
	str=str+'		<a href="javascript:;" data-lity data-lity-target="'+b[i].url+'">查看链接</a>';
}
str=str+'	</td>';
*/
str=str+'	<td>';
str=str+'		<a href="javascript:;" onclick="load_cate('+"'"+b[i].id+"'"+')" class="view-link">修改</a>';
str=str+'		<a href="javascript:;" class="view-link" onclick="del_cate('+"'"+b[i].id+"'"+')">删除</a>';
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
			//读取
			function load_cate(id){
				var URL='/admin.php/Home/Cate';
					$.ajax({
						type:'POST',
						url:URL + '/load_cate',
						data:{
							id:id
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
							$("#id").val(b.id);
							$("#catetitle").val(b.catetitle);
							$("#fid").val(b.fid);
							$("#url").val(b.url);
							//icon
							$("#icon").val(b.icon);
							editor.txt.html(b.cont);
							//$("#cont").val(b.cont);
							$("#ismenu").val(b.ismenu);
							$("#isshow").val(b.isshow);
							$("#orderid").val(b.orderid);
							$("#div_addnew").fadeIn(1000);
						}
					});
			}
			function del_cate(id){
				if(id==''){
					balert('danger','数据错误');
					return;
				}else if(confirm("确定要删除吗？")){
					var URL='/admin.php/Home/Cate';
					$.ajax({
						type:'POST',
						url:URL + '/del_cate',
						data:{
							id:id
							},
						dataType:"text",
											beforeSend:function() { 
												sh_loading();
												}, 
												complete:function(data) { 
												sh_loading_close();
												}, 
						success: function(data){
							if(data=='ok'){
								window.location.reload();
							}else{
								balert('danger','删除失败');
							}
						}
					});
				}
			}
		</script>
	<input type="hidden" id="curpage" value="0" />
</body>
</html>