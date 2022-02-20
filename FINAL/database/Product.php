<?php

class Product
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    
    // fetch product data using getData Method
    public function getData($table = 'product'){
        
        $catselected = $_POST['category'];
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE category='$catselected'");

        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }
  
 

}