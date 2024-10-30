<?php
require_once('ConnectionClass.php');

class ShippingLogo
{
    public $ShippingID, $StatusID, $ShippingName, $ShippingPhoto, $CreateBy, $CreateTime, $UpdateBy,
        $UpdateTime;

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function createShippingLogo($StatusID, $ShippingName, $ShippingPhotoConvert, $CreateBy)
    {
        global $conn;

        try {
            if (empty($StatusID) and empty($ShippingName) and empty($ShippingPhotoConvert) and empty($CreateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "INSERT INTO tbl_shipping (StatusID, ShippingName, ShippingPhoto, CreateBy) 
                            VALUES (?, ?, ?, ?)";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isss", $StatusID, $ShippingName, $ShippingPhotoConvert, $CreateBy);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo "Shipping Logo created successfully";
                } else {
                    $conn->rollback();
                    echo "Failed to create shipping logo";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function updateShippingLogo($ShippingID, $StatusID, $ShippingName, $ShippingPhotoConvert, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($ShippingID) and empty($StatusID) and empty($ShippingName) and empty($ShippingPhotoConvert) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_shipping SET 
                            StatusID = ?,
                            ShippingName = ?,
                            ShippingPhoto = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE ShippingID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isssi", $StatusID, $ShippingName, $ShippingPhotoConvert, $UpdateBy, $ShippingID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Shipping Logo has been updated";
                } else {
                    echo    "Failed to update shipping logo";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function deleteShippingLogo($ShippingID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($ShippingID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_shipping SET 
                            StatusID = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE ShippingID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $ShippingID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Shipping Logo has been deactivated";
                } else {
                    echo    "Shipping Logo failed to deactivate";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function activeShippingLogo($ShippingID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($ShippingID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_shipping SET 
                            StatusID = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE ShippingID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $ShippingID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Shipping Logo has been activated";
                } else {
                    echo    "Shipping Logo failed to activate";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
