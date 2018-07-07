<?php
namespace core;
use app;

/**
 * 框架启动类
 * @author 姜宇
 *
 */
class Run{
    //存放以实例化的类的数组，防止反复实例化浪费资源
    private static $classArr=array();
    //启动框架的方法
    public static function run(){
        //引入路由类获取控制器名、方法名及其他参数
        $route = new \core\lib\Route();
        $controllerName=$route::$controller;
        $methodName=$route::$method;
        //实例化视图引擎
        \View::getInstance();
        //拼装控制器类文件路径
        $controllerPath=APP.'/controller/'.$controllerName.'.php';
        //拼装控制器类名
        $controllerClass='\app\controller\\'.$controllerName;
        //判断是否存在控制器类不存在抛出异常，存在则引入并调用方法
        if (is_file($controllerPath)){
            require_once $controllerPath;
            $classObj=new $controllerClass();
            $classObj->$methodName();
        }else {
            throw new \Exception('找不到控制器：'.$controllerName);
        }
        //初始化日志类,创建日志文件夹
        \core\lib\Log::init();
    }
    //自动加载类
    public static function load($class){
        $class=str_replace('\\', '/', $class);
        //判断类是否已被实例化
        if (in_array($class, self::$classArr)){
            return true;
        }else {
            //判断类是否存在，存在则引入，不存在返回false
            if (is_file(MYFRAME.'/'.$class.'.php')){
                require_once MYFRAME.'/'.$class.'.php';
                self::$classArr[$class]=$class;
            }else {
                return false;
            }
        }
    }
}