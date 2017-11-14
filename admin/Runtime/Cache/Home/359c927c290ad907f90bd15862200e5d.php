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



<body
	onLoad="uploadfile('pic_<?php echo ($_GET['id']); ?>','#file_img','#picurl','#upimg')">
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
	<script>
		//读取图库标题
		$(function(){
			var URL='/admin.php/Home/Pic';
			var id="<?php echo ($_GET['id']); ?>";
			//把图库ID提交给保存图片的AJAX
			$.ajax({
				type:'POST',
				url:URL + '/load_pic_title',
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
					if(data!=''){					
						$("#h2_pictitle").html(data);
						loadmore();
						$("#btn_nextpage").fadeIn(800);
					}else{
						$("#h2_pictitle").html('数据错误');
					}
				}
			});
		})
	</script>
	<div class="container">
		<div class="row">
			<!---开始--->
			<div class="span9">
				<h2 id="h2_pictitle">正在读取...</h2>


				<div class="well blank-slate" id="gbodx">
					<p>点击按钮在当前图库添加图片</p>
					<span class="btn btn-sm btn-success" id="btn_addnew">+ 添加图片</span>
					<script>
								$("#btn_addnew").click(function(e) {
                                    $("#div_addnew").fadeIn(800);
									$("#content").fadeOut(800);
									$("#pagebox").fadeOut(800);
                                });
							</script>
				</div>
				<ul class="thumbnails" id="content"></ul>
				<div id="pagebox" style="padding: 5px; text-align: center;">
					<span class="btn btn-sm btn-info" id="btn_nextpage"
						style="display: none;">>>> 继续加载<?php echo ($sh1_page_listnum1); ?>条数据</span>
					<script>
								$("#btn_nextpage").click(function(e) {
                                    loadmore();
                                });
							</script>
				</div>

				<!-- 新建开始 -->
				<div class="span9" id="div_addnew" style="display: none;">
					<fieldset>
						<legend>上传图片</legend>

						<div class="control-group">
							<label class="control-label">图片</label>
							<div class="controls">
								<img src="/Public/admin/img/noimg.gif" id="upimg"
									style="width: 200px; border: solid 2px #36C; border-radius: 5px; margin: 5px;"
									class="img-responsive" /> <input id="file_img"
									name="file_upload" type="file" class="input-file" multiple>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">类型</label>
							<div class="controls">
								<select id="pictype">
									<option selected value="1">普通图片</option>
									<option value="0">缩略图(多用于商品列表)</option>
								</select>
							</div>
						</div>

						<div class="form-actions">
							<button type="button" class="btn btn-primary" id="btn_save">保存</button>
							<button class="btn btn-sm btn-danger" id="btn-cancel">取消并收起</button>
							<input type="hidden" value="0" id="id" /> <input type="hidden"
								id="picurl" /> <input type="hidden" id="picid"
								value="<?php echo ($_GET['id']); ?>" />
							<script>
									//清空表单
									function clearfm(){
										$("#id").val("0");
										$("#picurl").val("");
										$("#pictype").val("1");
										$("#upimg").attr('src','/Public/admin/img/noimg.gif');
									}
									$("#btn-cancel").click(function(e) {
										var resu=confirm('此操作将删除你刚刚上传的图片\r是否继续?');
										if (resu){
											var picurl=$("#picurl").val();
											clearfm();
											//alert(picurl);
											del_pic_file(picurl);
											$("#div_addnew").fadeOut(800);
											$("#content").fadeIn(800);
											$("#pagebox").fadeIn(800);
										}
                                    });
									$("#btn_save").click(function(e) {
										var id=$("#id").val();
										var picurl=$("#picurl").val();
										var pictype=$("#pictype").val();
										var picid=$("#picid").val();
										if(id=='' || picurl=='' || picid==''){
											balert('warning','信息不完整');
											return;
										}
                                        var URL='/admin.php/Home/Pic';
										$.ajax({
											type:'POST',
											url:URL + '/save_pic_item',
											data:{
												id:id,
												picurl:picurl,
												pictype:pictype,
												picid:picid
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
			</div>
		</div>
	</div>
	<script>
			//栏目列表
			function loadmore(){
										$("#btn_nextpage").html('请稍后...');
										$("#btn_nextpage").removeClass("btn-info");
										var URL='/admin.php/Home/Pic';
										var s=$("#curpage").val();
										var picid=$("#picid").val();
										if(picid==''){
											balert('danger',"数据错误");
											return;
										}
										$.ajax({
											type:'POST',
											url:URL + '/list_pic_item',
											data:{
												s:s,
												picid:picid
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
												var show1,show2
												for (var i=0;i<b.length;i++)
												{

show2="<?php echo ($_GET['select']); ?>";
if(show2=='yes'){
	show2='&nbsp;&nbsp;<a href="javascript:;" onclick="window.parent.getV('+"'"+b[i].id+"'"+')" class="btn btn-sm btn-success">选择</a>';
}else{
	show1=b[i].pictype;
	if(show1=='0'){
		show1='&nbsp;&nbsp;(缩略图)';
	}else{
		show1='&nbsp;&nbsp;(普通图)';
	}
}
show1=show2;

str=str+'<li class="span3">';
str=str+'	<div class="thumbnail">';
str=str+'		<img src="'+b[i].picurl+'"/>';
str=str+'		<div class="caption">';
str=str+'			<h5>#'+b[i].id+show1+'</h5>';
str=str+'			<p><a href="'+b[i].picurl+'" target="_blank">看大图</a> | <a href="javascript:;" onclick="del_pic_item('+"'"+b[i].id+"'"+')">删除</a> </p>';
str=str+'		</div>';
str=str+'	</div>';
str=str+'</li>';
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
				var URL='/admin.php/Home/Pic';
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
							$("#cont").val(b.cont);
							$("#ismenu").val(b.ismenu);
							$("#isshow").val(b.isshow);
							$("#orderid").val(b.orderid);
							$("#div_addnew").fadeIn(1000);
						}
					});
			}
			function del_pic_file(url){
				if(id==''){
					balert('danger','数据错误');
					return;
				}
				var URL='/admin.php/Home/Pic';
					$.ajax({
						type:'POST',
						url:URL + '/del_temp_pic',
						data:{
							url:url
							},
						dataType:"text",
											beforeSend:function() { 
												sh_loading();
												}, 
												complete:function(data) { 
												sh_loading_close();
												}, 
						success: function(data){
							return;
						}
					});
			}
			
			function del_pic_item(id){
				if(id==''){
					balert('danger','数据错误');
					return;
				}else if(confirm("确定要删除吗？")){
					var URL='/admin.php/Home/Pic';
					$.ajax({
						type:'POST',
						url:URL + '/del_pic_item',
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