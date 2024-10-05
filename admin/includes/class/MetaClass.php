<?php
require_once('ConnectionClass.php');

class Meta
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function createMeta($StatusID, $Name, $Content, $CreateBy)
    {
        global $conn;

        try {
            if (empty($StatusID) and empty($CreateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "INSERT INTO tbl_meta (StatusID, Name, Content, CreateBy) 
                            VALUES (?, ?, ?, ?)";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isss", $StatusID, $Name, $Content, $CreateBy);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo "Meta created successfully";
                } else {
                    $conn->rollback();
                    echo "Failed to create meta";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function updateMeta($MetaID, $StatusID, $Name, $Content, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($MetaID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_meta SET 
                            StatusID = ?, 
                            Name = ?, 
                            Content = ?, 
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE MetaID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isssi", $StatusID, $Name, $Content, $UpdateBy, $MetaID);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Meta has been updated";
                } else {
                    echo    "Failed to update meta";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function deleteMeta($MetaID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($MetaID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_meta SET 
                            StatusID = ?, 
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE MetaID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $MetaID);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Meta has been deactivated";
                } else {
                    echo    "Meta failed to deactivate";
                }
            }

            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function activeMeta($MetaID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($MetaID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_meta SET 
                            StatusID = ?, 
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE MetaID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $MetaID);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Meta has been activated";
                } else {
                    echo    "Meta failed to activate";
                }
            }

            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
