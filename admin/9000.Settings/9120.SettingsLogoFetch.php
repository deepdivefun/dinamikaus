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

if (strpos($_SERVER['HTTP_REFERER'], '9100.SettingsLogo.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin()) {
    echo    "You don't have access rights to this page";
    die();
}

$StatusID           = filter_input(INPUT_POST, 'StatusID');
$SettingsLogoName   = filter_input(INPUT_POST, 'SettingsLogoName');
$GToken             = filter_input(INPUT_POST, 'GToken');

if (VerifyRecaptchaToken($GToken) == null) {
    echo    "You are spammer! Get out";
    die();
} else {
    try {
        if (empty($StatusID)) {
            throw new Exception("Error Processing Request");
        } else {
            $conn->begin_transaction();

            $query  = "SELECT a.SettingsLogoID, b.StatusID, b.StatusName, a.SettingsLogoName, 
                        a.SettingsLogoValue, a.CreateBy, a.CreateTime, a.UpdateBy, a.UpdateTime 
                        FROM tbl_settings_logo a 
                        LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID
                        WHERE a.StatusID = ? AND a.SettingsLogoName LIKE CONCAT('%', ?, '%')";
            $stmt   = $conn->prepare($query);
            $stmt->bind_param("is", $StatusID, $SettingsLogoName);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result(
                $SettingsLogoID,
                $StatusID,
                $StatusName,
                $SettingsLogoName,
                $SettingsLogoValue,
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
                    $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editSettingsLogo' title='EDIT' SettingsLogoID='$SettingsLogoID' StatusID='$StatusID' SettingsLogoName='$SettingsLogoName' SettingsLogoValue='$SettingsLogoValue' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                    if (SYSAdmin()) {
                        $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editSettingsLogo' title='EDIT' SettingsLogoID='$SettingsLogoID' StatusID='$StatusID' SettingsLogoName='$SettingsLogoName' SettingsLogoValue='$SettingsLogoValue' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugSettingsLogo' title='DEBUG' SettingsLogoID='$SettingsLogoID'><i class='fa-solid fa-eye'></i></button>";
                    }
                }

                $SettingsLogoValue = "<img src='" . WebRootPath() . "assets/img/settingslogo/" . $SettingsLogoValue . "' class='img-fluid h-25 w-25 rounded-5' alt='" . $SettingsLogoValue . "'>";

                $JSONData .= '["' . $SettingsLogoName . '","' . $SettingsLogoValue . '","' . $Button . '"]';
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
