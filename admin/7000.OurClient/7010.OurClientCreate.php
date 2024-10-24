<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/OurClientClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '7000.OurClient.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
    echo    "You don't have access rights to this page";
    die();
}

$StatusID               = filter_input(INPUT_POST, 'StatusID');
$OurClientName          = filter_input(INPUT_POST, 'OurClientName');

$OurClientPhoto         = $_FILES['OurClientPhoto']['name'];
$Dir                    = "../assets/img/ourclientphoto/";
$File                   = $_FILES['OurClientPhoto']['tmp_name'];
$OurClientPhotoConvert  =  uniqid() . "-" . date('Y-m-d') . "-" . $OurClientPhoto;
move_uploaded_file($File, $Dir . $OurClientPhotoConvert);

$CreateBy               = filter_input(INPUT_POST, 'CreateBy');
$EventLogUser           = $CreateBy;
$EventLogData           = 'Create Our Client ' . $OurClientName;
$GToken                 = filter_input(INPUT_POST, 'GToken');

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
    if (empty($StatusID) and empty($OurClientName) and empty($OurClientPhotoConvert) and empty($CreateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $OurClient = new OurClient();
        $OurClient->createOurClient(
            $StatusID,
            $OurClientName,
            $OurClientPhotoConvert,
            $CreateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
