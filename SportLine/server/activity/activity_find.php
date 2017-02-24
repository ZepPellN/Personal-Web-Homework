<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/3
 * Time: 17:19
 */
require  "../../server/common/DB.class.php";
require  "../../server/common/user_session.php";

$db =  new DB();
$username = get_username();
$key = $_POST["key"];
$activity_type = $_POST["state"];
$activity_own = $_POST["type"];
$level = get_level();
$id = get_id_by_name($username);
$response = "";

if($activity_own == "all" && $activity_type == "running"){//id为1
    $response = find($key,1);
}else if($activity_own == "all" && $activity_type == "ending"){//id为2
    $response = find($key,2);
}else if($activity_own == "my" && $activity_type == "running"){//id为3
    $response = find($key,3);
}else if($activity_own == "my" && $activity_type == "ending"){//id为4
    $response = find($key,4);
}
echo json_encode($response);

function find($key,$number){
    global $level,$db,$id;
    if($number == 1){
        $sql = "SELECT * FROM activity WHERE end_time > datetime('now', 'localtime') 
        AND ((title LIKE '%$key%') OR (place LIKE '%$key%') OR (level LIKE '%$key%') OR (info LIKE '%$key%') OR (sponsor LIKE '%$key%'))
         ORDER BY end_time ASC";
        //AND activity.level <= '$level'
        $activity_list = $db->execute_dql_arr($sql);
        return $activity_list;
    }else if($number == 2) {
        $sql = "SELECT * FROM activity WHERE end_time < datetime('now', 'localtime') 
        AND ((title LIKE '%$key%') OR (place LIKE '%$key%') OR (level LIKE '%$key%') OR (info LIKE '%$key%') OR (sponsor LIKE '%$key%'))
         ORDER BY end_time ASC";
        //AND level <= '$level'
        $activity_list = $db->execute_dql_arr($sql);
        return $activity_list;
    }else if($number == 3){
        $sql = "SELECT DISTINCT * FROM user_activity,activity WHERE activity.id = user_activity.aid 
                AND user_activity.uid = '$id' AND activity.end_time > datetime('now','localtime') 
                AND ((title LIKE '%$key%') OR (place LIKE '%$key%') OR (level LIKE '%$key%') OR (info LIKE '%$key%') OR (sponsor LIKE '%$key%'))
                ORDER BY activity.end_time ASC";
        $activity_list = $db->execute_dql_arr($sql);
        return $activity_list;
    }else if($number == 4){
        $sql = "SELECT DISTINCT * FROM user_activity,activity WHERE activity.id = user_activity.aid 
                AND user_activity.uid = '$id' AND activity.end_time < datetime('now','localtime') 
                AND ((title LIKE '%$key%') OR (place LIKE '%$key%') OR (level LIKE '%$key%') OR (info LIKE '%$key%') OR (sponsor LIKE '%$key%'))
                ORDER BY activity.end_time ASC";
        $activity_list = $db->execute_dql_arr($sql);
        return $activity_list;
    }
}
function get_level(){
    global $username;
    global $db;
    $sql = <<<EOF
SELECT user.level FROM user WHERE user.name = '$username';
EOF;
    $level = $db->execute_dql($sql);
    return $level;
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