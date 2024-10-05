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

$OurClientID                    = filter_input(INPUT_POST, 'OurClientID');

$OurClientPhotoBeforeConvert    = filter_input(INPUT_POST, 'OurClientPhotoBeforeConvert');
if (file_exists("../assets/img/ourclientphoto/$OurClientPhotoBeforeConvert")) {
    unlink("../assets/img/ourclientphoto/$OurClientPhotoBeforeConvert");
}

$StatusID                       = filter_input(INPUT_POST, 'StatusID');
$OurClientName                  = filter_input(INPUT_POST, 'OurClientName');

$OurClientPhoto                 = $_FILES['OurClientPhoto']['name'];
$Dir                            = "../assets/img/ourclientphoto/";
$File                           = $_FILES['OurClientPhoto']['tmp_name'];
$OurClientPhotoConvert          =  uniqid() . "-" . date('Y-m-d') . "-" . $OurClientPhoto;
move_uploaded_file($File, $Dir . $OurClientPhotoConvert);

$UpdateBy                       = filter_input(INPUT_POST, 'UpdateBy');
$EventLogUser                   = $UpdateBy;
$EventLogData                   = 'Update Our Client ' . $OurClientName;
$GToken                         = filter_input(INPUT_POST, 'GToken');

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
    if (empty($OurClientID) and empty($StatusID) and empty($OurClientName) and empty($OurClientPhotoConvert) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $OurClient = new OurClient();
        $OurClient->updateOurClient(
            $OurClientID,
            $StatusID,
            $OurClientName,
            $OurClientPhotoConvert,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
