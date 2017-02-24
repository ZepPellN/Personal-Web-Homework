<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/29
 * Time: 14:00
 */

require "../../server/common/user_session.php";
require "activity_data.php";

$title = $_POST['title'];
$type = $_POST['type'];

if($type == "info"){
    echo json_encode(activityInformation($title));
}else if($type == "member"){
    echo json_encode(activity_member($title));
}

function activityInformation($title){
    $information = get_activity_information($title);
    return $information;
}

function activity_member($title){
    $member = get_activity_member($title);
    return $member;
}
