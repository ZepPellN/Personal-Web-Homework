<?php
/**
 * Created by PhpStorm.
 * User: zsq
 * Date: 2016/10/30
 * Time: 11:03
 * 封装对数据库的操作
 */
require '../../server/config/db_config.php';
class DB{
    private $dbName = DB_NAME;
    private $sqlite3;
    public function __construct(){
        $this->sqlite3 = new SQLite3($this->dbName);
    }

    /**
     * 执行select语句，直接返回结果集
     */
    public function execute_dql($sql){
        $res = $this->sqlite3->query($sql);
        return $res;
    }
    /**
     * 执行select语句，结果集以数的形式返回
     */
    public function execute_dql_arr($sql){
        $res = $this->sqlite3->query($sql);
        $row = $res->fetchArray();
        $arr = array();
        while($row){
            $arr[] = $row;
            $row = $res->fetchArray();
        }
        
        return $arr;
    }
    /**
     * 执行dml数据操作 update insert delete
     */
    public function execute_dml($sql){
        $bool = $this->sqlite3->exec($sql);
        return $bool;
    }

    /**
     * @param $sql
     * @return mixed
     * 创建表
     */
    public function create_table($sql){
        $bool = $this->sqlite3->exec($sql);
        return $bool;
    }

    public function close(){
        $this->sqlite3->close();
    }
}