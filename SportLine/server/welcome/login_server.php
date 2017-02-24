<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/10/24
 * Time: 23:44
 */

require "../../server/common/DB.class.php";
$userName = $_POST['username'];
$password = $_POST['password'];

$db = new DB();
$sql =<<<EOF
    SELECT * FROM user WHERE name = '$userName' and password = '$password';
EOF;
$name = check_user($db,$userName,$password);
if($name){
    $response = "success";
}else{
   $response = "fail";
}
echo json_encode($response);

function check_user($db,$username,$password){
    $sql = <<<EOF
    SELECT name,pass,avatar FROM user WHERE name='$username';
EOF;
    $res = $db->execute_dql_arr($sql);
    if($res){
        if($res[0]["pass"] != $password){
            return "";
        }
        $name = $res[0]["name"];
        $avatar = $res[0]['avatar'];
        if(empty($avatar)){
            $avatar = "../../images/zsq.jpg";
        }
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['avatar'] = $avatar;
        return  $name;
    }
}
