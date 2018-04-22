<?php
/**
 * Created by PhpStorm.
 * User: lxm
 * Date: 2018/4/21
 * Time: 上午8:35
 */
define('ABC', realpath('./'));//可以使用__DIR__ . '/'
define('CORE', ABC.'/vendor/abccore');
define('APP', ABC.'/app');
define('ABC_DEBUG', true);

if(ABC_DEBUG){
    ini_set('display_errors', 'on');
    //error_reporting(E_ALL);
}
else{
    ini_set('display_errors', 'off');
}
//var_dump(CORE.'/common/function.php') ;
include CORE.'/common/function.php';
//include CORE.'/Abc.php';
require(CORE.'/Abc.php');
(new abccore\Abc())->run();