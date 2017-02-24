<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/3
 * Time: 16:18
 */

require "user_data.php";
require "../../server/common/user_session.php";

$db = new DB();
$username = get_username();
$id = get_id_by_name($username);
$type = $_POST["type"];
$name = $_POST["name"];

if($type == "follow"){
    add_following();
}else if($type == "unfollow"){
    delete_following();
}

function add_following(){
    global $db,$username,$id,$name;
    $fid = get_id_by_name($name);
    $sql = <<<EOF
INSERT INTO following VALUES ('$id','$name');
EOF;
    $db->execute_dml($sql);
    $sql = <<<EOF
INSERT INTO  followers VALUES('$fid','$username');
EOF;
    $db->execute_dml($sql);
    echo "follow success";
}

function delete_following(){
    global $db,$username,$id,$name;
    $fid = get_id_by_name($name);
    $sql = <<<EOF
DELETE FROM following WHERE following.uid = '$id' AND following.uname = '$name';
EOF;
    $db->execute_dml($sql);
    $sql = <<<EOF
DELETE FROM followers WHERE followers.uid = '$fid' AND followers.uname = '$username';
EOF;
    $db->execute_dml($sql);

    echo "unfollow success";
}

function add_run_data($createtime,$distance,$time,$step,$calorie){
    global $db,$id;
    $sql = <<<EOF
INSERT INTO user_sport VALUES( '$id','$createtime','$distance','$time','$step','$calorie');
EOF;
    $db->execute_dql($sql);
    $sql = <<<EOF
UPDATE user SET week_distance = week_distance +  '$distance',week_time = week_time + '$time,
week_step = week_step + '$step',week_calorie = week_calorie + '$calorie';
EOF;
    $db->execute_dql($sql);
    $sql = <<<EOF
UPDATE user SET run_distance = run_distance +  '$distance',run_time = run_time + '$time,
run_step = run_step + '$step',run_calorie = run_calorie + '$calorie';
EOF;
    $db->execute_dql($sql);
}

function update_goal($type,$distance,$time,$step,$calorie){
    global $db,$id;
    if($type == "today"){
        $sql = <<<EOF
        UPDATE user SET today_goal_distance = '$distance',today_goal_time = '$time',
        today_goal_step = '$step',today_goal_calorie = '$calorie' WHERE id = '$id';
EOF;
    }else if($type == "week"){
        $sql = <<<EOF
        UPDATE user SET week_goal_distance = '$distance',week_goal_time = '$time',
        week_goal_step = '$step',week_goal_calorie = '$calorie' WHERE id = '$id';
EOF;
    }else if($type == "total"){
        $sql = <<<EOF
        UPDATE user SET total_goal_distance = '$distance',total_goal_time = '$time',
        total_goal_step = '$step',total_goal_calorie = '$calorie' WHERE id = '$id';
EOF;
    }
    $db->execute_dml($sql);
    $response = "Update successfully!";
    return $response;
}
