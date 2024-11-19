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

    public function createProduct($ProductCategoryID, $StatusID, $ProductName, $ProductPrice, $ProductDescription, $ProductPhotoConvert, $CreateBy)
    {
        global $conn;

        try {
            if (empty($ProductCategoryID) and empty($StatusID) and empty($ProductName) and empty($ProductPhotoConvert) and empty($CreateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $query  = "INSERT INTO tbl_product (ProductCategoryID, StatusID, ProductName, ProductPrice, ProductDescription, ProductPhoto, CreateBy) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("iisssss", $ProductCategoryID, $StatusID, $ProductName, $ProductPrice, $ProductDescription, $ProductPhotoConvert, $CreateBy);
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

    public function updateProduct($ProductID, $ProductCategoryID, $StatusID, $ProductName, $ProductPrice, $ProductDescription, $ProductPhotoConvert, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($ProductID) and empty($ProductCategoryID) and empty($StatusID) and empty($ProductName) and empty($ProductPhotoConvert) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_product SET 
                            ProductCategoryID = ?,
                            StatusID = ?,
                            ProductName = ?,
                            ProductPrice = ?,
                            ProductDescription = ?,
                            ProductPhoto = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE ProductID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("iisssssi", $ProductCategoryID, $StatusID, $ProductName, $ProductPrice, $ProductDescription, $ProductPhotoConvert, $UpdateBy, $ProductID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Product has been updated";
                } else {
                    echo    "Failed to update product";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function deleteProduct($ProductID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($ProductID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_product SET 
                            StatusID = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE ProductID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $ProductID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Product has been deactivated";
                } else {
                    echo    "Product failed to deactivate";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function activeProduct($ProductID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($ProductID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_product SET 
                            StatusID = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE ProductID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $ProductID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Product has been activated";
                } else {
                    echo    "Product failed to activate";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
