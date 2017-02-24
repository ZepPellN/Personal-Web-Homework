<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/13
 * Time: 22:32
 */

require  "../../server/common/DB.class.php";
require  "../../server/common/user_session.php";

$db =  new DB();
$username = get_username();
$key = $_POST["keyword"];
$type = $_POST["type"];
$id = get_id_by_name($username);

$response = find($key,$type);

echo json_encode($response);


function find($key,$type){
    global $db,$id;

    if($type == "all"){
        $sql = "SELECT u.name,u.avatar,u.sex,u.province,u.motto,u.point,u.level FROM user u WHERE  ((u.name LIKE '%$key%') OR (avatar LIKE '%$key%') OR (sex LIKE '%$key%') OR (province LIKE '%$key%') 
        OR (motto LIKE '%$key%') OR (point LIKE '$key') OR ('level' LIKE '$key'))";

        $user_list = $db->execute_dql_arr($sql);
        return $user_list;
    }else if($type == "friend"){

    }else if($type == "follower"){
        $sql = "SELECT u.name,u.avatar,u.sex,u.province,u.motto,u.point,u.level FROM user u,followers f WHERE f.uid = '$id' AND u.name = f.uname
        AND  ((u.name LIKE '%$key%') OR (avatar LIKE '%$key%') OR (sex LIKE '%$key%') OR (province LIKE '%$key%') 
        OR (motto LIKE '%$key%') OR (point LIKE '$key') OR ('level' LIKE '$key'))";
        $user_list = $db->execute_dql_arr($sql);
        return $user_list;
    }else if($type == "following"){
        $sql = "SELECT u.name,u.avatar,u.sex,u.province,u.motto,u.point,u.level FROM user u,following f WHERE f.uid = '$id'AND u.name = f.uname 
        AND  ((u.name LIKE '%$key%') OR (avatar LIKE '%$key%') OR (sex LIKE '%$key%') OR (province LIKE '%$key%') 
        OR (motto LIKE '%$key%') OR (point LIKE '$key') OR ('level' LIKE '$key'))";
        $user_list = $db->execute_dql_arr($sql);
        return $user_list;
    }
}