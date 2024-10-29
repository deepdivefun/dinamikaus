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

    public function createSettings($StatusID, $SettingsName, $SettingsValue, $CreateBy)
    {
        global $conn;

        try {
            if (empty($StatusID) and empty($SettingsName) and empty($SettingsValue) and empty($CreateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "INSERT INTO tbl_settings (StatusID, SettingsName, SettingsValue, CreateBy) 
                            VALUES (?, ?, ?, ?)";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isss", $StatusID, $SettingsName, $SettingsValue, $CreateBy);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo "Settings created successfully";
                } else {
                    $conn->rollback();
                    echo "Failed to create settings";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function updateSettings($SettingsID, $StatusID, $SettingsName, $SettingsValue, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($SettingsID) and empty($StatusID) and empty($SettingsName) and empty($SettingsValue) and empty($UpdateBy)) {
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

    public function createSettingsLogo($StatusID, $SettingsLogoName, $SettingsLogoValueConvert, $CreateBy)
    {
        global $conn;

        try {
            if (empty($StatusID) and empty($SettingsLogoName) and empty($SettingsLogoValueConvert) and empty($CreateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "INSERT INTO tbl_settings_logo (StatusID, SettingsLogoName, SettingsLogoValue, CreateBy) 
                            VALUES (?, ?, ?, ?)";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isss", $StatusID, $SettingsLogoName, $SettingsLogoValueConvert, $CreateBy);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo "Settings Logo created successfully";
                } else {
                    $conn->rollback();
                    echo "Failed to create settings logo";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function updateSettingsLogo($SettingsLogoID, $StatusID, $SettingsLogoName, $SettingsLogoValueConvert, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($SettingsLogoID) and empty($StatusID) and empty($SettingsLogoName) and empty($SettingsLogoValueConvert) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $query  = "UPDATE tbl_settings_logo SET 
                            StatusID = ?, 
                            SettingsLogoName = ?, 
                            SettingsLogoValue = ?, 
                            UpdateBy = ?, 
                            UpdateTime = NOW() 
                            WHERE SettingsLogoID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isssi", $StatusID, $SettingsLogoName, $SettingsLogoValueConvert, $UpdateBy, $SettingsLogoID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Settings Logo has been updated";
                } else {
                    echo    "Failed to update settings logo";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
