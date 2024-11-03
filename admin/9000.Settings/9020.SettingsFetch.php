<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ConnectionClass.php');
require_once($WebRootPath . '/includes/class/VerifyRecaptchaTokenFunction.php');

if (strpos($_SERVER['HTTP_REFERER'], '9000.Settings.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin()) {
    echo    "You don't have access rights to this page";
    die();
}

$StatusID       = filter_input(INPUT_POST, 'StatusID');
$SettingsName   = filter_input(INPUT_POST, 'SettingsName');
$GToken         = filter_input(INPUT_POST, 'GToken');

if (VerifyRecaptchaToken($GToken) == null) {
    echo    "You are spammer! Get out";
    die();
} else {
    try {
        if (empty($StatusID)) {
            throw new Exception("Error Processing Request");
        } else {
            $conn->begin_transaction();

            $query  = "SELECT a.SettingsID, b.StatusID, b.StatusName, a.SettingsName, a.SettingsValue, 
                        a.CreateBy, a.CreateTime, a.UpdateBy, a.UpdateTime FROM tbl_settings a
                        LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID
                        WHERE a.StatusID = ? AND a.SettingsName LIKE CONCAT('%', ?, '%')";
            $stmt   = $conn->prepare($query);
            $stmt->bind_param("is", $StatusID, $SettingsName);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result(
                $SettingsID,
                $StatusID,
                $StatusName,
                $SettingsName,
                $SettingsValue,
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

                $SettingsValueConvert = trim(preg_replace('/\s+/', ' ', $SettingsValue));

                if ($StatusID == 1) {
                    $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editSettings' title='EDIT' SettingsID='$SettingsID' StatusID='$StatusID' SettingsName='$SettingsName' SettingsValue='$SettingsValueConvert' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                    if (SYSAdmin()) {
                        $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editSettings' title='EDIT' SettingsID='$SettingsID' StatusID='$StatusID' SettingsName='$SettingsName' SettingsValue='$SettingsValueConvert' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugSettings' title='DEBUG' SettingsID='$SettingsID'><i class='fa-solid fa-eye'></i></button>";
                    }
                }

                $JSONData .= '["' . $SettingsName . '","' . $SettingsValueConvert . '","' . $Button . '"]';
            }

            if ($JSONData == null) {
                $JSONData = ["", "", ""];
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
}

// if (!empty($GToken)) {
//     $SecretKey  = '6Lco2AAjAAAAACZSJFoBUebx-xmcGVjemLtJjEk1';
//     $Token      = $GToken;
//     $IP         = $_SERVER['REMOTE_ADDR'];
//     $URL        = "https://www.google.com/recaptcha/api/siteverify?secret=" . $SecretKey . "&response=" . $Token . "&remoteip=" . $IP;

//     $Request    = file_get_contents($URL);
//     $Response   = json_decode($Request);

//     if ($Response->success === 0) {
//         echo    "You are spammer ! Get the @$%K out";
//         die();
//     }
// }