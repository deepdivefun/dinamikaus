<?php
require_once('ConnectionClass.php');

class ShippingLogo
{
    public $ShippingID, $StatusID, $ShippingName, $ShippingPhoto;

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function fetchShippingLogo($StatusName = 'Active')
    {
        global $conn;

        try {
            if ($StatusName) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "SELECT a.ShippingID, b.StatusID, b.StatusName, a.ShippingPhoto 
                            FROM tbl_shipping a 
                            LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID 
                            WHERE b.StatusName = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("s", $StatusName);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result(
                    $ShippingID,
                    $StatusID,
                    $StatusName,
                    $ShippingPhoto
                );

                $result = [];

                while ($stmt->fetch()) {
                    $conn->commit();
                    $result[]   = [
                        'ShippingID'    => $ShippingID,
                        'StatusID'      => $StatusID,
                        'StatusName'    => $StatusName,
                        'ShippingPhoto' => $ShippingPhoto
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
