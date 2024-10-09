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

    public function updateSettings($SettingsID, $StatusID, $SettingsName, $SettingsValue, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($SettingsID) and empty($StatusID) and empty($SettingsValue) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $query  = "UPDATE tbl_settings SET 
                            StatusID = ?, 
                            SettingsName = ?, 
                            SettingsValue = ?, 
                            UpdateBy = ?, 
                            UpdateTime = NOW() 
                            WHERE SettingsID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isssi", $StatusID, $SettingsName, $SettingsValue, $UpdateBy, $SettingsID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Settings has been updated";
                } else {
                    echo    "Failed to update settings";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
