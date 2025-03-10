<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ProductBrandClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');
require_once($WebRootPath . '/includes/class/VerifyRecaptchaTokenFunction.php');

if (strpos($_SERVER['HTTP_REFERER'], '16000.ProductBrand.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
    echo    "You don't have access rights to this page";
    die();
}

$ProductBrandID     = filter_input(INPUT_POST, 'ProductBrandID');
$StatusID           = filter_input(INPUT_POST, 'StatusID');
$ProductBrandName   = filter_input(INPUT_POST, 'ProductBrandName');
$UpdateBy           = filter_input(INPUT_POST, 'UpdateBy');
$EventLogUser       = $UpdateBy;
$EventLogData       = 'Update Product Brand ' . $ProductBrandName;
$GToken             = filter_input(INPUT_POST, 'GToken');

if (VerifyRecaptchaToken($GToken) == null) {
    echo    "You are spammer! Get out";
    die();
} else {
    try {
        if (empty($ProductBrandID) and empty($StatusID) and empty($ProductBrandName) and empty($UpdateBy)) {
            throw new Exception("Error Processing Request");
        } else {
            $EventLog = new EventLog();
            $EventLog->createEventLog(
                $EventLogUser,
                $EventLogData
            );

            $ProductBrand   = new ProductBrand();
            $ProductBrand->updateProductBrand(
                $ProductBrandID,
                $StatusID,
                $ProductBrandName,
                $UpdateBy
            );
        }
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
    $conn->close();
}
