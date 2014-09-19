<?php
return array(
	//'配置项'=>'配置值'
	//开启分组
	'APP_GROUP_LIST' => 'Index,Admin',
	//默认分组
	'DEFAULT_GROUP' => 'Index',
	'APP_GROUP_MODE' => 1,//独立分组模式
	'APP_GROUP_PATH' =>'Modules',

	//数据库连接参数
	'DB_HOST' =>'127.0.0.1',
	'DB_USER' =>'root',
	'DB_PWD' => '',
	'DB_NAME' =>'think',
	'DB_PREFIX' => 'hd_',

	//点语法默认解析
	'TMPL_VAR_IDENTIFY' => 'array',
	//模板路径
	'TMPL_FILE_DEPR' => '_',

	//默认过滤函数
	'DEFAULT_FILTER' =>'htmlspecialchars',

	//自定义SESSION数据库存储
	'SESSION_TYPE' =>'Db',

);
?>