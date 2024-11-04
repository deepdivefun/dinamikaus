<?php
require_once('ConnectionClass.php');

class OurClient
{
    public $OurClientID, $StatusID, $OurClientName, $OurClientPhoto;

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function fetchOurClient($StatusName = 'Active')
    {
        global $conn;

        try {
            if (empty($StatusName)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "SELECT a.OurClientID, b.StatusID, b.StatusName, a.OurClientName, a.OurClientPhoto 
                            FROM tbl_ourclient a 
                            LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID 
                            WHERE b.StatusName = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("s", $StatusName);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result(
                    $OurClientID,
                    $StatusID,
                    $StatusName,
                    $OurClientName,
                    $OurClientPhoto
                );

                $result = [];

                while ($stmt->fetch()) {
                    $conn->commit();
                    $result[]   = [
                        'OurClientID'       => $OurClientID,
                        'StatusID'          => $StatusID,
                        'StatusName'        => $StatusName,
                        'OurClientName'     => $OurClientName,
                        'OurClientPhoto'    => $OurClientPhoto
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
