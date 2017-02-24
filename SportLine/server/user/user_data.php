<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/11/2
 * Time: 10:49
 */
require  "../../server/common/DB.class.php";

$db = new DB();
/**
 * @return array
 * 获得用户当日的健康指数数据
 */
function get_last_health_data($username){
    global $db;
    $id = get_id_by_name($username);
    $sql = "SELECT * FROM user_health WHERE user_health.uid = '$id'
    ORDER BY user_health.create_date  DESC LIMIT 1 OFFSET 0";
    $last_health_record = $db->execute_dql_arr($sql);
    $h = $last_health_record[0]["height"];
    $w = $last_health_record[0]["weight"];
    $last_health_record[0]["bmi"] = number_format($w * 1.0 / ($h * $h /10000),2,'.','');
    $last_health_record[0]["standard_weight"] = number_format(($h-100) * 0.9,2,'.','');
    return $last_health_record;
}

/**
 * @return array
 * 获得用户当日的运动数据
 */
function get_today_sport_data($username){
    global $db;
    $distance = 0;
    $time = 0;
    $calorie = 0;
    $step = 0;

    $id = get_id_by_name($username);
    $sql = "SELECT * FROM user_sport WHERE user_sport.uid = '$id' 
    AND (user_sport.create_date BETWEEN datetime('now','start of day') AND datetime('now','localtime')) ";
    $res = $db->execute_dql_arr($sql);
    $res2 = get_today_goal($id);
    foreach($res as $tmp){
        $distance += $tmp['run_distance'];
        $time += $tmp['run_time'];
        $step += $tmp['run_step'];
        $calorie += $tmp['run_calorie'];
    }
    $distancePercentage = $distance / $res2[0]['distance'] * 100;
    $timePercentage = $time / $res2[0]['time'] * 100;
    $caloriePercentage = $calorie / $res2[0]['calorie'] * 100;
    $stepPercentage = $step / $res2[0]['step'] * 100;

    $result = array();
    $result[0]['distance'] = $distance;
    $result[0]['step'] = $step;
    $result[0]['calorie'] = $calorie;
    $result[0]['time'] = $time;
    $result[0]['dp'] = $distancePercentage;
    $result[0]['tp'] = $timePercentage;
    $result[0]['cp'] = $caloriePercentage;
    $result[0]['sp'] = $stepPercentage;
    return $result;
}

function get_week_sport_data($username){
    global $db;
    $distance = 0;
    $time = 0;
    $calorie = 0;
    $step = 0;

    $id = get_id_by_name($username);
    $sql = "SELECT * FROM user_sport WHERE user_sport.uid = '$id' 
    AND (user_sport.create_date BETWEEN datetime('now','-7 day') AND datetime('now','localtime')) ";
    $res = $db->execute_dql_arr($sql);
    $res2 = get_week_goal($id);
    foreach($res as $tmp){
        $distance += $tmp['run_distance'];
        $time += $tmp['run_time'];
        $step += $tmp['run_step'];
        $calorie += $tmp['run_calorie'];
    }
    $distancePercentage = $distance / $res2[0]['distance'] * 100;
    $timePercentage = $time / $res2[0]['time'] * 100;
    $caloriePercentage = $calorie / $res2[0]['calorie'] * 100;
    $stepPercentage = $step / $res2[0]['step'] * 100;

    $result = array();
    $result[0]['distance'] = $distance;
    $result[0]['step'] = $step;
    $result[0]['calorie'] = $calorie;
    $result[0]['time'] = $time;
    $result[0]['dp'] = $distancePercentage;
    $result[0]['tp'] = $timePercentage;
    $result[0]['cp'] = $caloriePercentage;
    $result[0]['sp'] = $stepPercentage;
    return $result;
}

function get_total_sport_data($username){
    global $db;

    $id = get_id_by_name($username);
    $sql = <<<EOF
SELECT  run_distance,run_time,run_step,run_calorie FROM user WHERE id = "$id";
EOF;
    $res = $db->execute_dql_arr($sql);
    $res2 = get_total_goal($id);
    $total_run = array();
    $total_run[0]['distance'] = $res[0]["run_distance"];
    $total_run[0]["time"] = $res[0]["run_time"];
    $total_run[0]["step"] = $res[0]["run_step"];
    $total_run[0]["calorie"] = $res[0]["run_calorie"];
    $total_run[0]["dp"] = $res[0]["run_distance"] / $res2[0]["distance"] * 100;
    $total_run[0]["tp"] = $res[0]["run_time"] / $res2[0]["time"] * 100;
    $total_run[0]["sp"] = $res[0]["run_step"] / $res2[0]["step"] * 100;
    $total_run[0]["cp"] = $res[0]["run_calorie"] / $res2[0]["calorie"] * 100;

    return $total_run;
}
/**
 * @param $day
 * @return array
 * 获得用户最近一段时间的健康数据
 */
function get_height_data($username){
    global $db;
    $id = get_id_by_name($username);
    $sql = "SELECT user_health.height,user_health.create_date FROM user_health WHERE user_health.uid = '$id'
    ORDER BY user_health.create_date  DESC LIMIT 7 OFFSET 0";
    $last_health_record = $db->execute_dql_arr($sql);
    return $last_health_record;
}

function get_weight_data($username){
    global $db;
    $id = get_id_by_name($username);
    $sql = "SELECT user_health.weight,user_health.create_date FROM user_health WHERE user_health.uid = '$id'
    ORDER BY user_health.create_date  DESC LIMIT 7 OFFSET 0";
    $last_health_record = $db->execute_dql_arr($sql);
    return $last_health_record;
}

function get_bp_data($username){
    global $db;
    $id = get_id_by_name($username);
    $sql = "SELECT user_health.bpl,user_health.bph,user_health.create_date FROM user_health WHERE user_health.uid = '$id'
    ORDER BY user_health.create_date  DESC LIMIT 7 OFFSET 0";
    $last_health_record = $db->execute_dql_arr($sql);
    return $last_health_record;
}

function get_hr_data($username){
    global $db;
    $id = get_id_by_name($username);
    $sql = "SELECT user_health.hr,user_health.create_date FROM user_health WHERE user_health.uid = '$id'
    ORDER BY user_health.create_date  DESC LIMIT 7 OFFSET 0";
    $last_health_record = $db->execute_dql_arr($sql);
    return $last_health_record;
}

function get_today_goal($id){
    global $db;
    $sql = "SELECT * FROM day_goal WHERE day_goal.uid = '$id'
        ORDER BY day_goal.create_date  DESC LIMIT 1 OFFSET 0";
    $today_goal = $db->execute_dql_arr($sql);

    return $today_goal;
}

function get_week_goal($id){
    global $db;
    $sql = "SELECT * FROM week_goal WHERE week_goal.uid = '$id'
        ORDER BY week_goal.create_date  DESC LIMIT 1 OFFSET 0";
    $week_goal = $db->execute_dql_arr($sql);
    return $week_goal;
}

function get_total_goal($id){
    global $db;
    $sql = <<<EOF
    SELECT total_goal_distance,total_goal_time,total_goal_step,total_goal_calorie FROM user WHERE id = "$id";
EOF;
    $res = $db->execute_dql_arr($sql);
    $total_goal = array();
    $total_goal[0]['distance'] = $res[0]['total_goal_distance'];
    $total_goal[0]['time'] = $res[0]['total_goal_time'];
    $total_goal[0]['step'] = $res[0]['total_goal_step'];
    $total_goal[0]['calorie'] = $res[0]['total_goal_calorie'];
    return $total_goal;
}

function get_distance_data_week($username){
    global $db;
    $id = get_id_by_name($username);
        $sql = "SELECT user_sport.run_distance,user_sport.create_date FROM user_sport WHERE user_sport.uid = '$id' AND
        (user_sport.create_date BETWEEN datetime('now','-7 day') AND datetime('now','localtime'))
         ORDER BY user_sport.create_date  DESC";
        $result = $db->execute_dql_arr($sql);
        return $result;
}

function get_distance_data_total($username){
    global $db;
    $id = get_id_by_name($username);
    $sql = "SELECT user_sport.run_distance,user_sport.create_date FROM user_sport WHERE user_sport.uid = '$id' ORDER BY user_sport.create_date  DESC";
    $result = $db->execute_dql_arr($sql);
    return $result;
}

function get_step_data_week($username){
    global $db;
    $id = get_id_by_name($username);
    $sql = "SELECT user_sport.run_step,user_sport.create_date FROM user_sport WHERE user_sport.uid = '$id' AND
        (user_sport.create_date BETWEEN datetime('now','-7 day') AND datetime('now','localtime'))   ORDER BY user_sport.create_date  DESC ";
    $result = $db->execute_dql_arr($sql);
    return $result;
}
function get_step_data_total($username){
    global $db;
    $id = get_id_by_name($username);
    $sql = "SELECT user_sport.run_step,user_sport.create_date FROM user_sport WHERE user_sport.uid = '$id'  ORDER BY user_sport.create_date  DESC";
    $result = $db->execute_dql_arr($sql);
    return $result;
}

function get_time_data_week($username){
    global $db;
    $id = get_id_by_name($username);
    $sql = "SELECT user_sport.run_time,user_sport.create_date FROM user_sport WHERE user_sport.uid = '$id' AND
        (user_sport.create_date BETWEEN datetime('now','-7 day') AND datetime('now','localtime'))   ORDER BY user_sport.create_date  DESC";
    $result = $db->execute_dql_arr($sql);
    return $result;
}

function get_time_data_total($username){
    global $db;
    $id = get_id_by_name($username);
    $sql = "SELECT user_sport.run_time,user_sport.create_date FROM user_sport WHERE user_sport.uid = '$id'  ORDER BY user_sport.create_date  DESC";
    $result = $db->execute_dql_arr($sql);
    return $result;
}

function get_calorie_data_week($username){
    global $db;
    $id = get_id_by_name($username);
    $sql = "SELECT user_sport.run_calorie,user_sport.create_date FROM user_sport WHERE user_sport.uid = '$id' AND
        (user_sport.create_date BETWEEN datetime('now','-7 day') AND datetime('now','localtime')) ";
    $result = $db->execute_dql_arr($sql);
    return $result;
}

function get_calorie_data_total($username){
    global $db;
    $id = get_id_by_name($username);
    $sql = "SELECT user_sport.run_calorie,user_sport.create_date FROM user_sport WHERE user_sport.uid = '$id'";
    $result = $db->execute_dql_arr($sql);
    return $result;
}
/**
 * @return array
 * 获得系统用户的所有动态
 */
function get_allmoments() {
    global $db;
    $sql = "SELECT u.level,u.name,u.avatar, m.mdate,m.content FROM moments m, user u WHERE m.uid = u.id ORDER BY m.mdate DESC";
    $res = $db->execute_dql_arr($sql);
    return $res;
}

/**
 * @param $id
 * @return array
 * 获得某个用户的所有动态
 */
function get_moments_by_id($id) {
    global $db;
    $sql = "SELECT u.level,u.name,u.avatar, m.mdate,m.content FROM moments m, user u WHERE m.uid = u.id AND m.uid = '$id' ORDER BY m.mdate DESC";
    $res = $db->execute_dql_arr($sql);
    return $res;
}

/**
 * @return array
 * 获得所有用户列表
 */
function get_all_user($id){
    global $db;
    $sql = "SELECT u.name,u.province,u.level,u.point,u.sex,u.motto,u.avatar,u.id FROM user u WHERE u.id <> '$id'";
    $res = $db->execute_dql_arr($sql);
    return $res;
}

/**
 * @param $id
 * @return array
 * 获得用户的所有关注用户
 */
function get_following($id){
    global $db;
    $sql = <<<EOF
SELECT u.name,u.province,u.level,u.point,u.sex,u.motto,u.avatar,u.id FROM user u,following f WHERE f.uid = '$id'AND u.name = f.uname;
EOF;
    $res = $db->execute_dql_arr($sql);
    return $res;
}

/**
 * @param $id
 * @return array
 * 获得用户的所有粉丝
 */
function get_followers($id){
    global $db;
    $sql = <<<EOF
SELECT u.name,u.province,u.level,u.point,u.sex,u.motto,u.avatar,u.id  FROM user u,followers f WHERE f.uid = '$id' AND u.name = f.uname;
EOF;
    $res = $db->execute_dql_arr($sql);
    return $res;
}

/**
 * 获得用户的所有好友
 */
function get_friends($id){
    global $db;
    $sql = <<<EOF
SELECT u.name,u.province,u.level,u.point,u.sex,u.motto,u.avatar,u.id FROM user u,friend f WHERE f.uid = '$id' AND u.name = f.uname;
EOF;
    $res = $db->execute_dql_arr($sql);
    return $res;
}

/**
 * @param $id
 * @return array
 * 获得用户的朋友圈动态
 */
function get_following_moments($id){
    global $db;
    $sql= "SELECT m.id mid, m.mdate,m.context ,* FROM moments m, user u WHERE m.uid = u.id IN 
    (SELECT user.id FROM user,followers f WHERE f.uid = '$id' AND user.name = f.uname;)ORDER BY m.mdate DESC ";
    $res = $db->execute_dql_arr($sql);
    return $res;
}
// 通过id查找name
function get_nameById($id) {
    global $db;
    $sql = "SELECT * FROM user WHERE id = '$id'";
    $res = $db->execute_dql_arr($sql);
    if($res) {
        $name = $res[0]["name"];
        if(empty($name)) {
            $name = $res[0]["id"];
        }
        return $name;
    } else {
        return "无";
    }
}

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

/**
 * @param $id
 * @return mixed
 * 获得用户的个人信息
 */
function get_user_info($id) {
    global $db;
    $sql = "SELECT * FROM user WHERE id = '$id'";
    $res = $db->execute_dql_arr($sql);
    return $res;
}

/**
 * @param $key
 * @param $max
 * @return array
 * 按照关键字key获得排名前max的用户
 */
function get_user_orderby($key, $max) {
    global $db;
    $sql = "SELECT * FROM user ORDER BY $key DESC LIMIT 0, $max";
    $res = $db->execute_dql_arr($sql);
    return $res;
}

/**
 * @param $username
 * @param $key
 * @param $max
 * @return int
 * 获得用户排名
 */
function get_user_rank($username, $key, $max) {
    $arr = get_user_orderby($key, $max);
    $len = count($arr);
    for ($i = 0; $i < $len; $i++) {
        if($username == $arr[$i]["id"]) {
            return $i + 1;
        }
    }
    return 999;
}

function get_all_rank($time){

    global $db;
    if($time == "today"){
        $sql = <<<EOF
SELECT name,day_distance,day_step,day_time,day_calorie FROM user ;
EOF;
    }else if($time == "week"){
        $sql = <<<EOF
SELECT name,week_distance,week_step,week_time,week_calorie FROM user;
EOF;
    }else if($time == "total"){
        $sql = <<<EOF
SELECT name,total_distance,total_step,total_time,total_calorie FROM user;
EOF;
    }
    $res = $db->execute_dql_arr($sql);
    return $res;
}

function get_friends_rank($time){
    $username = get_username();
    $id = get_id_by_name($username);
    global $db;
    if($time == "today"){
        $sql = <<<EOF
SELECT name,day_distance,day_step,day_time,day_calorie FROM user WHERE name IN
(SELECT uname FROM friend WHERE uid = '$id';);
EOF;
    }else if($time == "week"){
        $sql = <<<EOF
SELECT name,week_distance,week_step,week_time,week_calorie FROM user WHERE name IN
(SELECT uname FROM friend WHERE uid = '$id';);
EOF;
    }else if($time == "total"){
        $sql = <<<EOF
SELECT name,total_distance,total_step,total_time,total_calorie FROM user WHERE name IN
(SELECT uname FROM friend WHERE uid = '$id';);
EOF;
    }
    $res = $db->execute_dql_arr($sql);
    return $res;
}

