<?php
require_once('ConnectionClass.php');

class EventLog
{
    public $EventLogUser, $EventLogData;

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function createEventLog($EventLogUser, $EventLogData)
    {
        global $conn;

        try {
            if (empty($EventLogUser) and empty($EventLogData)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "INSERT INTO tbl_eventlog (EventLogTimeStamp, EventLogUser, EventLogData) 
                            VALUES (NOW(), ?, ?)";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param('ss', $EventLogUser, $EventLogData);
                $stmt->execute();
                $conn->commit();
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
