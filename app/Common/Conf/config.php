<?php
return array (
		// 网站功能配置
		'WEB_NAME' => 'simAdmin', // 名称
		                         // 模块配置
		'MODULE_ALLOW_LIST' => array (
				'Home',
				'User' 
		),
		'DEFAULT_MODULE' => 'User',
		// 数据库配置
		'DB_TYPE' => 'mysql', // 数据库类型
		'DB_HOST' => 'localhost', // 服务器地址
		'DB_NAME' => 'sim', // 数据库名
		'DB_USER' => 'root', // 用户名
		'DB_PWD' => 'zhangchen', // 密码
		'DB_PORT' => 3306, // 端口
		'DB_PREFIX' => '', // 数据库表前缀
		'DB_CHARSET' => 'utf8'  // 字符集
);