<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/2
 * Time: 10:47
 */
require  "../../server/user/user_data.php";
require "../../server/common/user_session.php";
$db = new DB();
$username = get_username();
$id = get_id_by_name($username);

$type = $_POST["type"];

if($type == "person"){
    echo json_encode(get_user_news($id));
}else if($type == "all"){
    echo json_encode(get_all_news());
}else if($type == "following"){
    echo json_encode(get_following_news($id));
}else if($type == "friend"){
    echo json_encode(get_friends_news());
}else if($type == "personal"){
    $name = $_POST["name"];
    $myid = get_id_by_name($name);
    echo json_encode(get_user_news($myid));
}
/**
 * @return array
 * 获取系统所有用户的全部动态
 */
function get_all_news(){
    $response = get_allmoments();
    return $response;
}

/**
 * @param $id
 * @return array
 * 获取特定id的用户的动态
 */
function get_user_news($id){
    $response = get_moments_by_id($id);
    return $response;
}

/**
 * 获得好友的所有动态
 */
function get_friends_news($id){
    global $db;
    $sql = "SELECT u2.level,u2.name,u2.avatar, moments.mdate,moments.content FROM moments,user u2 WHERE moments.uid = u2.id AND moments.uid IN (
SELECT u.id FROM user u,friend f WHERE f.uid = '$id'AND u.name = f.uname )
ORDER BY moments.mdate DESC";
    $response = $db->execute_dql_arr($sql);
    return $response;
}

/**
 * @param $id
 * @return array
 * 获得关注的用户的所有动态
 */
function get_following_news($id){
    global $db;
    $sql = "SELECT u2.level,u2.name,u2.avatar, moments.mdate,moments.content FROM moments,user u2 WHERE moments.uid = u2.id AND moments.uid IN (
SELECT u.id FROM user u,following f WHERE f.uid = '$id'AND u.name = f.uname )
ORDER BY moments.mdate DESC";
    $response =  $db->execute_dql_arr($sql);
    return $response;
}

