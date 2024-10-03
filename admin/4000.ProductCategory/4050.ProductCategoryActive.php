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

if (strpos($_SERVER['HTTP_REFERER'], '4000.ProductCategory.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
    echo    "You don't have access rights to this page";
    die();
}

$ProductCategoryID  = filter_input(INPUT_POST, 'ProductCategoryID');

$query              = "SELECT ProductCategoryName FROM tbl_product_category WHERE ProductCategoryID = ? LIMIT 1";
$stmt               = $conn->prepare($query);
$stmt->bind_param("i", $ProductCategoryID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($ProductCategoryName);

$result = [];

while ($stmt->fetch()) {
    $result[] = [
        'ProductCategoryName'  => $ProductCategoryName
    ];
}

$StatusID       = 1;
$UpdateBy       = $_SESSION['Username'];
$EventLogUser   = $UpdateBy;
$EventLogData   = 'Active Product Category ' . $ProductCategoryName;

try {
    if (empty($ProductCategoryID) and empty($StatusID) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $ProductCategory = new ProductCategory();
        $ProductCategory->activeProductCategory(
            $ProductCategoryID,
            $StatusID,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
