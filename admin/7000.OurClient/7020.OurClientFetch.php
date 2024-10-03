<?php
$WebRootPath = realpath('../');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/ConnectionClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '7000.OurClient.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3 and $_SESSION['RoleID'] !== 2 and $_SESSION['RoleID'] !== 1) {
    echo    "You don't have access rights to this page";
    die();
}

$StatusID       = filter_input(INPUT_POST, 'StatusID');
$OurClientName  = filter_input(INPUT_POST, 'OurClientName');
$GToken         = filter_input(INPUT_POST, 'GToken');

if ($GToken != null) {
    $SecretKey  = '6Le0EGkpAAAAAB-9Mv73FGP_1p5rUCO8jpesJIqP';
    $Token      = $GToken;
    $IP         = $_SERVER['REMOTE_ADDR'];
    $URL        = "https://www.google.com/recaptcha/api/siteverify?secret=" . $SecretKey . "&response=" . $Token . "&remoteip=" . $IP;

    $Request    = file_get_contents($URL);
    $Response   = json_decode($Request);

    if ($Response->success == 0) {
        echo    "You are spammer ! Get the @$%K out";
        die;
    }
}

try {
    if (empty($StatusID)) {
        throw new Exception("Error Processing Request");
    } else {
        $conn->begin_transaction();

        $query  = "SELECT a.OurClientID, b.StatusID, b.StatusName, a.OurClientName, a.OurClientPhoto, 
                    a.CreateBy, a.CreateTime, a.UpdateBy, a.UpdateTime FROM tbl_ourclient a 
                    LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID 
                    WHERE a.StatusID = ? AND a.OurClientName LIKE CONCAT('%', ?, '%')";
        $stmt   = $conn->prepare($query);
        $stmt->bind_param("is", $StatusID, $OurClientName);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result(
            $OurClientID,
            $StatusID,
            $StatusName,
            $OurClientName,
            $OurClientPhoto,
            $CreateBy,
            $CreateTime,
            $UpdateBy,
            $UpdateTime
        );

        $JSONData   = "";

        while ($stmt->fetch()) {
            if ($JSONData !== "") $JSONData .= ",";

            if ($StatusID == 1) {
                $StatusName = "<span StatusID='$StatusID' class='badge rounded-pill text-bg-success mx-1'>$StatusName</span>";
            } else {
                $StatusName = "<span StatusID='$StatusID' class='badge rounded-pill text-bg-danger mx-1'>$StatusName</span>";
            }

            if ($StatusID == 1) {
                $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editOurClient' title='EDIT' OurClientID='$OurClientID' StatusID='$StatusID' OurClientName='$OurClientName' OurClientPhoto='$OurClientPhoto' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteOurClient' title='DELETE' OurClientID='$OurClientID'><i class='fa-solid fa-trash'></i></button>";
                if ($_SESSION['RoleID'] == 4) {
                    $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editOurClient' title='EDIT' OurClientID='$OurClientID' StatusID='$StatusID' OurClientName='$OurClientName' OurClientPhoto='$OurClientPhoto' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteOurClient' title='DELETE' OurClientID='$OurClientID'><i class='fa-solid fa-trash'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugOurClient' title='DEBUG' OurClientID='$OurClientID'><i class='fa-solid fa-eye'></i></button>";
                }
            } else {
                $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeOurClient' title='ACTIVATE' OurClientID='$OurClientID'><i class='fa-solid fa-check'></i></button>";
                if ($_SESSION['RoleID'] == 4) {
                    $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeOurClient' title='ACTIVATE' OurClientID='$OurClientID'><i class='fa-solid fa-check'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugOurClient' title='DEBUG' OurClientID='$OurClientID'><i class='fa-solid fa-eye'></i></button>";
                }
            }

            $OurClientPhoto = "<img src='" . WebRootPath() . "assets/img/ourclientphoto/" . $OurClientPhoto . "' class='img-fluid h-25 w-25 rounded-5' alt='" . $OurClientPhoto . "'>";

            $JSONData .= '["' . $OurClientName . '", "' . $OurClientPhoto . '", "' . $StatusName . '", "' . $Button . '"]';
        }

        if ($JSONData == null) {
            $JSONData = ["", "", "", ""];
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
