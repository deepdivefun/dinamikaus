<?php
require_once('ConnectionClass.php');

class ProductBrand
{

    public $ProductBrandID, $StatusID, $ProductBrandName, $CreateBy, $CreateTime, $UpdateBy, $UpdateTime;

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function fetchProductBrand($StatusID = 1)
    {
        global $conn;

        try {
            if (empty($StatusID)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "SELECT ProductBrandID, StatusID, ProductBrandName FROM tbl_product_brand 
                            WHERE StatusID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("i", $StatusID);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result(
                    $ProductBrandID,
                    $StatusID,
                    $ProductBrandName
                );
                $result = [];

                while ($stmt->fetch()) {
                    $conn->commit();
                    $result[] = [
                        'ProductBrandID'    => $ProductBrandID,
                        'StatusID'          => $StatusID,
                        'ProductBrandName'  => $ProductBrandName
                    ];
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }

        return $result;
        $conn->close();
    }

    public function createProductBrand($StatusID, $ProductBrandName, $CreateBy)
    {
        global $conn;

        try {
            if (empty($StatusID) and empty($ProductBrandName) and empty($CreateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "INSERT INTO tbl_product_brand (StatusID, ProductBrandName, CreateBy) 
                            VALUES (?, ?, ?)";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("iss", $StatusID, $ProductBrandName, $CreateBy);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Product Brand created successfully";
                } else {
                    echo    "Failed to create product brand";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function updateProductBrand($ProductBrandID, $StatusID, $ProductBrandName, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($ProductBrandID) and empty($StatusID) and empty($ProductBrandName) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_product_brand SET 
                            StatusID = ?,
                            ProductBrandName = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE ProductBrandID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("issi", $StatusID, $ProductBrandName, $UpdateBy, $ProductBrandID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Product Brand has been updated";
                } else {
                    echo    "Failed to update product brand";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function deleteProductBrand($ProductBrandID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($ProductBrandID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_product_brand SET 
                            StatusID = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE ProductBrandID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $ProductBrandID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Product Brand has been deactivated";
                } else {
                    echo    "Product Brand failed to deactivate";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function activeProductBrand($ProductBrandID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($ProductBrandID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_product_brand SET 
                            StatusID = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE ProductBrandID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $ProductBrandID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Product Brand has been activated";
                } else {
                    echo    "Product Brand failed to activate";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
