<?php
require_once('ConnectionClass.php');

class ProductCategory
{
    public $ProductCategoryID, $StatusID, $ProductCategoryName, $ProductCategoryCatalog, $CreateBy,
        $CreateTime, $UpdateBy, $UpdateTime;

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function fetchProductCategory($StatusID = 1)
    {
        global $conn;

        $query  = "SELECT ProductCategoryID, StatusID, ProductCategoryName FROM tbl_product_category 
                    WHERE StatusID = ?";
        $stmt   = $conn->prepare($query);
        $stmt->bind_param("i", $StatusID);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($ProductCategoryID, $StatusID, $ProductCategoryName);
        $result = [];

        while ($stmt->fetch()) {
            $conn->commit();
            $result[] = [
                'ProductCategoryID'     => $ProductCategoryID,
                'StatusID'              => $StatusID,
                'ProductCategoryName'   => $ProductCategoryName
            ];
        }

        return $result;
        $stmt->close();
        $conn->close();
    }

    public function createProductCategory($StatusID, $ProductCategoryName, $ProductCategoryCatalogConvert, $ProductCategoryPhotoConvert, $CreateBy)
    {
        global $conn;

        try {
            if (empty($StatusID) and empty($ProductCategoryName) and empty($ProductCategoryPhotoConvert) and empty($CreateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "INSERT INTO tbl_product_category (StatusID, ProductCategoryName, ProductCategoryCatalog, ProductCategoryPhoto, CreateBy) 
                            VALUES (?, ?, ?, ?, ?)";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("issss", $StatusID, $ProductCategoryName, $ProductCategoryCatalogConvert, $ProductCategoryPhotoConvert, $CreateBy);
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

    public function updateProductCategory($ProductCategoryID, $StatusID, $ProductCategoryName, $ProductCategoryCatalogConvert, $ProductCategoryPhotoConvert, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($ProductCategoryID) and empty($StatusID) and empty($ProductCategoryName) and empty($ProductCategoryPhotoConvert) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_product_category SET 
                            StatusID = ?,
                            ProductCategoryName = ?,
                            ProductCategoryCatalog = ?,
                            ProductCategoryPhoto = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE ProductCategoryID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("issssi", $StatusID, $ProductCategoryName, $ProductCategoryCatalogConvert, $ProductCategoryPhotoConvert, $UpdateBy, $ProductCategoryID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Product Category has been updated";
                } else {
                    echo    "Failed to update product category";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function deleteProductCategory($ProductCategoryID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($ProductCategoryID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_product_category SET
                            StatusID = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW()
                            WHERE ProductCategoryID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $ProductCategoryID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Product Category has been deactivated";
                } else {
                    echo    "Product Category failed to deactivate";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function activeProductCategory($ProductCategoryID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($ProductCategoryID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_product_category SET
                        StatusID = ?,
                        UpdateBy = ?,
                        UpdateTime = NOW()
                        WHERE ProductCategoryID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $ProductCategoryID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Product Categpry has been activated";
                } else {
                    echo    "Product Categpry failed to activate";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
