<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/3
 * Time: 19:14
 */

require  "../../server/common/DB.class.php";
require  "../../server/common/user_session.php";
$db =  new DB();
$username = get_username();
$key = $_POST["key"];
$race_type = $_POST["type"];
$race_state = $_POST["state"];
$race_own = $_POST["own"];
$level = get_level();
$id = get_id_by_name($username);


$response = "";

if($race_type == "single" && $race_state == "running" && $race_own == "all"){
    $response = find($key,1);
}else if($race_type == "single" && $race_state == "ending" && $race_own == "all"){
    $response = find($key,2);
}else if($race_type == "multiple" && $race_state == "running "&& $race_own == "all"){
    $response = find($key,3);
}else if($race_type == "multiple" && $race_state == "ending" && $race_own == "all"){
    $response = find($key,4);
}else if($race_type == "single" && $race_state == "running" && $race_own == "my"){
    $response = find($key,5);
}else if($race_type == "single" && $race_state == "ending" && $race_own == "my"){
    $response = find($key,6);
}else if($race_type == "multiple" && $race_state == "running" && $race_own == "my"){
    $response = find($key,7);
} else if($race_type == "multiple" && $race_state == "ending" && $race_own == "my"){
    $response = find($key,8);
}
echo json_encode($response);

function find($key,$number){
    global $level,$db,$id;
    if($number == 1){
        $sql = "SELECT * FROM pk_race WHERE end_time > datetime('now', 'localtime') 
        AND  ((title LIKE '%$key%') OR (place LIKE '%$key%') OR (level LIKE '%$key%') OR (info LIKE '%$key%') OR (sponsor LIKE '%$key%'))
         ORDER BY end_time ASC";
        $race_list = $db->execute_dql_arr($sql);
        return $race_list;
        //'level' <= '$level'AND
    }else if($number == 2){
        $sql = "SELECT * FROM pk_race WHERE end_time <= datetime('now', 'localtime') 
        AND  ((title LIKE '%$key%') OR (place LIKE '%$key%') OR (level LIKE '%$key%') OR (info LIKE '%$key%') OR (sponsor LIKE '%$key%'))
         ORDER BY end_time ASC";
        $race_list = $db->execute_dql_arr($sql);
        return $race_list;
    }else if($number == 3){
        $sql = "SELECT * FROM multiple_race WHERE end_time > datetime('now', 'localtime') 
        AND  ((title LIKE '%$key%') OR (place LIKE '%$key%') OR (level LIKE '%$key%') OR (info LIKE '%$key%') OR (sponsor LIKE '%$key%'))
         ORDER BY end_time ASC";
        $race_list = $db->execute_dql_arr($sql);
        return $race_list;
    }else if($number == 4){
        $sql = "SELECT * FROM multiple_race WHERE end_time <= datetime('now', 'localtime') 
        AND  ((title LIKE '%$key%') OR (place LIKE '%$key%') OR (level LIKE '%$key%') OR (info LIKE '%$key%') OR (sponsor LIKE '%$key%'))
         ORDER BY end_time ASC";
        $race_list = $db->execute_dql_arr($sql);
        return $race_list;
    }else if($number == 5){
        $sql = "SELECT DISTINCT * FROM user_race,pk_race WHERE pk_race.id = user_race.rid 
                AND user_race.uid = '$id' AND pk_race.end_time > datetime('now','localtime') 
                AND ((title LIKE '%$key%') OR (place LIKE '%$key%') OR (level LIKE '%$key%') OR (info LIKE '%$key%') OR (sponsor LIKE '%$key%'))
                ORDER BY pk_race.end_time ASC";
        $race_list = $db->execute_dql_arr($sql);
        return $race_list;
    }else if($number == 6){
        $sql = "SELECT DISTINCT * FROM user_race,pk_race WHERE  pk_race.id = user_race.rid 
                AND user_race.uid = '$id' AND pk_race.end_time <= datetime('now','localtime') 
                AND ((title LIKE '%$key%') OR (place LIKE '%$key%') OR (level LIKE '%$key%') OR (info LIKE '%$key%') OR (sponsor LIKE '%$key%'))
                ORDER BY pk_race.end_time ASC";
        $race_list = $db->execute_dql_arr($sql);
        return $race_list;
    }else if($number == 7){
        $sql = "SELECT DISTINCT * FROM user_race,multiple_race WHERE pk_race.id = user_race.rid 
                AND user_race.uid = '$id' AND race.end_time <= datetime('now','localtime') 
                AND ((title LIKE '%$key%') OR (place LIKE '%$key%') OR (level LIKE '%$key%') OR (info LIKE '%$key%') OR (sponsor LIKE '%$key%'))
                ORDER BY race.end_time ASC";
        $race_list = $db->execute_dql_arr($sql);
        return $race_list;
    }else if($number== 8){
        $sql = "SELECT DISTINCT * FROM user_race,multiple_race WHERE pk_race.id = user_race.rid 
                AND user_race.uid = '$id' AND race.end_time > datetime('now','localtime') 
                AND ((title LIKE '%$key%') OR (place LIKE '%$key%') OR (level LIKE '%$key%') OR (info LIKE '%$key%') OR (sponsor LIKE '%$key%'))
                ORDER BY race.end_time ASC";
        $race_list = $db->execute_dql_arr($sql);
        return $race_list;
    }
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

function get_level(){
    global $username;
    global $db;
    $sql = <<<EOF
SELECT user.level FROM user WHERE user.name = '$username';
EOF;
    $level = $db->execute_dql($sql);
    return $level;
}