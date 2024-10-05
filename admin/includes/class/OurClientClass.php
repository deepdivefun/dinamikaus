<?php
require_once('ConnectionClass.php');

class OurClient
{
    public $OurClientID, $StatusID, $OurClientName, $OurClientPhoto, $CreateBy, $CreateTime,
        $UpdateBy, $UpdateTime;
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function createOurClient($StatusID, $OurClientName, $OurClientPhotoConvert, $CreateBy)
    {
        global $conn;

        try {
            if (empty($StatusID) and empty($OurClientName) and empty($OurClientPhotoConvert) and empty($CreateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "INSERT INTO tbl_ourclient (StatusID, OurClientName, OurClientPhoto, CreateBy) 
                            VALUES (?, ?, ?, ?)";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isss", $StatusID, $OurClientName, $OurClientPhotoConvert, $CreateBy);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo "Our Client created successfully";
                } else {
                    $conn->rollback();
                    echo "Failed to create our client";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function updateOurClient($OurClientID, $StatusID, $OurClientName, $OurClientPhotoConvert, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($OurClientID) and empty($StatusID) and empty($OurClientName) and empty($OurClientPhotoConvert) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $query  = "UPDATE tbl_ourclient SET 
                            StatusID = ?,
                            OurClientName = ?,
                            OurclientPhoto = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE OurClientID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isssi", $StatusID, $OurClientName, $OurClientPhotoConvert, $UpdateBy, $OurClientID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Our Client has been updated";
                } else {
                    echo    "Failed to update our client";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
