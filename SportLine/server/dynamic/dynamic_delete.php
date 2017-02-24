<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/2
 * Time: 10:42
 */
require_once  "../../server/config/db_config.php";
require_once  "../../server/common/DB.class.php";

$m_id = $_POST["m_id"];

$db = new DB();
$sql = <<<EOF
DELETE FROM moments WHERE id = '$m_id';
EOF;
$db->execute_dml($sql);
$response = "Delete successfully";
echo $response;
