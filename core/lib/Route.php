<?php
namespace core\lib;
/**
 * 路由类 
 * 可以将http://www.frame.com/index/index/page/2/name/phperjiang的url参数部分
 * 转换成数组
 *Array
 *(
 *  [page] => 2
 *   [name] => phperjiang
 *)
 * @author 姜宇
 *
 */
class Route{
    //存储控制器名称
    public static $controller;
    //存储控制器中方法名称
    public static $method;
    //存取url中除控制器和方法之外的参数
    public  static $request_string_arr=array();
    public function __construct(){
        //判断当前url的路径地址存在且不为'/'
        if ($_SERVER['REQUEST_URI'] && $_SERVER['REQUEST_URI'] !='/'){
            //过滤路径地址首位的'/'符
            $requsetUri=trim($_SERVER['REQUEST_URI'],'/');
            //将路径地址转换为数组
            $UriPathArr=explode('/', strtolower($requsetUri));
            //如果第一个元素存在将其赋给controller,并且注销
            if (isset($UriPathArr[0])){
                self::$controller=$UriPathArr[0];
                unset($UriPathArr[0]);
            }
            //如果第二个元素存在将其赋给method,并且注销，如果不存在则默认wei index
            if (isset($UriPathArr[1])){
                self::$method=$UriPathArr[1];
                unset($UriPathArr[1]);
            }else {
                self::$method=\core\lib\Conf::get('method', 'route');
            }
            //计算数组长度并将路径数组转换为键值关系的数组
            $count=sizeof($UriPathArr) +2;
            $i=2;
            while ($i < $count){
                if (isset($UriPathArr[$i+1])){
                    self::$request_string_arr[$UriPathArr[$i]]=$UriPathArr[$i+1];
                }
                $i=$i+2;
            }
            //debug(self::$request_string_arr);
        }else {
            //设置controller 与method 默认都为index
            self::$controller=\core\lib\Conf::get('controller', 'route');
            self::$method=\core\lib\Conf::get('method', 'route');
        }
        
    }
}