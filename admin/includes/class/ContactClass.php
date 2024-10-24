<?php
require_once('ConnectionClass.php');

class Contact
{
    public $ContactID, $StatusID, $ContactNameArea, $ContactAddress, $ContactLinkGmaps, $ContactNumber,
        $ContactEmail, $CreateBy, $CreateTime, $UpdateBy, $UpdateTime;

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function createContact($StatusID, $ContactNameArea, $ContactAddress, $ContactLinkGmaps, $ContactNumber, $ContactEmail, $CreateBy)
    {
        global $conn;

        try {
            if (empty($StatusID) and empty($ContactNameArea) and empty($ContactEmail) and empty($CreateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "INSERT INTO tbl_contact (StatusID, ContactNameArea, ContactAddress, ContactLinkGmaps, ContactNumber, ContactEmail, CreateBy) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("issssss", $StatusID, $ContactNameArea, $ContactAddress, $ContactLinkGmaps, $ContactNumber, $ContactEmail, $CreateBy);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Contact created successfully";
                } else {
                    echo    "Failed to create contact";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function updateContact($ContactID, $StatusID, $ContactNameArea, $ContactAddress, $ContactLinkGmaps, $ContactNumber, $ContactEmail, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($ContactID) and empty($StatusID) and empty($ContactNameArea) and empty($ContactEmail) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_contact SET 
                            StatusID = ?,
                            ContactNameArea = ?,
                            ContactAddress = ?,
                            ContactLinkGmaps = ?,
                            ContactNumber = ?,
                            ContactEmail = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE ContactID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("issssssi", $StatusID, $ContactNameArea, $ContactAddress, $ContactLinkGmaps, $ContactNumber, $ContactEmail, $UpdateBy, $ContactID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Contact has been updated";
                } else {
                    echo    "Failed to update contact";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function deleteContact($ContactID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($ContactID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_contact SET 
                            StatusID = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE ContactID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $ContactID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Contact has been deactivated";
                } else {
                    echo    "Contact failed to deactivate";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function activeContact($ContactID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($ContactID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_contact SET 
                            StatusID = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE ContactID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $ContactID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Contact has been activated";
                } else {
                    echo    "Contact failed to activate";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
