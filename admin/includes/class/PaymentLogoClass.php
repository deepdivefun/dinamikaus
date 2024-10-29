<?php
require_once('ConnectionClass.php');

class PaymentLogo
{
    public $PaymentID, $StatusID, $PaymentName, $PaymentPhoto, $CreateBy, $CreateTime, $UpdateBy,
        $UpdateTime;

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function createPaymentLogo($StatusID, $PaymentName, $PaymentPhotoConvert, $CreateBy)
    {
        global $conn;

        try {
            if (empty($StatusID) and empty($PaymentName) and empty($PaymentPhotoConvert) and empty($CreateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "INSERT INTO tbl_payment (StatusID, PaymentName, PaymentPhoto, CreateBy) 
                            VALUES (?, ?, ?, ?)";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isss", $StatusID, $PaymentName, $PaymentPhotoConvert, $CreateBy);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo "Payment Logo created successfully";
                } else {
                    $conn->rollback();
                    echo "Failed to create payment logo";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function updatePaymentLogo($PaymentID, $StatusID, $PaymentName, $PaymentPhotoConvert, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($PaymentID) and empty($StatusID) and empty($PaymentName) and empty($PaymentPhotoConvert) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_payment SET 
                            StatusID = ?,
                            PaymentName = ?,
                            PaymentPhoto = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE PaymentID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isssi", $StatusID, $PaymentName, $PaymentPhotoConvert, $UpdateBy, $PaymentID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Payment Logo has been updated";
                } else {
                    echo    "Failed to update payment logo";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function deletePaymentLogo($PaymentID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($PaymentID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_payment SET 
                            StatusID = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE PaymentID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $PaymentID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Payment Logo has been deactivated";
                } else {
                    echo    "Payment Logo failed to deactivate";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function activePaymentLogo($PaymentID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($PaymentID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_payment SET 
                            StatusID = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE PaymentID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $PaymentID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Payment Logo has been activated";
                } else {
                    echo    "Payment Logo failed to activate";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
