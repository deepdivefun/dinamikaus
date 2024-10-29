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

if (strpos($_SERVER['HTTP_REFERER'], '9000.Settings.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin()) {
    echo    "You don't have access rights to this page";
    die();
}

$SettingsID         = filter_input(INPUT_POST, "SettingsID");
$StatusID           = filter_input(INPUT_POST, "StatusID");
$SettingsName       = filter_input(INPUT_POST, "SettingsName");
$SettingsValue      = filter_input(INPUT_POST, "SettingsValue");
$UpdateBy           = filter_input(INPUT_POST, 'UpdateBy');
$EventLogUser       = $UpdateBy;
$EventLogData       = 'Update Settings ' . $SettingsName;
$GToken             = filter_input(INPUT_POST, 'GToken');

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
    if (empty($SettingsID) and empty($StatusID) and empty($SettingsName) and empty($SettingsValue) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $Settings = new Settings();
        $Settings->updateSettings(
            $SettingsID,
            $StatusID,
            $SettingsName,
            $SettingsValue,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
