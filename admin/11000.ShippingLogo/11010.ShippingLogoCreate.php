<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ShippingLogoClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '11000.ShippingLogo.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin()) {
    echo    "You don't have access rights to this page";
    die();
}

$StatusID               = filter_input(INPUT_POST, 'StatusID');
$ShippingName           = filter_input(INPUT_POST, 'ShippingName');

if (isset($_FILES['ShippingPhoto']) != null) {
    $ShippingPhoto          = $_FILES['ShippingPhoto']['name'];
    $Dir                    = "../assets/img/shippinglogo/";
    $File                   = $_FILES['ShippingPhoto']['tmp_name'];
    $ShippingPhotoConvert   =  uniqid() . "-" . date('Y-m-d') . "-" . $ShippingPhoto;
    move_uploaded_file($File, $Dir . $ShippingPhotoConvert);
} else {
    $ShippingPhotoConvert   = null;
}

$CreateBy               = filter_input(INPUT_POST, 'CreateBy');
$EventLogUser           = $CreateBy;
$EventLogData           = 'Create Shipping Logo ' . $ShippingName;
$GToken                 = filter_input(INPUT_POST, 'GToken');

if (!empty($GToken)) {
    $SecretKey  = '6Le0EGkpAAAAAB-9Mv73FGP_1p5rUCO8jpesJIqP';
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
    if (empty($StatusID) and empty($ShippingName) and empty($ShippingPhotoConvert) and empty($CreateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog       = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $ShippingLogo   = new ShippingLogo();
        $ShippingLogo->createShippingLogo(
            $StatusID,
            $ShippingName,
            $ShippingPhotoConvert,
            $CreateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();