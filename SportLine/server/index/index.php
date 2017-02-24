<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/3
 * Time: 22:10
 */

require "../../server/user/user_data.php";
require "../../server/common/user_session.php";

$username = get_username();
$id = get_id_by_name($username);
$day = $_POST['day'];

function get_total_run(){
    global $id;
    $response = get_total_run($id);
    return $response;
}

function get_week_run(){
    global $id;
    $response = get_week_run($id);
    return $response;
}

function get_today_run(){
    $response = get_today_sport_data();
    return $response;
}

function get_total_goal(){
    global $id;
    $response = get_total_goal($id);
    return $response;
}

function get_week_goal(){
    global $id;
    $response = get_week_goal($id);
    return $response;
}

function get_today_goal(){
    global $id;
    $response = get_today_goal($id);
    return $response;
}

function get_recent_run(){
    global $day;
    $response = get_recent_sport_data($day);
    return $response;
}
function get_run(){
    $response = get_today_sport_data();
    return $response;
}
function get_health(){
    $response = get_today_health_data();
    return $response;
}

function get_recent_health(){
    global $day;
    $response = get_recent_health_data($day);
    return $response;
}

function get_week_run_data(){
    $response = get_week_run_data();
    return $response;
}

function get_week_health(){
    $response = get_week_health_data();
    return $response;
}

function get_all_rank($time){
    global $day;
    $response = get_all_rank($day);
    return $response;
}

function get_friend_rend($time){
    global $day;
    $response = get_friends_rank($time);
    return $response;
}