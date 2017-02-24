<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/10/30
 * Time: 19:50
 */
$random = rand(1,100);
$height = array();
$weight = array();
$walking_step = array();
$running_step = array();
$hrarr = array();
$bparrH = array();
$bparrL = array();

for($i = 0; $i < 50;$i++){
    $random = rand(160,190);
    $height[$i] = $random;
    $random = rand(40,80);
    $weight[$i] = $random;
    $random = rand(40,50);
    $walking_step = $random;
    $random = rand(50,60);
    $running_step = $random;
    $random = rand(80,130);
    $hrarr[$i] = $random;
    $randHrH = rand(90,120);
    $bparrH[$i] = $randHrH;
    $randHrL = rand(60,90);
    $bparrL[$i] = $randHrL;
    $randGoal = rand(1,10);
}

//for($i = 0;$i < count($hrarr); $i++){
//    echo $hrarr[$i];
//    echo "\n";
//}
$_fp = @fopen('health.xml','w');
if(!$_fp){
    exit("Error,the file is not exist!");
}
flock($_fp,LOCK_EX);
$_string = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\r\t";
fwrite($_fp,$_string,strlen($_string));
$_string = "<health>";
fwrite($_fp,$_string,strlen($_string));
for($i = 0;$i < count($hrarr);$i++){
    $_string = "\t<item>\r\t";
    fwrite($_fp, $_string, strlen($_string));
    $_string = "\t\t<height>$height[$i]</height>\r\t";
    fwrite($_fp, $_string, strlen($_string));
    $_string = "\t\t<weight>$weight[$i]</weight>\r\t";
    fwrite($_fp, $_string, strlen($_string));
    $_string = "\t\t<walking_step>$walking_step[$i]</walking_step>\r\t";
    fwrite($_fp,$_string,strlen($_string));
    $_string = "\t\t<running_step>$running_step[$i]</running_step>\r\t";
    fwrite($_fp,$_string,strlen($_string));
    $_string = "\t\t<hr>$hrarr[$i]</hr>\r\t";
    fwrite($_fp, $_string, strlen($_string));
    $_string = "\t\t<bph>$bparrH[$i]</bph>\r\t";
    fwrite($_fp, $_string, strlen($_string));
    $_string = "\t\t<bpl>$bparrL[$i]</bpl>\r\t";
    fwrite($_fp, $_string, strlen($_string));
    $_string = "\t</item>\r\t";
    fwrite($_fp, $_string, strlen($_string));
}
$_string = "</health>";
fwrite($_fp,$_string,strlen($_string));
flock($_fp,LOCK_UN);
fclose($_fp);
echo "over";