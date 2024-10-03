<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/AccountClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '2000.User.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin()) {
    echo    "You don't have access rights to this page";
    die();
}

$RoleID             = filter_input(INPUT_POST, 'RoleID');
$StatusID           = filter_input(INPUT_POST, 'StatusID');
$Username           = filter_input(INPUT_POST, 'Username');
$Password           = filter_input(INPUT_POST, 'Password');
$ConfirmPassword    = filter_input(INPUT_POST, 'ConfirmPassword');
$Email              = filter_input(INPUT_POST, 'Email');
$FullName           = filter_input(INPUT_POST, 'FullName');
$CreateBy           = filter_input(INPUT_POST, 'CreateBy');
$EventLogUser       = $CreateBy;
$EventLogData       = 'Create Account ' . $Username;
$GToken             = filter_input(INPUT_POST, 'GToken');

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
    if (empty($RoleID) and empty($StatusID) and empty($Username) and empty($Password) and empty($ConfirmPassword) and empty($Email) and empty($FullName) and empty($CreateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $User = new Account();
        $User->createAccount(
            $RoleID,
            $StatusID,
            $Username,
            $Password,
            $ConfirmPassword,
            $Email,
            $FullName,
            $CreateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
