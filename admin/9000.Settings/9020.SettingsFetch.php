<?php
$WebRootPath = realpath('../');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/ConnectionClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '9000.Settings.php') === FALSE) {
    echo    "<script>
                alert('Invalid Caller');
                document.location.href = '9000.Settings.php';
            </script>";
    die;
}

if ($_SESSION['RoleID'] !== 4) {
    echo    "You don't have access rights to this page";
    die;
}

$StatusID               = filter_input(INPUT_POST, 'StatusID');
$SettingsName           = filter_input(INPUT_POST, 'SettingsName');
$GToken                 = filter_input(INPUT_POST, 'GToken');

if ($GToken == !null) {
    $SecretKey  = '6Le0EGkpAAAAAB-9Mv73FGP_1p5rUCO8jpesJIqP';
    $Token      = $GToken;
    $IP         = $_SERVER['REMOTE_ADDR'];
    $URL        = "https://www.google.com/recaptcha/api/siteverify?secret=" . $SecretKey . "&response=" . $Token . "&remoteip=" . $IP;

    $Request    = file_get_contents($URL);
    $Response   = json_decode($Request);

    if ($Response->success === 0) {
        echo    "You are spammer ! Get the @$%K out";
        die;
    }
}

try {
    if (empty($StatusID)) {
        throw new Exception("Error Processing Request");
    } else {
        $conn->begin_transaction();

        $query  = "SELECT a.SettingsID, b.StatusID, b.Status, a.SettingsName, a.SettingsContents, 
                    a.CreateBy, a.CreateTime, a.UpdateBy, a.UpdateTime 
                    FROM tbl_settings a
                    LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID
                    WHERE a.StatusID = ? AND a.SettingsName LIKE CONCAT('%', ?, '%')";
        $stmt   = $conn->prepare($query);
        $stmt->bind_param("is", $StatusID, $SettingsName);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($SettingsID, $StatusID, $Status, $SettingsName, $SettingsContents, $CreateBy, $CreateTime, $UpdateBy, $UpdateTime);

        $JSONData   = "";

        while ($stmt->fetch()) {
            if ($JSONData !== "") $JSONData .= ",";

            if ($StatusID == 1) {
                $Status = "<span SettingsID='$SettingsID' StatusID='$StatusID' class='badge rounded-pill text-bg-success mx-1'>$Status</span>";
            } else {
                $Status = "<span SettingsID='$SettingsID' StatusID='$StatusID' class='badge rounded-pill text-bg-danger mx-1'>$Status</span>";
            }

            $Button = "<button type='button' class='btn btn-outline-warning rounded-5 mx-1 editSettings' title='EDIT' SettingsID='$SettingsID' StatusID='$StatusID' SettingsName='$SettingsName' SettingsContents='$SettingsContents' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
            $JSONData .= '["' . $SettingsName . '","' . $SettingsContents . '","' . $Status . '","' . $Button . '"]';
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
