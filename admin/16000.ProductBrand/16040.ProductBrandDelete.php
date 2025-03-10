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

if (strpos($_SERVER['HTTP_REFERER'], '16000.ProductBrand.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
    echo    "You don't have access rights to this page";
    die();
}

$ProductBrandID     = filter_input(INPUT_POST, 'ProductBrandID');

$query              = "SELECT ProductBrandName FROM tbl_product_brand WHERE ProductBrandID = ? LIMIT 1";
$stmt               = $conn->prepare($query);
$stmt->bind_param("i", $ProductBrandID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($ProductBrandName);

$result = [];

while ($stmt->fetch()) {
    $result[] = [
        'ProductBrandName'  => $ProductBrandName
    ];
}

$StatusID           = 2;
$UpdateBy           = $_SESSION['Username'];
$EventLogUser       = $UpdateBy;
$EventLogData       = 'Delete Product Brand ' . $ProductBrandName;

try {
    if (empty($ProductBrandID) and empty($StatusID) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $ProductBrand   = new ProductBrand();
        $ProductBrand->deleteProductBrand(
            $ProductBrandID,
            $StatusID,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}