<?php

// require MySQL Connection
require ('database/DBController.php');

// require Product Class
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
        
       
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE category='headphones'");

        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }
}




// DBController object
$db = new DBController();

// Product object
$product = new Product($db);
$product_shuffle = $product->getData();

