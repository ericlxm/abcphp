<?php
/**
 * User: lxm
 * Date: 2018/4/21
 * Time: 下午11:27
 */
namespace abccore\lib;

class Model extends \PDO
{
    public function __construct()
    {
        //pp('this is model');
        $dsn='mysql:host=localhost:8889;dbname=test';
        $username='root';
        $passwd='root';
        $options=[];
        try{
        parent::__construct($dsn, $username, $passwd,$options);
        }
        catch (\PDOException $e){
            pp($e->getMessage());
        }

        //pp('this is model');
    }
}