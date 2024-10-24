<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ConnectionClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '3000.Team.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin()) {
    echo    "You don't have access rights to this page";
    die();
}

$StatusID       = filter_input(INPUT_POST, 'StatusID');
$FullName       = filter_input(INPUT_POST, 'FullName');
$Position       = filter_input(INPUT_POST, 'Position');
$GToken         = filter_input(INPUT_POST, 'GToken');

if (!empty($GToken)) {
    $SecretKey  = '6Lco2AAjAAAAACZSJFoBUebx-xmcGVjemLtJjEk1';
    $Token      = $GToken;
    $IP         = $_SERVER['REMOTE_ADDR'];
    $URL        = "https://www.google.com/recaptcha/api/siteverify?secret=" . $SecretKey . "&response=" . $Token . "&remoteip=" . $IP;

    $Request    = file_get_contents($URL);
    $Response   = json_decode($Request);

    if ($Response->success === 0) {
        echo    "You are spammer ! Get the @$%K out";
        die();
    }
}

try {
    if (empty($StatusID)) {
        throw new Exception("Error Processing Request");
    } else {
        $conn->begin_transaction();

        $query  = "SELECT a.TeamID, b.StatusID, b.StatusName, a.FullName, a.Position, a.Linkedin, 
                    a.Instagram, a.TeamPhoto, a.CreateBy, a.CreateTime, a.UpdateBy, a.UpdateTime 
                    FROM tbl_team a 
                    LEFT OUTER JOIN tbl_status b ON a.StatusID=b.StatusID 
                    WHERE a.StatusID = ? AND a.FullName LIKE CONCAT('%', ?, '%') AND a.Position LIKE CONCAT('%', ?, '%')";
        $stmt   = $conn->prepare($query);
        $stmt->bind_param("iss", $StatusID, $FullName, $Position);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($TeamID, $StatusID, $StatusName, $FullName, $Position, $Linkedin, $Instagram, $TeamPhoto, $CreateBy, $CreateTime, $UpdateBy, $UpdateTime);

        $JSONData   = "";

        while ($stmt->fetch()) {
            if ($JSONData !== "") $JSONData .= ",";

            if ($StatusID == 1) {
                $StatusName = "<span TeamID='$TeamID' StatusID='$StatusID' class='badge rounded-pill text-bg-success mx-1'>$StatusName</span>";
            } else {
                $StatusName = "<span TeamID='$TeamID' StatusID='$StatusID' class='badge rounded-pill text-bg-danger mx-1'>$StatusName</span>";
            }

            if ($StatusID == 1) {
                $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editTeam' title='EDIT' TeamID='$TeamID' StatusID='$StatusID' FullName='$FullName' Position='$Position' Linkedin='$Linkedin' Instagram='$Instagram' TeamPhoto='$TeamPhoto' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteTeam' title='DELETE' TeamID='$TeamID'><i class='fa-solid fa-trash'></i></button>";
                if (SYSAdmin()) {
                    $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editTeam' title='EDIT' TeamID='$TeamID' StatusID='$StatusID' FullName='$FullName' Position='$Position' Linkedin='$Linkedin' Instagram='$Instagram' TeamPhoto='$TeamPhoto' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteTeam' title='DELETE' TeamID='$TeamID'><i class='fa-solid fa-trash'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugTeam' title='DEBUG' TeamID='$TeamID'><i class='fa-solid fa-eye'></i></button>";
                }
            } else {
                $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeTeam' title='ACTIVATE' TeamID='$TeamID'><i class='fa-solid fa-check'></i></button>";
                if (SYSAdmin()) {
                    $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeTeam' title='ACTIVATE' TeamID='$TeamID'><i class='fa-solid fa-check'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugTeam' title='DEBUG' TeamID='$TeamID'><i class='fa-solid fa-eye'></i></button>";
                }
            }

            $TeamPhoto = "<img src='" . WebRootPath() . "assets/img/teamphoto/" . $TeamPhoto . "' class='img-fluid h-50 w-auto rounded-5' alt='" . $TeamPhoto . "'>";

            $JSONData .= '["' . $FullName . '", "' . $Position . '", "' . $TeamPhoto . '", "' . $StatusName . '", "' . $Button . '"]';
        }

        if ($JSONData == null) {
            $JSONData = ["", "", "", "", ""];
            echo "[" . json_encode($JSONData) . "]";
        } else {
            $conn->commit();
            echo "[" . $JSONData . "]";
        }

        $stmt->close();
    }
} catch (Exception $e) {
    $conn->rollback();
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
