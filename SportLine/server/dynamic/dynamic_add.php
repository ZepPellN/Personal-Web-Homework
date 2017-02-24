<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/2
 * Time: 10:37
 */
require "../../server/common/DB.class.php";
require "../../server/common/user_session.php";

$username = get_username();
$info = $_POST["info"];

$db = new DB();
$id = get_id_by_name($username);
$sql = <<<EOF
INSERT INTO moments(uid,content) VALUES ('$id','$info');
EOF;
$db->execute_dml($sql);
$response = "Add successfully!";
echo $response;
header("Location:../../template/dynamic/All Dynamic.php");
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