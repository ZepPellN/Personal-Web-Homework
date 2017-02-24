<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/30
 * Time: 16:54
 */

require "../../server/common/user_session.php";
require "../../server/user/user_data.php";

$db = new DB();
$distance = $_POST["distance"];
$time = $_POST["time"];
$step = $_POST["step"];
$calorie = $_POST["calorie"];
$type = $_POST["type"];

$username = get_username();
$id = get_id_by_name($username);
update_sport($distance,$time,$step,$calorie,$type);
header("Location:../../template/management/crazysport.php");
function update_sport($distance,$time,$step,$calorie,$type){
    global $db,$id,$username;
    $id = get_id_by_name($username);
    $sql = "";
    if($type == "day"){
        $sql = "INSERT INTO day_goal(uid,distance,'time',step,calorie) VALUES ('$id','$distance','$time','$step','$calorie')";
    }else if($type == "week"){
        $sql = "INSERT INTO week_goal(uid,distance,'time',step,calorie) VALUES ('$id','$distance','$time','$step','$calorie')";
    }else if($type == "total"){
        $sql = "INSERT INTO user(total_goal_distance,total_goal_step,total_goal_time,total_goal_calorie) VALUES ('$distance','$time','$step','$calorie')";
    }

    $db->execute_dml($sql);
}
