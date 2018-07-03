<?php
namespace core;
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
        $text= new \core\text();
        $text->text1();
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