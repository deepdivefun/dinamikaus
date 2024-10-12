<?php
require_once('ConnectionClass.php');

class Status
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function fetchStatus()
    {
        global $conn;

        $conn->begin_transaction();

        $query  = "SELECT StatusID, StatusName FROM tbl_status";
        $stmt   = $conn->prepare($query);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($StatusID, $StatusName);
        $result = [];

        while ($stmt->fetch()) {
            $conn->commit();
            $result[] = [
                'StatusID'      => $StatusID,
                'StatusName'    => $StatusName
            ];
        }

        return $result;
        $stmt->close();
        $conn->close();
    }
}
