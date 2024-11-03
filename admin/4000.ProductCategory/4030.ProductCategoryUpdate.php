<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ProductCategoryClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');
require_once($WebRootPath . '/includes/class/VerifyRecaptchaTokenFunction.php');

if (strpos($_SERVER['HTTP_REFERER'], '4000.ProductCategory.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
    echo    "You don't have access rights to this page";
    die();
}

$ProductCategoryID                      = filter_input(INPUT_POST, 'ProductCategoryID');
$ProductCategoryCatalogBeforeConvert    = filter_input(INPUT_POST, 'ProductCategoryCatalogBeforeConvert');

if (isset($_FILES['ProductCategoryCatalog']) != null) {

    if ($ProductCategoryCatalogBeforeConvert != null) {
        if (file_exists("../assets/catalog/$ProductCategoryCatalogBeforeConvert")) {
            unlink("../assets/catalog/$ProductCategoryCatalogBeforeConvert");
        }
    }

    $ProductCategoryCatalog                 = $_FILES['ProductCategoryCatalog']['name'];
    $Dir                                    = "../assets/catalog/";
    $File                                   = $_FILES['ProductCategoryCatalog']['tmp_name'];
    $ProductCategoryCatalogConvert          =  uniqid() . "-" . date('Y-m-d') . "-" . $ProductCategoryCatalog;
    move_uploaded_file($File, $Dir . $ProductCategoryCatalogConvert);
} else {
    $ProductCategoryCatalogConvert          = $ProductCategoryCatalogBeforeConvert;
}

$ProductCategoryPhotoBeforeConvert    = filter_input(INPUT_POST, 'ProductCategoryPhotoBeforeConvert');


if (isset($_FILES['ProductCategoryPhoto']) != null) {

    if ($ProductCategoryPhotoBeforeConvert != null) {
        if (file_exists("../assets/img/productcategoryphoto/$ProductCategoryPhotoBeforeConvert")) {
            unlink("../assets/img/productcategoryphoto/$ProductCategoryPhotoBeforeConvert");
        }
    }

    $ProductCategoryPhoto                   = $_FILES['ProductCategoryPhoto']['name'];
    $Dir                                    = "../assets/img/productcategoryphoto/";
    $File                                   = $_FILES['ProductCategoryPhoto']['tmp_name'];
    $ProductCategoryPhotoConvert            = uniqid() . "-" . date('Y-m-d') . "-" . $ProductCategoryPhoto;
    move_uploaded_file($File, $Dir . $ProductCategoryPhotoConvert);
} else {
    $ProductCategoryPhotoConvert            = $ProductCategoryPhotoBeforeConvert;
}

$StatusID                               = filter_input(INPUT_POST, 'StatusID');
$ProductCategoryName                    = filter_input(INPUT_POST, 'ProductCategoryName');
$UpdateBy                               = filter_input(INPUT_POST, 'UpdateBy');
$EventLogUser                           = $UpdateBy;
$EventLogData                           = 'Update Product Category ' . $ProductCategoryName;
$GToken                                 = filter_input(INPUT_POST, 'GToken');

if (VerifyRecaptchaToken($GToken) == null) {
    echo    "You are spammer! Get out";
    die();
} else {
    try {
        if (empty($ProductCategoryID) and empty($StatusID) and empty($ProductCategoryName) and empty($ProductCategoryPhotoConvert) and empty($UpdateBy)) {
            throw new Exception("Error Processing Request");
        } else {
            $EventLog = new EventLog();
            $EventLog->createEventLog(
                $EventLogUser,
                $EventLogData
            );

            $ProductCategory = new ProductCategory();
            $ProductCategory->updateProductCategory(
                $ProductCategoryID,
                $StatusID,
                $ProductCategoryName,
                $ProductCategoryCatalogConvert,
                $ProductCategoryPhotoConvert,
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
