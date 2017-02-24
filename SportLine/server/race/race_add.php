<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/13
 * Time: 23:18
 */
require "../../server/common/DB.class.php";
require "../../server/common/user_session.php";

$title = $_POST["title"];
$start_time = $_POST["start_time"];
$end_time = $_POST["end_time"];
$place = $_POST["place"];
$info = $_POST["info"];
$bonus = $_POST["bonus"];
$level = $_POST["level"];
$type = $_POST["type"];
$sponsor = get_username();


$db = new DB();
$sql = "";
if($type == "PK"){
    $sql = "INSERT INTO pk_race(title, start_time,end_time, place, info,bonus,sponsor,leader,'level') VALUES 
        ('$title', '$start_time','$end_time', '$place', '$info','$bonus','$sponsor','$sponsor','$level')";
    $db->execute_dml($sql);
    $uid = get_id_by_name($sponsor,$db);
    $rid = get_rid($title,$db);
    $sql = "INSERT INTO user_race(uid,rid) VALUES ('$uid','$rid')";
    $db->execute_dml($sql);
    header("Location:../../template/race/singleRace.php");
}else if($type == "Multiple"){
    $sql = "INSERT INTO Multiple_race(title, start_time,end_time, place, info,bonus,sponsor,'level') VALUES 
        ('$title', '$start_time','$end_time', '$place', '$info','$bonus','$sponsor','$sponsor','$level')";
    $db->execute_dml($sql);
    header("Location:../../template/race/multipleRace.php");
}
function check_title($title,$db){
    $sql =<<<EOF
  SELECT * FROM race WHERE title = '$title';
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

function get_rid($title,$db){
    $sql = <<<EOF
SELECT * FROM pk_race WHERE title = '$title';
EOF;
    $res = $db->execute_dql_arr($sql);
    if($res){
        $rid = $res[0]["id"];
        return $rid;
    }else{
        return "";
    }

}

