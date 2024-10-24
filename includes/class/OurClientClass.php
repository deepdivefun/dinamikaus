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
            $result[]   = [
                'OurClientID'       => $OurClientID,
                'StatusID'          => $StatusID,
                'StatusName'        => $StatusName,
                'OurClientName'     => $OurClientName,
                'OurClientPhoto'    => $OurClientPhoto
            ];
        }

        return $result;
        $stmt->close();
        $conn->close();
    }
}
