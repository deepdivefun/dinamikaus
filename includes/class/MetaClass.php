<?php
require_once('ConnectionClass.php');

class Meta
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function fetchMeta($StatusName = 'Active')
    {
        global $conn;

        $query  = "SELECT a.MetaID, b.StatusID, b.StatusName, a.Name, a.Content 
                    FROM tbl_meta a 
                    LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID 
                    WHERE b.StatusName = ?";
        $stmt   = $conn->prepare($query);
        $stmt->bind_param("s", $StatusName);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result(
            $MetaID,
            $StatusID,
            $StatusName,
            $Name,
            $Content
        );

        $result = [];

        while ($stmt->fetch()) {
            $result[]   = [
                'MetaID'        => $MetaID,
                'StatusID'      => $StatusID,
                'StatusName'    => $StatusName,
                'Name'          => $Name,
                'Content'       => $Content
            ];
        }

        return $result;
        $stmt->close();
        $conn->close();
    }
}
