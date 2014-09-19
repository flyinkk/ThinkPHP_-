<?php
return array(
	//'配置项'=>'配置值'
	//开启分组
	'APP_GROUP_LIST' => 'Index,Admin',
	//默认分组
	'DEFAULT_GROUP' => 'Index',
	//设置超级管理员
	'RBAC_SUPPERADMIN' =>'admin',
	'ADMIN_AUTH_KEY' =>'superadmin',//超级管理员识别
	'USER_AUTH_ON' =>true,	//是否开启验证
	'USER_ATH_KEY' =>'uid', 	//用户认证识别号
	'USER_AUTH_TYPE'=> 1,	//验证类型（1：登陆验证 2：实时验证）
	'NOT_AUTH_MODULE'=>'',		//无需认证的控制器
	'NOT_AUTH_ACTION'=>'',		//无需认证的动作方法
	'RBAC_ROLE_TABLE'=>'hd_role',	//角色表名称
	'RBAC_USER_TABLE'=>'hd_role_user',	//角色与用户的中间表名称
	'RBAC_NODE_TABLE'=>'hd_node',		//节点表名称

	'TMPL_PARSE_STRING' => array(
		'__PUBLIC__' =>__ROOT__.'/'.APP_NAME.'/Modules/'.GROUP_NAME.'/Tpl/Public',
		),
	'URL_HTML_SUFFIX' =>'',
);
?>