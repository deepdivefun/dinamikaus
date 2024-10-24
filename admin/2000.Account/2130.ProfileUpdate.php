<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/AccountClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '2100.Profile.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

$UserID             = filter_input(INPUT_POST, 'UserID');
$Username           = filter_input(INPUT_POST, 'Username');
$Password           = filter_input(INPUT_POST, 'Password');
$ConfirmPassword    = filter_input(INPUT_POST, 'ConfirmPassword');
$Email              = filter_input(INPUT_POST, 'Email');
$FullName           = filter_input(INPUT_POST, 'FullName');
$UpdateBy           = filter_input(INPUT_POST, 'UpdateBy');
$EventLogUser       = $UpdateBy;
$EventLogData       = $FullName . ' Updated Profile';
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
    if (empty($UserID) and empty($Username) and empty($Email) and empty($FullName) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {

        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $User = new Account();
        $User->updateAccountByID(
            $UserID,
            $Username,
            $Password,
            $ConfirmPassword,
            $Email,
            $FullName,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
