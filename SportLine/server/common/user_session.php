<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/10/30
 * Time: 11:15
 */
session_start();

//获得用户名
function get_username(){
    $username = "";
    if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
        //get session
        $username = $_SESSION["username"];
    }else{
        header("Location:../../template/welcome/login.php");
    }
    return $username;
}

//获得头像
function get_avatar(){
    $avatar = "";
    if(isset($_SESSION["avatar"]) && !empty($_SESSION['avatar'])){
        $avatar = $_SESSION['avatar'];
    }else{
        header("Location:../../template/welcome/login.php");
    }
    return $avatar;
}

