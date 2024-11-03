<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/PaymentLogoClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');
require_once($WebRootPath . '/includes/class/VerifyRecaptchaTokenFunction.php');

if (strpos($_SERVER['HTTP_REFERER'], '10000.PaymentLogo.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin()) {
    echo    "You don't have access rights to this page";
    die();
}

$StatusID               = filter_input(INPUT_POST, 'StatusID');
$PaymentName            = filter_input(INPUT_POST, 'PaymentName');

if (isset($_FILES['PaymentPhoto']) != null) {
    $PaymentPhoto           = $_FILES['PaymentPhoto']['name'];
    $Dir                    = "../assets/img/paymentlogo/";
    $File                   = $_FILES['PaymentPhoto']['tmp_name'];
    $PaymentPhotoConvert    =  uniqid() . "-" . date('Y-m-d') . "-" . $PaymentPhoto;
    move_uploaded_file($File, $Dir . $PaymentPhotoConvert);
} else {
    $PaymentPhotoConvert    = null;
}

$CreateBy               = filter_input(INPUT_POST, 'CreateBy');
$EventLogUser           = $CreateBy;
$EventLogData           = 'Create Payment Logo ' . $PaymentName;
$GToken                 = filter_input(INPUT_POST, 'GToken');

if (VerifyRecaptchaToken($GToken) == null) {
    echo    "You are spammer! Get out";
    die();
} else {
    try {
        if (empty($StatusID) and empty($PaymentName) and empty($PaymentPhotoConvert) and empty($CreateBy)) {
            throw new Exception("Error Processing Request");
        } else {
            $EventLog       = new EventLog();
            $EventLog->createEventLog(
                $EventLogUser,
                $EventLogData
            );

            $PaymentLogo    = new PaymentLogo();
            $PaymentLogo->createPaymentLogo(
                $StatusID,
                $PaymentName,
                $PaymentPhotoConvert,
                $CreateBy
            );
        }
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
    $conn->close();
}

// if (!empty($GToken)) {
//     $SecretKey  = '6Le0EGkpAAAAAB-9Mv73FGP_1p5rUCO8jpesJIqP';
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
