<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/1
 * Time: 9:25
 */

require "../../server/common/user_session.php";
require "../../server/common/DB.class.php";

$username = get_username();

$activity_title = $_POST["title"];
$activity_op = $_POST["op"];

$db = new DB();
$sql = "SELECT activity.id FROM activity WHERE activity.title = '$activity_title'";
$res = $db->execute_dql_arr($sql);
if($res) {
    $activity_id = $res[0]["id"];

} else {
    $activity_id = "";
}
$response = "";
if($activity_op == "join"){
    join_ac($db,$username,$activity_id);
    $response = "Join Successfully!";
}else if($activity_op == "exit"){
    out_ac($db,$username,$activity_id);
    $response = "Quit Successfully!";
}else if($activity_op == "del"){
    del_ac($db,$activity_id);
    $response = "Delete Successfully!";
}
echo $response;

function join_ac($db,$user_name,$ac_id){
    $user_id = get_id_by_name($user_name);
    $sql = "INSERT INTO user_activity VALUES('$user_id','$ac_id')";
    $db->execute_dml($sql);
    $sql = "UPDATE activity SET num = num + 1 WHERE id = '$ac_id '";
    $db->execute_dml($sql);
}

function out_ac($db,$user_id,$ac_id){
    $sql = "DELETE FROM user_activity WHERE uid = '$user_id' AND 
      aid = '$ac_id'";
    $db->execute_dml($sql);
    $sql = "UPDATE activity SET num = num - 1 WHERE id = '$ac_id'";
    $db->execute_dml($sql);
}

function del_ac($db,$ac_id){
    $sql = "DELETE FROM user_activity WHRER aid = '$ac_id'";
    $db->execute_dml($sql);
    $sql = "DELETE FROM activity WHERE id='$ac_id'";
    $db->execute_dml($sql);
}

// 通过name查找id
function get_id_by_name($name) {
    global $db;
    $sql = "SELECT * FROM user WHERE name = '$name'";
    $res = $db->execute_dql_arr($sql);
    if($res) {
        $id = $res[0]["id"];
        return $id;
    } else {
        return "";
    }
}
