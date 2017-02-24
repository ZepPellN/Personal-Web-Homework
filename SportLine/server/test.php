<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/10/24
 * Time: 22:39
 */

//class MyDB extends SQLite3{
//    function __construct(){
//        $this->open('test.db');
//    }
//}
//$db = new MyDB();
//if(!$db){
//    echo $db->lastErrorMsg();
//} else {
//    echo "Opened database successfully\n";
//}





      $text = $_POST['test'];
//    $page = !empty($_POST["'page"]) ? $_POST["'page'"] : null;
//    $name = !empty($_POST["'name"]) ? $_POST["'name'"] :  null;

    $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5,'test'=>$text);
//    echo json_encode($arr);
//          $json_text = json_encode($text);
    echo json_encode($arr);
