<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/10/30
 * Time: 11:14
 */
function get_error(){
    $error = 0;//正常
    //接收错误编号
    if(!empty($_GET['error'])){
        $error = $_GET['error'];
    }
    return $error;
}