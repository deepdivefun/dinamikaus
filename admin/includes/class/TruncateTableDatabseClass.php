<?php
require_once('ConnectionClass.php');

class TruncateTable
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function truncateTable($TableName)
    {
        global $conn;

        try {
            if (empty($TableName)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "TRUNCATE TABLE $TableName";
                $stmt   = $conn->prepare($query);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Table failed to truncate";
                } else {
                    echo    "Table successfully truncated";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
