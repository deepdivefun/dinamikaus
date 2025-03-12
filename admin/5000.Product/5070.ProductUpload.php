<?php
$WebRootPath = realpath('../');

require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/class/AccountClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');
require_once($WebRootPath . '/includes/class/ExcelClass.php');
require_once($WebRootPath . '/includes/class/VerifyRecaptchaTokenFunction.php');

if (strpos($_SERVER['HTTP_REFERER'], '5000.Product.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
    echo    "You don't have access rights to this page";
    die();
}

if (isset($_FILES['UploadDataProduct']) and $_FILES['UploadDataProduct']['error'] === UPLOAD_ERR_OK) {
    $UploadDataProduct = $_FILES['UploadDataProduct']['tmp_name'];
} else {
    echo    "Invalid File";
    die();
}

$UpdateBy                       = filter_input(INPUT_POST, 'UpdateBy');
$EventLogUser                   = $UpdateBy;
$EventLogData                   = 'Upload data product';
$GToken                         = filter_input(INPUT_POST, 'GToken');

if (VerifyRecaptchaToken($GToken) == null) {
    echo    'You are spammer! Get out';
    die();
}


try {
    if (empty($UploadDataProduct) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog   = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $Excel  = new Excel();
        $Excel->uploadProduct(
            $UploadDataProduct,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
$conn->close();
