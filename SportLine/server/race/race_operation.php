<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/1
 * Time: 16:41
 */
require "../../server/common/user_session.php";
require "../../server/common/DB.class.php";

$username = get_username();
$race_op = $_POST["op"];
$race_title = $_POST["title"];
$race_type = $_POST["type"];

$db = new DB();
$sql = "SELECT pk_race.id FROM pk_race WHERE pk_race.title = '$race_title'";
$res = $db->execute_dql_arr($sql);
if($res) {
    $race_id = $res[0]["id"];

} else {
    $activity_id = "";
}
$response = "";
if($race_op == "join"){
    join_race($db,$username,$race_id,$race_type);
    $response = "Join Successfully";
}else if($race_op == "delete"){
    del_race($db,$race_id,$type);
    $response = "Delete Successfully";
}else {
    out_race($db,$username,$race_id,$race_type);
    $response = "Quit Successfully";
}
echo $response;

function join_race($db,$user_name,$race_id,$type){
    $user_id = get_id_by_name($user_name);
    $sql = <<<EOF
INSERT INTO user_race VALUES('$user_id','$race_id');
EOF;
    $db->execute_dml($sql);
    if($type == "single"){
        $sql  = <<<EOF
UPDATE pk_race  SET num = num + 1 WHERE id = "$race_id";
EOF;
    }else{
        $sql = <<<EOF
UPDATE Multiple_race SET num = num + 1 WHERE id = "$race_id";
EOF;
    }
    $db->execute_dml($sql);
}

function out_race($db,$user_id,$race_id,$type){
    $sql = <<<EOF
DELETE FROM user_race WHERE uid = "$user_id" AND rid = "$race_id";
EOF;
    $db->execute_dml($sql);
    if($type == "single"){
        $sql = <<<EOF
UPDATE pk_race SET num = num - 1 WHERE id= "$race_id";
EOF;
    }else{
        $sql = <<<EOF
UPDATE multiple_race SET num = num - 1 WHERE id = "$race_id";
EOF;
    }
    $db->execute_dml($sql);
}

function del_race($db,$race_id,$type){
    $sql = <<<EOF
DELETE FROM user_race WHERE rid="$race_id";
EOF;
    $db->execute_dml($sql);
    if($type == "single"){
        $sql = <<<EOF
DELETE FROM single_race WHERE id = "$race_id";
EOF;
    }else{
        $sql = <<<EOF
DELETE FROM multiple_race WHERE id = "$race_id";
EOF;
    }
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
