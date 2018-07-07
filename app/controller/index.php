<?php
namespace app\controller;
use core\lib\Log;

/**
 * 测试控制器
 * @author 姜宇
 *
 */
class index{
    //首页
    public function index(){
        debug('欢迎使用PHPer的简易框架','',false);
    }
    //数据库连接
    public function pdo(){
        $pdo=\core\lib\Db::getInstance();
        $stmt=$pdo->query('select * from user');
        $row=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        debug($row);
    }
    //模板引擎
    public function smarty(){
        \View::assign(array('name'=>'PHPerJiang'));
        \View::display('index.html');
    }

    //配置文件
    public function conf(){
        $controller=\core\lib\Conf::get('controller', 'route');
        $method=\core\lib\Conf::get('method', 'route');
        debug($controller,'',false);
        debug($method,'',false);
    }
    //日志文件
    public function log(){
        \core\lib\Log::log($_SERVER['REMOTE_ADDR']);
        debug(file_get_contents(MYFRAME.'/log/'.date('Y-m-d').'/log.txt'));
    }
}