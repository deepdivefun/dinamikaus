<?php
require_once('ConnectionClass.php');

class Team
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function fetchTeam($StatusName = 'Active')
    {
        global $conn;

        $query  = "SELECT a.TeamID, b.StatusID, b.StatusName, a.FullName, a.Position, a.Linkedin, 
                    a.Instagram, a.TeamPhoto FROM tbl_team a 
                    LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID 
                    WHERE b.StatusName = ?";
        $stmt   = $conn->prepare($query);
        $stmt->bind_param("s", $StatusName);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result(
            $TeamID,
            $StatusID,
            $StatusName,
            $FullName,
            $Position,
            $Linkedin,
            $Instagram,
            $TeamPhoto
        );

        $result = [];

        while ($stmt->fetch()) {
            $result[]   = [
                'TeamID'        => $TeamID,
                'StatusID'      => $StatusID,
                'StatusName'    => $StatusName,
                'FullName'      => $FullName,
                'Position'      => $Position,
                'Linkedin'      => $Linkedin,
                'Instagram'     => $Instagram,
                'TeamPhoto'     => $TeamPhoto
            ];
        }

        return $result;
        $stmt->close();
        $conn->close();
    }
}
