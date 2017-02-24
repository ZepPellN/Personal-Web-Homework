<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/2
 * Time: 16:24
 */

require "user_data.php";
require "../../server/common/user_session.php";

$username = get_username();
$name = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$birthday = $_POST["birthday"];
$gender = $_POST["gender"];
$profile = $_POST["profile"];
$province = $_POST["province"];
$city = $_POST["city"];
$avatar = $_POST["avatar"];

$db = new DB();
//$bool = check_name($db,$name);
//if($bool){
//    header("Location:../../template/user/Profile.php?error=userExist");
//    exit();
//}else{

$sql = "UPDATE user  SET name = '$name',sex='$gender',motto ='$profile',province='$province',
city = '$city',email='$email',birthday='$birthday' WHERE name = '$username'";
$db->execute_dml($sql);
$_SESSION['name'] = $name;
header("Location:../../template/user/Profile.php");

function check_name($db, $name) {
    $sql = "SELECT * FROM user WHERE name='$name'";
    $res = $db->execute_dql_arr($sql);
    if($res) {
        $cur_name = get_username();
        if($cur_name == $res[0]["name"]) {  // 就是用户当前的名字
            return false;
        }
        return true;
    }
    return false;
}
