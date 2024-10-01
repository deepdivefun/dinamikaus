<?php
require_once('ConnectionClass.php');

class Product
{
    public $ProductID, $ProductCategoryID, $StatusID, $ProductName, $ProductDescription, $ProductPhoto,
        $CreateBy, $CreateTime, $UpdateBy, $UpdateTime;

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function createProduct()
    {
        global $conn;
    }

    public function updateProduct()
    {
        global $conn;
    }

    public function deleteProduct()
    {
        global $conn;
    }

    public function activeProduct()
    {
        global $conn;
    }
}
