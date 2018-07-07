<?php
namespace core\lib;
/**
 * 日志类
 * @author 姜宇
 *
 */
class Log{
    //存放目录路径
    public static $logFileDir;
    /**
     * 初始化目录结构，按日期创建日志我呢见驾
     */
    public static function init(){
        self::$logFileDir=MYFRAME.'/'.\core\lib\Conf::get('logFileName', 'log').'/'.date('Y-m-d');
        if (!file_exists(self::$logFileDir)){
            mkdir(self::$logFileDir,0777,true);
        }
    }
    
    /**
     * 打印日志文件方法
     * @param mix $message
     * @param string $fileName
     */
    public static function log($message, $file='log'){
        file_put_contents(self::$logFileDir.'/'.$file.'.txt', date('Y-m-d H:i:s').'   '.json_encode($message,JSON_UNESCAPED_UNICODE).PHP_EOL,FILE_APPEND);
    }
}