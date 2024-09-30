<?php
require_once('ConnectionClass.php');

class ProductCategory
{
    public $ProductCategoryID, $StatusID, $ProductCategoryName, $CreateBy, $CreateTime, $UpdateBy,
        $UpdateTime;

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function createProductCategory($StatusID, $ProductCategoryName, $CreateBy)
    {
        global $conn;

        try {
            if (empty($StatusID) and empty($ProductCategoryName) and empty($CreateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "INSERT INTO tbl_product_category (StatusID, ProductCategoryName, CreateBy) 
                            VALUES (?, ?, ?)";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("iss", $StatusID, $ProductCategoryName, $CreateBy);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Product Category created successfully";
                } else {
                    echo    "Failed to create product category";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
