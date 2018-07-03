<?php
/*调试函数  */
function debug($var, $dump=false, $exit=true){
    if($dump){
        $func='var_dump';
    }else {
        $func=(is_array($var) || is_object($var))?'print_r':'printf';
    }
    header('content-type:text/html;charset=utf-8');
    echo '<pre>调试结果为：<hr/>';
    $func($var);
    echo '</pre>';
    if($exit)
        exit;
}