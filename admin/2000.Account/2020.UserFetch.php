<?php
$WebRootPath = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ConnectionClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '2000.User.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin()) {
    echo    "You don't have access rights to this page";
    die();
}

$RoleID         = filter_input(INPUT_POST, 'RoleID');
$StatusID       = filter_input(INPUT_POST, 'StatusID');
$Username       = filter_input(INPUT_POST, 'Username');
$Email          = filter_input(INPUT_POST, 'Email');
$GToken         = filter_input(INPUT_POST, 'GToken');

if ($GToken != null) {
    $SecretKey  = '6Lco2AAjAAAAACZSJFoBUebx-xmcGVjemLtJjEk1';
    $Token      = $GToken;
    $IP         = $_SERVER['REMOTE_ADDR'];
    $URL        = "https://www.google.com/recaptcha/api/siteverify?secret=" . $SecretKey . "&response=" . $Token . "&remoteip=" . $IP;

    $Request    = file_get_contents($URL);
    $Response   = json_decode($Request);

    if ($Response->success == 0) {
        echo    "You are spammer ! Get the @$%K out";
        die();
    }
}

try {
    if (empty($StatusID) and empty($RoleID)) {
        throw new Exception("Error Processing Request");
    } else {
        $conn->begin_transaction();

        $query  = "SELECT a.UserID, b.RoleID, b.RoleName, c.StatusID, c.StatusName, a.Username, a.Password, 
                    a.Email, a.FullName, a.ResetTokenHash, a.ResetTokenExpired, a.CreateBy, a.CreateTime, 
                    a.UpdateBy, a.UpdateTime FROM tbl_user a 
                    LEFT OUTER JOIN tbl_role b ON a.RoleID=b.RoleID 
                    LEFT OUTER JOIN tbl_status c ON a.StatusID=c.StatusID
                    WHERE a.RoleID = ? AND a.StatusID = ? 
                    AND a.Username LIKE CONCAT('%', ?, '%') AND a.Email LIKE CONCAT('%', ?, '%')";
        $stmt   = $conn->prepare($query);
        $stmt->bind_param("iiss", $RoleID, $StatusID, $Username, $Email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result(
            $UserID,
            $RoleID,
            $RoleName,
            $StatusID,
            $StatusName,
            $Username,
            $Password,
            $Email,
            $FullName,
            $ResetTokenHash,
            $ResetTokenExpired,
            $CreateBy,
            $CreateTime,
            $UpdateBy,
            $UpdateTime
        );

        $JSONData   = "";

        while ($stmt->fetch()) {
            if ($JSONData !== "") $JSONData .= ",";

            if ($StatusID == 1) {
                $StatusName = "<span UserID='$UserID' StatusID='$StatusID' class='badge rounded-pill text-bg-success mx-1'>$StatusName</span>";
            } else {
                $StatusName = "<span UserID='$UserID' StatusID='$StatusID' class='badge rounded-pill text-bg-danger mx-1'>$StatusName</span>";
            }

            if ($RoleID == 3) {
                $RoleName   = "<span UserID='$UserID' RoleID='$RoleID' class='badge rounded-pill text-bg-warning mx-1'>$RoleName</span>";
            } elseif ($RoleID == 2) {
                $RoleName   = "<span UserID='$UserID' RoleID='$RoleID' class='badge rounded-pill text-bg-info mx-1'>$RoleName</span>";
            } elseif ($RoleID == 1) {
                $RoleName   = "<span UserID='$UserID' RoleID='$RoleID' class='badge rounded-pill text-bg-success mx-1'>$RoleName</span>";
            } else {
                $RoleName   = "<span UserID='$UserID' RoleID='$RoleID' class='badge rounded-pill text-bg-secondary mx-1'>$RoleName</span>";
            }

            if ($StatusID == 1) {
                $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editUser' title='EDIT' UserID='$UserID' RoleID='$RoleID' StatusID='$StatusID' Username='$Username' Password='$Password' Email='$Email' FullName='$FullName' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteUser' title='DELETE' UserID='$UserID'><i class='fa-solid fa-trash'></i></button>";
                if ($_SESSION['RoleID'] == 4) {
                    $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editUser' title='EDIT' UserID='$UserID' RoleID='$RoleID' StatusID='$StatusID' Username='$Username' Password='$Password' Email='$Email' FullName='$FullName' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteUser' title='DELETE' UserID='$UserID'><i class='fa-solid fa-trash'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugUser' title='DEBUG' UserID='$UserID'><i class='fa-solid fa-eye'></i></button>";
                }
            } else {
                $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeUser' title='ACTIVATE' UserID='$UserID'><i class='fa-solid fa-check'></i></button>";
                if ($_SESSION['RoleID'] == 4) {
                    $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeUser' title='ACTIVATE' UserID='$UserID'><i class='fa-solid fa-check'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugUser' title='DEBUG' UserID='$UserID'><i class='fa-solid fa-eye'></i></button>";
                }
            }

            $JSONData .= '["' . $Username . '","' . $Email . '", "' . $RoleName . '","' . $StatusName . '","' . $Button . '"]';
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
