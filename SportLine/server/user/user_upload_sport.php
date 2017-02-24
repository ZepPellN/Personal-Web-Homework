<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/30
 * Time: 21:27
 */
require "../../server/common/user_session.php";
require "../../server/common/DB.class.php";

$distance = $_POST["distance"];
$time = $_POST["time"];
$step = $_POST["step"];
$calorie = $_POST["calorie"];

$db = new DB();
$username = get_username();
$id = get_id_by_name($username);
$sql = "INSERT INTO user_sport(uid,run_distance,run_time,run_step,run_calorie) VALUES ('$id','$distance','$time','$step','$calorie')";
$db->execute_dml($sql);
$sql = "UPDATE user u  SET run_step = run_step + '$step', run_distance = run_distance + '$distance',run_time = run_time + '$time',run_calorie = run_calorie + '$calorie' ";
$db->execute_dml($sql);
header("Location:../../template/management/crazysport.php");
function get_id_by_name($name)
{
    global $db;
    $sql = "SELECT * FROM user WHERE name = '$name'";
    $res = $db->execute_dql_arr($sql);
    if ($res) {
        $id = $res[0]["id"];
        return $id;
    } else {
        return "";
    }
}