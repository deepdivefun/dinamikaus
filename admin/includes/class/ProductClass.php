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

    public function createProduct($ProductCategoryID, $StatusID, $ProductName, $ProductDescription, $ProductPhotoConvert, $CreateBy)
    {
        global $conn;

        try {
            if (empty($ProductCategoryID) and empty($StatusID) and empty($ProductName) and empty($ProductPhotoConvert) and empty($CreateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $query  = "INSERT INTO tbl_product (ProductCategoryID, StatusID, ProductName, ProductDescription, ProductPhoto, CreateBy) 
                            VALUES (?, ?, ?, ?, ?, ?)";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("iissss", $ProductCategoryID, $StatusID, $ProductName, $ProductDescription, $ProductPhotoConvert, $CreateBy);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Product created successfully";
                } else {
                    echo    "Failed to create product";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
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
