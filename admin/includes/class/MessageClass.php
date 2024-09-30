<?php
require_once('ConnectionClass.php');

class Message
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function fetchStatusMessage()
    {
        global $conn;

        $query  = "SELECT StatusMessageID, StatusMessage FROM tbl_status_message";
        $stmt   = $conn->prepare($query);
        $stmt->execute();
        $stmt->bind_result($StatusMessageID, $StatusMessage);
        $result = [];

        while ($stmt->fetch()) {
            $result[] = [
                'StatusMessageID'  => $StatusMessageID,
                'StatusMessage'    => $StatusMessage
            ];
        }

        return $result;
    }

    public function updateMessage($MessageID, $StatusMessageID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($MessageID) and empty($StatusMessageID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_message SET 
                            StatusMessageID = ?, 
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE MessageID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param('isi', $StatusMessageID, $UpdateBy, $MessageID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Message successfully updated";
                } else {
                    echo    "Message failed to update";
                }
            }

            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
