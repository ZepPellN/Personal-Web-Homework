<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/29
 * Time: 21:16
 */
require "../../server/common/user_session.php";
require "race_data.php";
$title = $_POST['title'];
$type = $_POST['type'];

if($type == "info"){
    echo json_encode(raceInformation($title));
}else if($type == "member"){
    echo json_encode(race_member($title));
}

function raceInformation($title){
    $information = get_race_information($title);
    return $information;
}

function race_member($title){
    $member = get_race_member($title);
    return $member;
}