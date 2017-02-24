<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/1
 * Time: 23:33
 */
require_once  "../../server/common/user_session.php";
require_once  "../../server/common/common.php";
require_once  "race_data.php";

$username = get_username();
$avatar = get_avatar();
$type = $_POST["type"];
$state = $_POST["state"];
$own = $_POST["own"];
$level = get_level();

if($type == "single" && $state == "running" && $own == "all"){
    echo json_encode(join_sign());
}else if($type == "multiple" && $state == "running" && $own == "all"){
    echo json_encode(show_multiple($level));
}else if($state == "ending" && $own == "all"){
    echo json_encode(get_history($type));
}else if($type == "single" && $state == "running" && $own == "my"){
    echo json_encode(my_participate($type));
}else if($type == "single" && $state == "ending" && $own == "my"){
    echo json_encode(my_participate($type));
}

function show_single($level){
    $singleRace_list = get_singleRace_list($level);
    return $singleRace_list;
}

function show_multiple($level){
    $multipleRace_list = get_multipleRace_list($level);
    return $multipleRace_list;
}

function get_history($type){
    if($type == "single"){
        $response = get_history_single_list();
    }else{
        $response = get_history_multiple_list();
    }
    return $response;
}

function my_participate($type){
    global $username,$state;
    $id = get_id_by_name($username);
    if($type == "single"){
        $response = get_singleRace_by_type($id,$state);
    }else{
        $response = get_multipleRace_by_type($id,$state);
    }
    return $response;
}

//标记用户参与的竞赛
function join_sign(){
    global $level,$type;
    $race_list = show_single($level);
    $user_race = my_participate($type);
    $len_all = count($race_list);
    $len_my = count($user_race);
    for($i = 0;$i < $len_all;$i++){
        $race_list[$i]["sign"] = 0; //未参加
        for($j = 0;$j < $len_my; $j++){
            $race_all = $race_list[$i];
            $race_my = $user_race[$j];
            if($race_all["id"] == $race_my["id"]){
                $race_list[$i]["sign"] = 1;//用户参与了这个活动
            }
        }
    }
    return $race_list;
}
function get_level(){
    global $username;
    $db = new DB();
    $sql = <<<EOF
SELECT user.level FROM user WHERE user.name = '$username';
EOF;
    $level = $db->execute_dql($sql);
    return $level;
}

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