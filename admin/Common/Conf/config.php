<?php
return array (
		// 数据库配置
		'DB_TYPE' => 'mysql', // 数据库类型
		'DB_HOST' => 'localhost', // 服务器地址
		'DB_NAME' => 'mykj', // 数据库名
		'DB_USER' => 'root', // 用户名
		'DB_PWD' => 'zhangchen', // 密码
		'DB_PORT' => 3306, // 端口
		'DB_PREFIX' => '', // 数据库表前缀
		'DB_CHARSET' => 'utf8', // 字符集
		// 网站功能配置
		'ROOT_DIR' => '/shcmstp3/admin.php',//入口
		'ROOT_URL' => '/shcmstp3/',//程序目录，请用’/‘结尾来表示一个完整的目录URL
		'WEB_NAME' => '明远科技CMS系统',//名称
        'CFG_CODNUM' => 6,//登录验证码位数
        // 管理员权限设置
		'UT_Article' => 1, // 文章系统权限
		'UT_Cate' => 2, // 栏目权限
		'UT_Pic' => 2, // 图库权限
		'UT_Users' => 2, // 用户权限
		'UT_Usermodel' => 3, // 自定义模块权限
		'UT_Model' => 4, // 模块管理
		'UT_Log' => 5, // 日志权限
		'UT_Mgrs' => 6, // 管理员权限
		'UT_Config' => 5,  // 参数权限
		// 模块设置
		'MD_CTRTYPE' => array(
		                      array(
		                          'tit'=>'数字',
		                          'val'=>'int'
		                      ),
		                      array(
		                          'tit'=>'字符串',
		                          'var'=>'str'
		                      )
		                  ),//数据类型
);