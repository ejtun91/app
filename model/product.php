<?php
require_once __DIR__ . '/../src/main_controller.php';
require_once __DIR__ . '/../src/model_functions.php';
class Product{

    // database connection and table name
    private $conn;

    // object properties
    public $id;
    public $name;
    public $price;


    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

    function readByIds($ids){

        $ids_arr = str_repeat('?,', count($ids) - 1) . '?';

        // query to select products
        $query = "SELECT id, product_title, price FROM products WHERE id IN ({$ids_arr}) ORDER BY product_title";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute($ids);

        // return values from database
        return $stmt;
    }
}