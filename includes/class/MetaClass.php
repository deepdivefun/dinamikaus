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

        try {
            if (empty($StatusName)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

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
                    $conn->commit();
                    $result[]   = [
                        'MetaID'        => $MetaID,
                        'StatusID'      => $StatusID,
                        'StatusName'    => $StatusName,
                        'Name'          => $Name,
                        'Content'       => $Content
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
