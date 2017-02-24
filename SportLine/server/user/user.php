<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/2
 * Time: 16:02
 */
require  "../../server/common/user_session.php";
require  "../../server/common/common.php";
require  "user_data.php";

$username = get_username();
$avatar = get_avatar();
$id = get_id_by_name($username);

$type = $_POST["type"];
if($type == "all"){
    echo json_encode(join_ac($id));
}else if($type == "following"){
    echo json_encode(get_followings($id));
}else if($type == "follower"){
    echo json_encode(get_follower($id));
}else if($type == "friend"){
    echo json_encode(get_friend($id));
}else if($type == "health"){
    echo json_encode(get_last_health_data($username));
}else if($type == "height"){
    echo json_encode(get_height_data($username));
}else if($type == "weight"){
    echo json_encode(get_weight_data($username));
}else if($type == "bp"){
    echo json_encode(get_bp_data($username));
}else if($type == "hr"){
    echo json_encode(get_hr_data($username));
}else if($type == "day"){
    $goal = $_POST["goal"];
    if($goal == "goal"){
        echo json_encode(get_today_goal($id));
    }else if($goal == "data"){
        echo json_encode(get_today_sport_data($username));
    }
}else if($type == "week"){
    $goal = $_POST["goal"];
    if($goal == "goal"){
        echo json_encode(get_week_goal($id));
    }else if($goal == "data"){
        echo json_encode(get_week_sport_data($username));
    }
}else if($type == "total"){
    $goal = $_POST["goal"];
    if($goal == "goal"){
        echo json_encode(get_total_goal($id));
    }else if($goal == "data"){
        echo json_encode(get_total_sport_data($username));
    }
}else if($type == "distance"){
    $state = $_POST["state"];
    if($state == "week"){
        echo json_encode(get_distance_data_week($username));
    }else if($state == "total"){
        echo json_encode(get_distance_data_total($username));
    }
}else if($type == "time"){
    $state = $_POST["state"];
    if($state == "week"){
        echo json_encode(get_time_data_week($username));
    }else if($state == "total"){
        echo json_encode(get_time_data_total($username));
    }
}else if($type == "step"){
    $state = $_POST["state"];
    if($state == "week"){
        echo json_encode(get_step_data_week($username));
    }else if($state == "total"){
        echo json_encode(get_step_data_total($username));
    }
}else if($type == "calorie") {
    $state = $_POST["state"];
    if ($state == "week") {
        echo json_encode(get_calorie_data_week($username));
    } else if ($state == "total") {
        echo json_encode(get_calorie_data_total($username));
    }
}else if($type == "info"){
    echo json_encode(get_info($id));
}else if($type == "userinfo"){
    $name = $_POST["name"];
    $myid = get_id_by_name($name);
    echo json_encode(get_info($myid));
}


function get_all_users($id){
    $all_user = get_all_user($id);
    return $all_user;
}
function get_info($id){
    $user_info = get_user_info($id);
    return $user_info;
}

function get_friend($id){
    $user_friends = get_friends($id);
    $len = count($user_friends);
    for($i = 0;$i < $len; $i++){
        $user_friends[$i]["sign"] = 1;
    }
    return $user_friends;
}

function get_followings($id){
    $user_following = get_following($id);
    $len = count($user_following);
    for($i = 0;$i < $len; $i++){
        $user_following[$i]["sign"] = 1;
    }
    return $user_following;
}

function get_follower($id){
    $user_followers = get_followers($id);
    $len = count($user_followers);
    for($i = 0;$i < $len; $i++){
        $user_followers[$i]["sign"] = 0;
    }
    return $user_followers;
}
function join_ac($id){
    $all_user = get_all_user($id);
    $user_following = get_following($id);
    $user_friend = get_friend($id);
    $len_all = count($all_user);
    $len_my = count($user_following);
    $len_friend = count($user_friend);
    for($i = 0;$i < $len_all;$i++){
        $all_user[$i]["sign"] = 0; //未参加
        for($j = 0;$j < $len_my; $j++){
            $ac_all = $all_user[$i];
            $ac_my = $user_following[$j];
            if($ac_all["id"] == $ac_my["id"]){
                $all_user[$i]["sign"] = 1;//关注关系
            }
        }

        for($k = 0;$k < $len_friend; $k++){
            $ac_all = $all_user[$i];
            $ac_friend = $user_friend[$k];
            if($ac_all["id"] == $ac_friend["id"]){
                $all_user[$i]["sign"] = 1;// 好友关系
            }
        }
    }
    return $all_user;
}
//$today_health = get_today_health_data();
//$today_sport = get_today_sport_data();
//$recent_health = get_recent_health_data($day);
//$recent_sport = get_recent_sport_data($day);
//
//$user_rank = get_user_orderby($key,$max);
