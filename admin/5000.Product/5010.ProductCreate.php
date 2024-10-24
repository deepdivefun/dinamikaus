<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ProductClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '5000.Product.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
    echo    "You don't have access rights to this page";
    die();
}

$ProductCategoryID      = filter_input(INPUT_POST, 'ProductCategoryID');
$StatusID               = filter_input(INPUT_POST, 'StatusID');
$ProductName            = filter_input(INPUT_POST, 'ProductName');
$ProductDescription     = filter_input(INPUT_POST, 'ProductDescription');

$ProductPhoto           = $_FILES['ProductPhoto']['name'];
$Dir                    = "../assets/img/productphoto/";
$File                   = $_FILES['ProductPhoto']['tmp_name'];
$ProductPhotoConvert    =  uniqid() . "-" . date('Y-m-d') . "-" . $ProductPhoto;
move_uploaded_file($File, $Dir . $ProductPhotoConvert);

$CreateBy               = filter_input(INPUT_POST, 'CreateBy');
$EventLogUser           = $CreateBy;
$EventLogData           = 'Create Product ' . $ProductName;
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
    if (empty($ProductCategoryID) and empty($StatusID) and empty($ProductName) and empty($ProductPhotoConvert) and empty($CreateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $Product = new Product();
        $Product->createProduct(
            $ProductCategoryID,
            $StatusID,
            $ProductName,
            $ProductDescription,
            $ProductPhotoConvert,
            $CreateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
