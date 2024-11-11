<?php
require_once('ConnectionClass.php');

class PaymentLogo
{
    public $PaymentID, $StatusID, $PaymentName, $PaymentPhoto;

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function fetchPaymentLogo($StatusName = 'Active')
    {
        global $conn;

        try {
            if (empty($StatusName)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "SELECT a.PaymentID, b.StatusID, b.StatusName, a.PaymentPhoto 
                            FROM tbl_payment a 
                            LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID 
                            WHERE b.StatusName = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("s", $StatusName);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result(
                    $PaymentID,
                    $StatusID,
                    $StatusName,
                    $PaymentPhoto
                );

                $result = [];

                while ($stmt->fetch()) {
                    $conn->commit();
                    $result[]   = [
                        'PaymentID'     => $PaymentID,
                        'StatusID'      => $StatusID,
                        'StatusName'    => $StatusName,
                        'PaymentPhoto'  => $PaymentPhoto
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
}
