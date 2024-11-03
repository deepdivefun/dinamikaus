<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/SettingsClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');
require_once($WebRootPath . '/includes/class/VerifyRecaptchaTokenFunction.php');

if (strpos($_SERVER['HTTP_REFERER'], '9100.SettingsLogo.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin()) {
    echo    "You don't have access rights to this page";
    die();
}

$StatusID                   = filter_input(INPUT_POST, "StatusID");
$SettingsLogoName           = filter_input(INPUT_POST, "SettingsLogoName");

if (isset($_FILES['SettingsLogoValue']) != null) {
    $SettingsLogoValue          = $_FILES['SettingsLogoValue']['name'];
    $Dir                        = "../assets/img/settingslogo/";
    $File                       = $_FILES['SettingsLogoValue']['tmp_name'];
    $SettingsLogoValueConvert   =  uniqid() . "-" . date('Y-m-d') . "-" . $SettingsLogoValue;
    move_uploaded_file($File, $Dir . $SettingsLogoValueConvert);
} else {
    $SettingsLogoValueConvert   = null;
}

$CreateBy           = filter_input(INPUT_POST, 'CreateBy');
$EventLogUser       = $CreateBy;
$EventLogData       = 'Create Settings Logo ' . $SettingsLogoName;
$GToken             = filter_input(INPUT_POST, 'GToken');

if (VerifyRecaptchaToken($GToken) == null) {
    echo    "You are spammer! Get out";
    die();
} else {
    try {
        if (empty($StatusID) and empty($SettingsLogoName) and empty($SettingsLogoValueConvert) and empty($CreateBy)) {
            throw new Exception("Error Processing Request");
        } else {
            $EventLog = new EventLog();
            $EventLog->createEventLog(
                $EventLogUser,
                $EventLogData
            );

            $Settings = new Settings();
            $Settings->createSettingsLogo(
                $StatusID,
                $SettingsLogoName,
                $SettingsLogoValueConvert,
                $CreateBy
            );
        }
    } catch (Exception $e) {
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
