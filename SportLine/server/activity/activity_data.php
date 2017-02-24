<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/1
 * Time: 9:29
 */

require "../../server/common/DB.class.php";

$db = new DB();

// 全部未过期活动
function get_activity_list($level) {
    global $db;
    $sql = "SELECT * FROM activity WHERE end_time > datetime('now', 'localtime') 
            ORDER BY end_time ASC";
    //AND 'level' <= '$level'
    $activity_list = $db->execute_dql_arr($sql);
    return $activity_list;
}
//历史活动
function get_history_list() {
    global $db;
    $sql = "SELECT * FROM activity WHERE end_time <= datetime('now', 'localtime')
            ORDER BY end_time ASC";
    $history_act = $db->execute_dql_arr($sql);
    return $history_act;
}

/**
 * 单个活动详情
 */

function get_activity_information($title){
    global $db;
    $sql = "SELECT * FROM activity WHERE title = '$title'";
    $information = $db->execute_dql_arr($sql);
    return $information;
}

function get_activity_member($title){
    global $db;
    $sql = "SELECT activity.id FROM activity WHERE activity.title = '$title'";
    $res = $db->execute_dql_arr($sql);
    if($res) {
        $id = $res[0]["id"];

    } else {
       $id = "";
    }
    $sql = "SELECT user.avatar FROM  user  WHERE user.id IN (
      SELECT  DISTINCT  user_activity.uid  FROM user_activity WHERE user_activity.aid = '$id'
    ) ";
    $member = $db->execute_dql_arr($sql);
    return $member;
}
/**
 * @param $id
 * @return array
 * 用户参与的所有活动
 */
function get_activity_by_id($name){
    global $db;
    $id = get_id_by_name($name);
    $sql = "SELECT DISTINCT * FROM user_activity,activity WHERE activity.id = user_activity.aid 
            AND user_activity.uid = '$id' AND activity.end_time > datetime('now','localtime')
            ORDER BY activity.end_time ASC";
    $activity_list = $db->execute_dql_arr($sql);
    return $activity_list;
}

function get_activity_by_id_history($name){
    global $db;
    $id = get_id_by_name($name);
    $sql = "SELECT DISTINCT * FROM user_activity,activity WHERE activity.id = user_activity.aid 
            AND user_activity.uid = '$id' AND activity.end_time <= datetime('now','localtime')
            ORDER BY activity.end_time ASC";
    $activity_list = $db->execute_dql_arr($sql);
    return $activity_list;
}

/**
 * @param $id
 * @param $type
 * @return array
 * 用户参与的正在进行或过期活动
 */

//function get_activity_by_type($name,$type) {
//    global $db;
//    $id = get_id_by_name($name);
//    $sql = "";
//    if($type == "running"){
//        $sql = "SELECT DISTINCT * FROM user_activity,activity WHERE activity.id = user_activity.aid
//                AND user_activity.uid = '$id' AND activity.end_time > datetime('now','localtime')
//                ORDER BY activity.end_time ASC";
//
//    }else if($type == "ending"){
//        $sql = "SELECT DISTINCT * FROM user_activity,activity WHERE activity.id = user_activity.aid
//                AND user_activity.uid = '$id' AND activity.end_time <=  datetime('now','localtime')
//                ORDER BY activity.end_time ASC";
//    }
//    $activity_list = $db->execute_dql_arr($sql);
//    return $activity_list;
//}

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
