<?php
namespace core\lib;
/**
 * 日志类
 * @author 姜宇
 *
 */
class Log{
    /**
     * 构造方法创建日期文件夹
     */
    public function __construct(){
        $dirName=MYFRAME.'/log/'.date('Y-m-d',time());
        if (!file_exists($dirName)){
          mkdir($dirName,0777,true);
           echo '文件创建成功';
        }
    }
    public static function set($string){
        
    }
}