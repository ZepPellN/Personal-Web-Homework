<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/1
 * Time: 9:09
 */
require "../../server/common/DB.class.php";
require "../../server/common/user_session.php";

$title = $_POST['title'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$place = $_POST['place'];
$info = $_POST['info'];
$bonus = $_POST['bonus'];
$sponsor = get_username();
$level = $_POST['level'];

$db = new DB();
$bool = check_title($title,$db);
if($bool){
    header("Location:../../template/activity/CreateActivity.php?error=titleExist");
    exit();
}else{
    $sql = "INSERT INTO activity(title, start_time,end_time, place, info,bonus,sponsor,'level',num) VALUES 
        ('$title', '$start_time','$end_time', '$place', '$info','$bonus','$sponsor','$level',0)";
    $db->execute_dml($sql);
    $uid = get_id_by_name($sponsor,$db);
    $aid = get_aid($title,$db);
    $sql = "INSERT INTO user_activity(uid,aid) VALUES ('$uid','$aid')";
    $db->execute_dml($sql);
    header("Location: ../../template/activity/Activity.php");
}

function check_title($title,$db){
    $sql =<<<EOF
  SELECT * FROM activity WHERE title = '$title';
EOF;
        $res = $db->execute_dql_arr($sql);
        if($res){
            return true;
        }
        return false;
}
// 通过name查找id
function get_id_by_name($name,$db) {
    $sql = "SELECT * FROM user WHERE name = '$name'";
    $res = $db->execute_dql_arr($sql);
    if($res) {
        $id = $res[0]["id"];
        return $id;
    } else {
        return "";
    }
}

function get_aid($title,$db){
    $sql = <<<EOF
SELECT * FROM activity WHERE title = '$title';
EOF;
    $res = $db->execute_dql_arr($sql);
    if($res){
        $aid = $res[0]["id"];
        return $aid;
    }else{
        return "";
    }

}