<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ContactClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');
require_once($WebRootPath . '/includes/class/VerifyRecaptchaTokenFunction.php');

if (strpos($_SERVER['HTTP_REFERER'], '8000.Contact.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin()) {
    echo    "You don't have access rights to this page";
    die();
}

$StatusID           = filter_input(INPUT_POST, 'StatusID');
$ContactNameArea    = filter_input(INPUT_POST, 'ContactNameArea');
$ContactAddress     = filter_input(INPUT_POST, 'ContactAddress');
$ContactLinkGmaps   = filter_input(INPUT_POST, 'ContactLinkGmaps');
$ContactNumber      = filter_input(INPUT_POST, 'ContactNumber');
$ContactEmail       = filter_input(INPUT_POST, 'ContactEmail');
$CreateBy           = filter_input(INPUT_POST, 'CreateBy');
$EventLogUser       = $CreateBy;
$EventLogData       = 'Create Contact For Area ' . $ContactNameArea;
$GToken             = filter_input(INPUT_POST, 'GToken');

if (VerifyRecaptchaToken($GToken) == null) {
    echo    "You are spammer! Get out";
    die();
} else {
    try {
        if (empty($StatusID) and empty($ContactNameArea) and empty($ContactEmail) and empty($CreateBy)) {
            throw new Exception("Error Processing Request");
        } else {
            $EventLog = new EventLog();
            $EventLog->createEventLog(
                $EventLogUser,
                $EventLogData
            );

            $Contact = new Contact();
            $Contact->createContact(
                $StatusID,
                $ContactNameArea,
                $ContactAddress,
                $ContactLinkGmaps,
                $ContactNumber,
                $ContactEmail,
                $CreateBy
            );
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
