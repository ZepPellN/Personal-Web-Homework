<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/10/25
 * Time: 14:15
 */
require  "../../server/common/DB.class.php";
$username = !empty($_POST['username']) ? $_POST['username'] : null;
$password = $_POST['password'];
$email = $_POST['email'];
$birthday = $_POST['birthday'];
$province = $_POST['province'];
$city = $_POST['city'];
$gender = 1;
$profile = $_POST['profile'];
$image = $_POST['file'];

$db = new DB();
$bool = check($db,$username);
if($bool){
    header("Location:../../template/welcome/register.php?error=userExist");
    exit();
}else{
    //保存session
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['avatar'] = "../../images/zsq.jpg";
    insertIntoDB($db,$username,$password,$email,$birthday,$profile,$province,$city,$gender,$image);
    header("Location:../../template/management/Home.php");

}

function check($db,$username){
    $sql =<<<EOF
  SELECT * FROM user WHERE name = '$username';
EOF;
    $res = $db->execute_dql_arr($sql);
    if($res){
        return true;
    }
    return false;
}

function insertIntoDB($db,$username,$password,$email,$birthday,$profile,$province,$city,$gender,$image){
    $sql =<<<EOF
INSERT INTO user (name, password,email,birthday,province,city,image,profile) 
VALUES ('$username','$password','$email','$birthday','$gender','$province','$city','$image','$profile');
EOF;
    $db->execute_dml($sql);
}
