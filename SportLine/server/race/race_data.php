<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/1
 * Time: 9:29
 */
require_once "../../server/common/DB.class.php";

$db = new DB();

// 全部未过期PK竞赛
function get_singleRace_list($level) {
    global $db;
    $sql = "SELECT * FROM pk_race WHERE end_time > datetime('now', 'localtime') 
    ORDER BY end_time ASC";
    //AND level  <= '$level'
    $singleRace_list = $db->execute_dql_arr($sql);
    return $singleRace_list;
}

//全部未过期多人竞赛
function get_multipleRace_list($level){
    global $db;
    $sql = "SELECT * FROM Multiple_race WHERE end_time > datetime('now', 'localtime') 
    ORDER BY end_time ASC";
   // AND level  <= '$level'
    $multipleRace_list = $db->execute_dql_arr($sql);
    return $multipleRace_list;
}
//历史单人竞赛
function get_history_single_list() {
    global $db;
    $sql = "SELECT * FROM pk_race WHERE end_time <= datetime('now', 'localtime') ORDER BY end_time ASC";
    $history_single = $db->execute_dql_arr($sql);
    return $history_single;
}

//历史多人竞赛
function get_history_multiple_list(){
    global $db;
    $sql = "SELECT * FROM Multiple_race WHERE end_time <= datetime('now', 'localtime') ORDER BY end_time ASC";
    $history_multiple = $db->execute_dql_arr($sql);
    return $history_multiple;
}
function get_singleRace_by_id($id){
    global $db;
    $sql = "SELECT DISTINCT * FROM user_race,pk_race WHERE singlerace.id = user_race.aid AND user_race.uid = '$id' ORDER BY singlerace.end_time ASC";
    $singleRace_list = $db->execute_dql_arr($sql);
    return $singleRace_list;
}

function get_multipleRace_by_id($id){
    global $db;
    $sql = "SELECT DISTINCT * FROM user_race,Multiple_race WHERE multiplerace.id = user_race.aid AND user_race.uid = '$id' ORDER BY multiplerace.end_time ASC";
    $multipleRace_list = $db->execute_dql_arr($sql);
    return $multipleRace_list;
}
// id用户参加的单人竞赛
function get_singleRace_by_type($id,$type) {
    global $db;
    if($type == "running"){
        $sql = "SELECT DISTINCT * FROM user_race,pk_race WHERE pk_race.id = user_race.rid AND user_race.uid = '$id' AND pk_race.end_time > datetime('now','localtime') ORDER BY pk_race.end_time ASC";

    }else if($type == "ending"){
        $sql = "SELECT DISTINCT * FROM user_race,Multiple_race WHERE Multiple_race.id = user_race.rid AND user_race.uid = '$id' AND Multiple_race.end_time <=  datetime('now','localtime') ORDER BY Multiple_race.end_time ASC";
    }
    $singlerace_list = $db->execute_dql_arr($sql);
    return $singlerace_list;
}
//id用户参加的多人竞赛
function get_multipleRace_by_type($id,$type){
    global $db;
   if($type == "running"){
       $sql = "SELECT DISTINCT * FROM user_race,pk_race WHERE pk_race.id = user_race.rid AND user_race.uid = '$id' AND pk_race.end_time > datetime('now','localtime') ORDER BY pk_race.end_time ASC";
   }else if($type == "end"){
       $sql = "SELECT DISTINCT * FROM user_race,Multiple_race WHERE Multiple_race.id = user_race.rid AND user_race.uid = '$id' AND Multiple_race.end_time <=  datetime('now','localtime') ORDER BY Multiple_race.end_time ASC";
   }
    $multiplerace_list = $db->execute_dql_arr($sql);
    return $multiplerace_list;
}

function get_race_information($title){
    global $db;
    $sql = "SELECT * FROM pk_race WHERE title = '$title'";
    $information = $db->execute_dql_arr($sql);
    return $information;
}

function get_race_member($title){
    global $db;
    $sql = "SELECT pk_race.id FROM pk_race WHERE pk_race.title = '$title'";
    $res = $db->execute_dql_arr($sql);
    if($res) {
        $id = $res[0]["id"];

    } else {
        $id = "";
    }
    $sql = "SELECT user.avatar FROM  user  WHERE user.id IN (
      SELECT  DISTINCT  user_race.uid  FROM user_race WHERE user_race.rid = '$id'
    ) ";
    $member = $db->execute_dql_arr($sql);
    return $member;
}