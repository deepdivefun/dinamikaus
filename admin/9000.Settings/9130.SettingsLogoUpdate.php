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

if (strpos($_SERVER['HTTP_REFERER'], '9100.SettingsLogo.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin()) {
    echo    "You don't have access rights to this page";
    die();
}

$SettingsLogoID                 = filter_input(INPUT_POST, "SettingsLogoID");
$SettingsLogoValueBeforeConvert = filter_input(INPUT_POST, "SettingsLogoValueBeforeConvert");

if (isset($_FILES['SettingsLogoValue']) != null) {

    if ($SettingsLogoValueBeforeConvert != null) {
        if (file_exists("../assets/img/settingslogo/$SettingsLogoValueBeforeConvert")) {
            unlink("../assets/img/settingslogo/$SettingsLogoValueBeforeConvert");
        }
    }

    $SettingsLogoValue          = $_FILES['SettingsLogoValue']['name'];
    $Dir                        = "../assets/img/settingslogo/";
    $File                       = $_FILES['SettingsLogoValue']['tmp_name'];
    $SettingsLogoValueConvert   =  uniqid() . "-" . date('Y-m-d') . "-" . $SettingsLogoValue;
    move_uploaded_file($File, $Dir . $SettingsLogoValueConvert);
} else {
    $SettingsLogoValueConvert   = $SettingsLogoValueBeforeConvert;
}

$StatusID                       = filter_input(INPUT_POST, "StatusID");
$SettingsLogoName               = filter_input(INPUT_POST, "SettingsLogoName");
$UpdateBy                       = filter_input(INPUT_POST, 'UpdateBy');
$EventLogUser                   = $UpdateBy;
$EventLogData                   = 'Update Settings Logo ' . $SettingsLogoName;
$GToken                         = filter_input(INPUT_POST, 'GToken');

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
    if (empty($SettingsLogoID) and empty($StatusID) and empty($SettingsLogoName) and empty($SettingsLogoValueConvert) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $Settings = new Settings();
        $Settings->updateSettingsLogo(
            $SettingsLogoID,
            $StatusID,
            $SettingsLogoName,
            $SettingsLogoValueConvert,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
