<?php
/**
*入口文件
*1.定义常量
*2.加载函数库
*3.启动框架
*/
//框架所在路径
define('MYFRAME', str_replace('\\', '/', getcwd()));
//框架核心文件路径
define('CORE', MYFRAME.'/core');
//项目文件路径
define('APP', MYFRAME.'/app');
//是否开启调试模式
define('DEBUG', TRUE);
//检测调试模式是否开启
if (DEBUG){
    ini_set('display_error', 'on');
}else {
    ini_set('display_error', 'off');
}
//引入函数库
require_once CORE.'/common/function.php';
//引入启动文件
require_once CORE.'/Run.php';
//启动框架
\core\Run::run();