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
require_once($WebRootPath . '/includes/class/VerifyRecaptchaTokenFunction.php');

if (strpos($_SERVER['HTTP_REFERER'], '5000.Product.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
    echo    "You don't have access rights to this page";
    die();
}

$ProductID                  = filter_input(INPUT_POST, 'ProductID');

$ProductPhotoBeforeConvert  = filter_input(INPUT_POST, 'ProductPhotoBeforeConvert');


if (isset($_FILES['ProductPhoto']) != null) {

    if ($ProductPhotoBeforeConvert != null) {
        if (file_exists("../assets/img/productphoto/$ProductPhotoBeforeConvert")) {
            unlink("../assets/img/productphoto/$ProductPhotoBeforeConvert");
        }
    }

    $ProductPhoto               = $_FILES['ProductPhoto']['name'];
    $Dir                        = "../assets/img/productphoto/";
    $File                       = $_FILES['ProductPhoto']['tmp_name'];
    $ProductPhotoConvert        =  uniqid() . "-" . date('Y-m-d') . "-" . $ProductPhoto;
    move_uploaded_file($File, $Dir . $ProductPhotoConvert);
} else {
    $ProductPhotoConvert        = $ProductPhotoBeforeConvert;
}

$ProductCategoryID          = filter_input(INPUT_POST, 'ProductCategoryID');
$ProductBrandID             = filter_input(INPUT_POST, 'ProductBrandID');
$StatusID                   = filter_input(INPUT_POST, 'StatusID');
$ProductName                = filter_input(INPUT_POST, 'ProductName');
$ProductPrice               = filter_input(INPUT_POST, 'ProductPrice');
$ProductDescription         = filter_input(INPUT_POST, 'ProductDescription');
$UpdateBy                   = filter_input(INPUT_POST, 'UpdateBy');
$EventLogUser               = $UpdateBy;
$EventLogData               = 'Update Product ' . $ProductName;
$GToken                     = filter_input(INPUT_POST, 'GToken');

if (VerifyRecaptchaToken($GToken) == null) {
    echo    "You are spammer! Get out";
    die();
} else {
    try {
        if (empty($ProductID) and empty($ProductCategoryID) and empty($ProductBrandID) and empty($StatusID) and empty($ProductName) and empty($ProductPhotoConvert) and empty($UpdateBy)) {
            throw new Exception("Error Processing Request");
        } else {
            $EventLog = new EventLog();
            $EventLog->createEventLog(
                $EventLogUser,
                $EventLogData
            );

            $Product = new Product();
            $Product->updateProduct(
                $ProductID,
                $ProductCategoryID,
                $ProductBrandID,
                $StatusID,
                $ProductName,
                $ProductPrice,
                $ProductDescription,
                $ProductPhotoConvert,
                $UpdateBy
            );
        }
    } catch (Exception $e) {
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
