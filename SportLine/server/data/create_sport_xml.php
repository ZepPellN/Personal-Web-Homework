
<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/10/30
 * Time: 19:50
 */
$random = rand(1,100);
$day_distance = array();
$day_time = array();
$day_calorie = array();
$day_step = array();

for($i = 0; $i < 49;$i++){
    $random = rand(0,10);
    $day_distance[$i] = $random;
    $random = rand(0,10);
    $day_hour[$i] = $random;
    $random = rand(0,10000);
    $day_step[$i] = $random;
    $random= rand(0,100);
    $day_calorie[$i] = $random;
}

for($i = 0;$i < 12;$i++){
    $random = rand(0,300);
    $distance_goal[$i] = $random;
    $random = rand(0,300);
    $time_goal[$i] = $random;
    $random = rand(0,300000);
    $step_goal[$i] = $random;
    $random = rand(0,3000);
    $calorie_goal[$i] = $random;
}
$week_distance = rand(10,20);
$week_time = rand(1,10);
$week_step = rand(10000,20000);
$week_calorie = rand(1000,2000);
$total_distance = rand(50,100);
$total_time = rand(50,100);
$total_step = rand(10000,30000);
$total_calorie = rand(10000,30000);
$distance_goal = rand(1,10);
$time_goal = rand(1,10);
$step_goal = rand(10000,15000);
$calorie_goal = rand(1000,2000);

//for($i = 0;$i < count($hrarr); $i++){
//    echo $hrarr[$i];
//    echo "\n";
//}

$_fp = @fopen('user_sport.xml','w');
if(!$_fp){
    exit("Error,the file is not exist!");
}
flock($_fp,LOCK_EX);
$_string = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\r\t";
fwrite($_fp,$_string,strlen($_string));
$_string = "<sport>";
fwrite($_fp,$_string,strlen($_string));
for($i = 0;$i < count($day_distance);$i++){
    $_string = "\t<item>\r\t";
    fwrite($_fp, $_string, strlen($_string));
    $_string = "\t\t<day_distance>$day_distance[$i]</day_distance>\r\t";
    fwrite($_fp, $_string, strlen($_string));
    $_string = "\t\t<day_time>$day_time[$i]</day_time>\r\t";
    fwrite($_fp, $_string, strlen($_string));
    $_string = "\t\t<day_step>$day_step$i]</day_step>\r\t";
    fwrite($_fp,$_string,strlen($_string));
    $_string = "\t\t<day_calorie>$day_calorie[$i]</day_calorie>\r\t";
    fwrite($_fp,$_string,strlen($_string));
    $_string = "\t</item>\r\t";
    fwrite($_fp, $_string, strlen($_string));
}

//$_string = "\t<item>\r\t";
//fwrite($_fp,$_string,strlen($_string));
//$_string = "\t\t<distance_goal>$distance_goal</distance_goal>\r\t";
//fwrite($_fp, $_string, strlen($_string));
//$_string = "\t\t<time_goal>$time_goal/time_goal>\r\t";
//fwrite($_fp, $_string, strlen($_string));
//$_string = "\t\t<step_goal>$step_goal</step_goal>\r\t";
//fwrite($_fp, $_string, strlen($_string));
//$_string = "\t\t<calorie_goal>$calorie_goal</calorie_goal>\r\t";
//fwrite($_fp,$_string,strlen($_string));
//$_string = "\t</item>\r\t";
//fwrite($_fp,$_string,strlen($_string));
//
//$_string = "\t<itme>\r\t";
//fwrite($_fp,$_string,strlen($_string));
//$_string = "\t\t<week_distance>$week_distance</week_distance>\r\t";
//fwrite($_fp, $_string, strlen($_string));
//$_string = "\t\t<week_time>$week_time</week_time>\r\t";
//fwrite($_fp, $_string, strlen($_string));
//$_string = "\t\t<week_step>$week_step</week_step>\r\t";
//fwrite($_fp, $_string, strlen($_string));
//$_string = "\t\t<week_calorie>$week_calorie</week_calorie>\r\t";
//fwrite($_fp,$_string,strlen($_string));
//$_string = "\t</item>\r\t";
//fwrite($_fp,$_string,strlen($_string));
//$_string = "\t<itme>\r\t";
//fwrite($_fp,$_string,strlen($_string));
//$_string = "\t\t<total_distance>$total_distance</total_distance>\r\t";
//fwrite($_fp,$_string,strlen($_string));
//$_string = "\t\t<total_time>$total_distance</total_time>\r\t";
//fwrite($_fp,$_string,strlen($_string));
//$_string = "\t\t<total_step>$total_distance</total_step>\r\t";
//fwrite($_fp,$_string,strlen($_string));
//$_string = "\t\t<total_calorie>$total_distance</total_calorie>\r\t";
//fwrite($_fp,$_string,strlen($_string));
//$_string = "\t</item>\r\t";
//fwrite($_fp,$_string,strlen($_string));
$_string = "</sport>";
fwrite($_fp,$_string,strlen($_string));
flock($_fp,LOCK_UN);
fclose($_fp);
echo "over";