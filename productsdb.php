<?php

class Product{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db=$db;
    }


    public function getData($table = 'product'){
    $result = $this->db->con->query("SELECT * FROM {$table}");

    $resultArray = array();

    while($iteam = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $resultArray[] = $iteam;
    }
    return $resultArray;
    }

    public function getProduct($item_id = null, $table= 'product'){
        if (isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE id={$item_id}");

            $resultArray = array();

            while($iteam = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $iteam;
            }
            return $resultArray;
        }
    }
}

?>