<?php
namespace core\lib;
/**
 * 日志类
 * @author 姜宇
 *
 */
class Log{
    /**
     * 日志文件初始化，创建日志文件夹
     * @param string $log
     */
    public static function init(){
        $dirName=MYFRAME.'/'.$log;
        if (!file_exists($dirName)){
          mkdir($dirName,0777,true);
        }
    }
    public static function log($message, $file){
        
    }
}