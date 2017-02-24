<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/30
 * Time: 20:46
 */
require "../../server/common/user_session.php";
require "../../server/common/DB.class.php";

$h = $_POST["height"];
$w = $_POST["weight"];
$ws = $_POST["ws"];
$rs = $_POST["rs"];
$hr = $_POST["hr"];
$bpl = $_POST["bpl"];
$bph = $_POST["bph"];

$db = new DB();
$username = get_username();
$id = get_id_by_name($username);
$sql = "INSERT INTO user_health(uid,height,weight,walking_step,running_step,hr,bph,bpl) VALUES ('$id','$h','$w','$ws','$rs','$hr','$bph','$bpl')";
$db->execute_dml($sql);
header("Location:../../template/management/Health.php");
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