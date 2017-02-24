<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/3
 * Time: 16:34
 */

require  "DB.class.php";
require  "user_session.php";
require  "../../server/config/db_config.php";

$username = get_username();

$level_0 = 0;
$level_1 = 100;
$level_2 = 250;
$level_3 = 500;
$level_4 = 800;
$level_5 = 2000;

$db = new DB();
$level = check_level($username);
$sql = <<<EOF
UPDATE user SET level = $level WHERE user.name = $username;
EOF;
$db->execute_dml($sql);
echo "$level";

function check_level($username){
    $db = new DB();
    $sql =  <<<EOF
SELECT user.point FROM user WHERE user.name = '$username';
EOF;
    $res = $db->execute_dql_arr($sql);
    $level = $res[0];

    if($level >= 0 && $level < 100){
        return 0;
    }else if($level >= 100 && $level < 250){
        return 1;
    }else if($level >= 250 && $level < 500){
        return 2;
    }else if($level >= 500 && $level < 800){
        return 3;
    }else if($level >= 800 && $level < 2000){
        return 4;
    }else{
        return 5;
    }
}

