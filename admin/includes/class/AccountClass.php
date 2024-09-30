<?php
require_once('ConnectionClass.php');

class Account
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function isUsernameExists($Username)
    {
        global $conn;

        try {
            if (empty($Username)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "SELECT Username FROM tbl_user WHERE Username = ? LIMIT 1";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("s", $Username);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($Username);
                $stmt->fetch();

                if ($stmt->num_rows > 0) {
                    $conn->commit();
                    return true;
                } else {
                    return false;
                }
                $stmt->close();
            }
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
        $conn->close();
    }

    public function isEmailExists($Email)
    {
        global $conn;

        try {
            if (empty($Email)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "SELECT Email FROM tbl_user WHERE Email = ? LIMIT 1";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("s", $Email);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($Email);
                $stmt->fetch();

                if ($stmt->num_rows > 0) {
                    $conn->commit();
                    return true;
                } else {
                    return false;
                }
                $stmt->close();
            }
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
        $conn->close();
    }

    public function isPasswordMatch($Password, $ConfirmPassword)
    {
        try {
            if (empty($Password) and empty($ConfirmPassword)) {
                throw new Exception("Error Processing Request");
            } else {
                if ($Password !== $ConfirmPassword) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function createAccount($RoleID, $StatusID, $Username, $Password, $ConfirmPassword, $Email, $FullName, $CreateBy)
    {
        global $conn;

        try {
            if (empty($RoleID) and empty($StatusID) and empty($Username) and empty($Password) and empty($ConfirmPassword) and empty($Email) and empty($FullName) and empty($CreateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                if ($this->isUsernameExists($Username)) {
                    echo   "Username already exists";

                    return false;
                }

                if ($this->isEmailExists($Email)) {
                    echo   "Email already exists";

                    return false;
                }

                if ($this->isPasswordMatch($Password, $ConfirmPassword)) {
                    echo   "Password and Confirm Password not match";

                    return false;
                }

                $Password   = password_hash($Password, PASSWORD_BCRYPT);

                $query      = "INSERT INTO tbl_user (RoleID, StatusID, Username, Password, Email, FullName, CreateBy)
                                VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt       = $conn->prepare($query);
                $stmt->bind_param("iisssss", $RoleID, $StatusID, $Username, $Password, $Email, $FullName, $CreateBy);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "User created successfully";
                } else {
                    echo    "Failed to create user";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function updateAccount($UserID, $RoleID, $StatusID, $Username, $Password, $ConfirmPassword, $Email, $FullName, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($UserID) and empty($RoleID) and empty($StatusID) and empty($Username) and empty($Email) and empty($FullName) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } elseif (empty($Password) and empty($ConfirmPassword)) {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_user SET 
                            RoleID = ?,
                            StatusID = ?,
                            Username = ?,
                            Email = ?,
                            FullName = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE UserID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("iissssi", $RoleID, $StatusID, $Username, $Email, $FullName, $UpdateBy, $UserID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "User has been updated";
                } else {
                    echo    "Failed to update user";
                }

                $stmt->close();
            } else {
                $conn->begin_transaction();

                if ($this->isPasswordMatch($Password, $ConfirmPassword)) {
                    echo   "Password and Confirm Password not match";

                    return false;
                }

                $Password   = password_hash($Password, PASSWORD_BCRYPT);

                $query  = "UPDATE tbl_user SET
                            RoleID = ?,
                            StatusID = ?,
                            Username = ?,
                            Password = ?,
                            Email = ?,
                            FullName = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW()
                            WHERE UserID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("iisssssi", $RoleID, $StatusID, $Username, $Password, $Email, $FullName, $UpdateBy, $UserID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "User has been updated";
                } else {
                    echo    "Failed to update user";
                }

                $stmt->close();
            }
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function deleteAccount($UserID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($UserID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_user SET
                            StatusID = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW()
                            WHERE UserID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $UserID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "User has been deactivated";
                } else {
                    echo    "User failed to deactivate";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function activeAccount($UserID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($UserID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_user SET
                        StatusID = ?,
                        UpdateBy = ?,
                        UpdateTime = NOW()
                        WHERE UserID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("isi", $StatusID, $UpdateBy, $UserID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "User has been activated";
                } else {
                    echo    "User failed to activate";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function fetchAccountByID($UserID)
    {
        global $conn;

        try {
            if (empty($UserID)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "SELECT a.UserID, b.RoleID, b.RoleName, c.StatusID, c.StatusName, a.Username, 
                            a.Password, a.Email, a.FullName FROM tbl_user a 
                            LEFT OUTER JOIN tbl_role b ON a.RoleID=b.RoleID 
                            LEFT OUTER JOIN tbl_status c ON a.StatusID=c.StatusID 
                            WHERE a.UserID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("i", $UserID);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($UserID, $RoleID, $RoleName, $StatusID, $StatusName, $Username, $Password, $Email, $FullName);

                $result = [];

                while ($stmt->fetch()) {
                    $conn->commit();
                    $result[] = [
                        'UserID'        => $UserID,
                        'RoleID'        => $RoleID,
                        'RoleName'      => $RoleName,
                        'StatusID'      => $StatusID,
                        'StatusName'    => $StatusName,
                        'Username'      => $Username,
                        'Password'      => $Password,
                        'Email'         => $Email,
                        'FullName'      => $FullName
                    ];
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
        return $result;
    }

    public function updateAccountByID($UserID, $Username, $Password, $ConfirmPassword, $Email, $FullName, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($UserID) and empty($Username) and empty($Email) and empty($FullName) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } elseif (empty($Password) and empty($ConfirmPassword)) {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_user SET 
                            Username = ?,
                            Email = ?,
                            FullName = ?,
                            UpdateBy = ?,
                            UpdateTime = NOW()
                            WHERE UserID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("ssssi", $Username, $Email, $FullName, $UpdateBy, $UserID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Profile updated successfully";
                } else {
                    echo    "Failed to update profile";
                }
                $stmt->close();
            } else {
                $conn->begin_transaction();

                if ($this->isPasswordMatch($Password, $ConfirmPassword)) {
                    echo   "Password does not match";
                    return false;
                }

                $Password   = password_hash($Password, PASSWORD_BCRYPT);

                $query  = "UPDATE tbl_user SET  
                            Username = ?, 
                            Password = ?, 
                            Email = ?,
                            FullName = ?, 
                            UpdateBy = ?,
                            UpdateTime = NOW() 
                            WHERE UserID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("sssssi", $Username, $Password, $Email, $FullName, $UpdateBy, $UserID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Profile updated successfully";
                } else {
                    echo    "Failed to update profile";
                }
                $stmt->close();
            }
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
