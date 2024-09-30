<?php
require_once('ConnectionClass.php');

class Role
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function fetchRole()
    {
        global $conn;

        $conn->begin_transaction();

        $query  = "SELECT RoleID, RoleName FROM tbl_role LIMIT 3";
        $stmt   = $conn->prepare($query);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($RoleID, $RoleName);
        $result = [];

        while ($stmt->fetch()) {
            $conn->commit();
            $result[] = [
                'RoleID'    => $RoleID,
                'RoleName'  => $RoleName
            ];
        }

        return $result;
        $stmt->close();
        $conn->close();
    }
}
