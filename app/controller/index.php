<?php
namespace app\controller;
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
}