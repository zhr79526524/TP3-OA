<?php
return array(
	//'配置项'=>'配置值'
    // 自定义模板常量
    'TMPL_PARSE_STRING' => array(
        '__ADMIN__' => __ROOT__ . '/Public/Admin', // 站点公共目录
    ),
	    /* 数据库设置 */
    'DB_TYPE'                => 'mysql', // 数据库类型
    'DB_HOST'                => '127.0.0.1', // 服务器地址
    'DB_NAME'                => 'db_oa', // 数据库名
    'DB_USER'                => 'root', // 用户名
    'DB_PWD'                 => '', // 密码
    'DB_PORT'                => '3306', // 端口
    'DB_PREFIX'              => 'sp_', // 数据库表前缀
	// 开启追踪调试信息
	'show_page_trace' => false,
	// 动态加载文件函数
    'LOAD_EXT_FILE' => 'info',
    //  RBAC权限数据信息
    'RBAC_ROLES' => array(
            1 => '高层管理',
            2 => '中层领导',
            3 => '普通职员'
    ),
    // 权限数组  关联角色数组
    'RBAC_ROLE_AUTHS' => array(
            1 => '*/*', // 拥有全部权限
            2 => array('index/*','email/*','konwledge/*','off/*','home/showlist'),
            3 => array('index/*','email/*','konwledge/*')
    ),
);