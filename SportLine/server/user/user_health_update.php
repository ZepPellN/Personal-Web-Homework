<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/30
 * Time: 16:54
 */

require "../../server/common/user_session.php";
require "../../server/user/user_data.php";

$db = new DB();
$height = $_POST["height"];
$weight = $_POST["weight"];
$walking_step = $_POST["walking_step"];
$running_step = $_POST["running_step"];

$username = get_username();
$id = get_id_by_name($username);
update_health($height,$weight,$walking_step,$running_step);
header("Location:../../template/management/Health.php");

function update_health($height,$weight,$walking_step,$running_step){
    global $db,$id,$username;
    $temp = get_last_health_data($username);
    $hr = $temp[0]["hr"];
    $bpl = $temp[0]["bpl"];
    $bph = $temp[0]["bph"];

    $sql = <<<EOF
INSERT INTO user_health(uid,height,weight,walking_step,running_step,hr,bph,bpl) VALUES('$id','$height','$weight','$walking_step','$running_step','$hr','$bph','$bpl');
EOF;
    $db->execute_dml($sql);
}
