<?php
namespace core\lib;
/**
 * 加载配置文件类
 * 1.判断配置文件是否存在
 * 2.判断文件中配置项是否存在
 * 3.缓存配置
 * @author 姜宇
 *
 */
class Conf{
    //存放已经加载的配置数据
    public static $configArr=array();
    /**
     * 获取配置文件数据
     * @param string $name  配置名称
     * @param string $file  配置文件名称
     * @throws \Exception   抛出异常
     * @return mixed        返回配置数据
     */
    public static function get($name,$file){
        //拼装配置文件路径
        $configFilePath=CORE.'/config/'.$file.'.php';
        //判断配置文件是否已加载过并且是否存在配置数据
        if (isset(self::$configArr[$file])){
            return self::$configArr[$file][$name];
        }else {
            //判断配置文件是否存在
            if (is_file($configFilePath)){
                $conf = require_once $configFilePath;
                self::$configArr[$file]=$conf;
                //判断配置选项是否存在
                if (isset($conf[$name])){
                    return $conf[$name];
                }else {
                    throw new \Exception('没有这个配置选选项：'.$name);
                }
            }else {
                throw new \Exception('没有这个配置文件：'.$file);
            }
        }
    }
}