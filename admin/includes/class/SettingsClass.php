<?php
require_once('ConnectionClass.php');

class Settings
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function updateSettings($SettingsID, $StatusID, $SettingsContents, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($SettingsID) and empty($StatusID) and empty($SettingsContents) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $query  = "UPDATE tbl_settings SET 
                            StatusID = ?, 
                            SettingsContents = ?, 
                            UpdateBy = ?, 
                            UpdateTime = NOW() 
                            WHERE SettingsID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("issi", $StatusID, $SettingsContents, $UpdateBy, $SettingsID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Settings successfully updated";
                } else {
                    echo    "Settings failed to update";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}