<?php
require_once('ConnectionClass.php');

class Team
{
    public $TeamID, $StatusID, $FullName, $Position, $Linkedin, $Instagram, $TeamPhoto;

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function createTeam($StatusID, $FullName, $Position, $Linkedin, $Instagram, $TeamPhotoConvert, $CreateBy)
    {
        global $conn;

        try {
            if (empty($StatusID) and empty($FullName) and empty($Position) and empty($TeamPhotoConvert) and empty($CreateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "INSERT INTO tbl_team (StatusID, FullName, Position, Linkedin, Instagram, TeamPhoto, CreateBy) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("issssss", $StatusID, $FullName, $Position, $Linkedin, $Instagram, $TeamPhotoConvert, $CreateBy);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Team created successfully";
                } else {
                    echo    "Failed to create team";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function updateTeam($TeamID, $StatusID, $FullName, $Position, $Linkedin, $Instagram, $TeamPhotoConvert, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($TeamID) and empty($StatusID) and empty($FullName) and empty($Position) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } elseif (empty($TeamPhotoConvert)) {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_team SET 
                            StatusID = ?,
                            FullName = ?,
                            Position = ?,
                            Linkedin = ?,
                            Instagram = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE TeamID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isssssi", $StatusID, $FullName, $Position, $Linkedin, $Instagram, $UpdateBy, $TeamID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Team has been updated";
                } else {
                    echo    "Failed to update team";
                }

                $stmt->close();
            } else {

                $conn->begin_transaction();

                $query  = "UPDATE tbl_team SET 
                            StatusID = ?,
                            FullName = ?,
                            Position = ?,
                            Linkedin = ?,
                            Instagram = ?,
                            TeamPhoto = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE TeamID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("issssssi", $StatusID, $FullName, $Position, $Linkedin, $Instagram, $TeamPhotoConvert, $UpdateBy, $TeamID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Team has been updated";
                } else {
                    echo    "Failed to update team";
                }

                $stmt->close();
            }
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function deleteTeam($TeamID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($TeamID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_team SET
                            StatusID = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW()
                            WHERE TeamID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $TeamID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Team has been deactivated";
                } else {
                    echo    "Team failed to deactivate";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function activeAccount($TeamID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($TeamID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_team SET
                        StatusID = ?,
                        UpdateBy = ?,
                        UpdateTime = NOW()
                        WHERE TeamID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $TeamID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Team has been activated";
                } else {
                    echo    "Team failed to activate";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
