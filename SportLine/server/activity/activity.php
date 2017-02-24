<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/1
 * Time: 14:51
 */
require  "activity_data.php";
require  "../../server/common/user_session.php";

$username = get_username();
$avatar = get_avatar();
$type = $_POST["type"];
$state = $_POST["state"];
$level = get_level();

if($type == "all" && $state == "running"){
    echo json_encode(participate());
}else if($type == "all" && $state == "ending"){
    echo json_encode(participate_history());
}else if($type == "my" && $state == "running"){
    echo json_encode(my_participate($username));
}else if($type == "my" && $state == "ending"){
    echo json_encode(my_participate_history($username));
}

function show($level){
    $activity_list = get_activity_list($level);
    return $activity_list;
}

function get_history(){
    $history_act = get_history_list();
    return $history_act;
}

function my_participate($username){
    $user_activity = get_activity_by_id($username);
    return $user_activity;
}

function my_participate_history($username){
    $user_activity = get_activity_by_id_history($username);
    return $user_activity;
}

//标记用户参与的活动
function participate(){
    global $level,$username;
    $activity_list = get_activity_list($level);
    $user_activity = get_activity_by_id($username);
    $len_all = count($activity_list);
    $len_my = count($user_activity);
    for($i = 0;$i < $len_all;$i++){
        $activity_list[$i]["sign"] = 0; //未参加
        for($j = 0;$j < $len_my; $j++){
            $ac_all = $activity_list[$i];
            $ac_my = $user_activity[$j];
            if($ac_all["id"] == $ac_my["id"]){
                $activity_list[$i]["sign"] = 1;//用户参与了这个活动
            }
        }
    }
    return $activity_list;
}

function participate_history(){
    global $level,$username;
    $activity_list = get_history_list();
    $user_activity = get_activity_by_id_history($username);
    $len_all = count($activity_list);
    $len_my = count($user_activity);
    for($i = 0;$i < $len_all;$i++){
        $activity_list[$i]["sign"] = 0; //未参加
        for($j = 0;$j < $len_my; $j++){
            $ac_all = $activity_list[$i];
            $ac_my = $user_activity[$j];
            if($ac_all["id"] == $ac_my["id"]){
                $activity_list[$i]["sign"] = 1;//用户参与了这个活动
            }
        }
    }
    return $activity_list;
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