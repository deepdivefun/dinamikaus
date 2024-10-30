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

    public function fetchLogoLoginPage($StatusName = 'Active', $SettingsLogoID = 3)
    {
        global $conn;

        $query  = "SELECT a.SettingsLogoID, b.StatusID, b.StatusName, a.SettingsLogoName, 
                    a.SettingsLogoValue FROM tbl_settings_logo a 
                    LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID 
                    WHERE b.StatusName = ? AND a.SettingsLogoID = ?";
        $stmt   = $conn->prepare($query);
        $stmt->bind_param("si", $StatusName, $SettingsLogoID);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result(
            $SettingsLogoID,
            $StatusID,
            $StatusName,
            $SettingsLogoName,
            $SettingsLogoValue
        );
        $result = [];

        while ($stmt->fetch()) {
            $conn->commit();
            $result[] = [
                'SettingsLogoID'    => $SettingsLogoID,
                'StatusID'          => $StatusID,
                'StatusName'        => $StatusName,
                'SettingsLogoName'  => $SettingsLogoName,
                'SettingsLogoValue' => $SettingsLogoValue
            ];
        }

        return $result;
        $stmt->close();
        $conn->close();
    }
}
