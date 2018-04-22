<?php
/**
 * User: lxm
 * Date: 2018/4/21
 * Time: 下午8:12
 */
namespace app\controllers;
use abccore\lib\Controller;
use abccore\lib\Model;

class IndexController extends Controller
{

    public function index()
    {
        $data='Hello World!';
        //$model=new Model();
        //$sql='select * from user';
        //$result=$model->query($sql);
        //pp($result->fetchAll());

        $this->assign('data',$data);
        $this->render('index.html');

    }
}