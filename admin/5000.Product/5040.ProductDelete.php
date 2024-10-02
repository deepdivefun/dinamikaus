<?php
$WebRootPath = realpath('../');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/ProductClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '5000.Product.php') === FALSE) {
    echo    "<script>
                alert('Invalid Caller');
                document.location.href = '5000.Product.php';
            </script>";
    die;
}

if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3 and $_SESSION['RoleID'] !== 2 and $_SESSION['RoleID'] !== 1) {
    echo    "You don't have access rights to this page";
    die;
}

$ProductID  = filter_input(INPUT_POST, 'ProductID');

$query      = "SELECT ProductName FROM tbl_product WHERE ProductID = ? LIMIT 1";
$stmt       = $conn->prepare($query);
$stmt->bind_param("i", $ProductID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($ProductName);

$result = [];

while ($stmt->fetch()) {
    $result[] = [
        'ProductName'  => $ProductName
    ];
}

$StatusID       = 2;
$UpdateBy       = $_SESSION['Username'];
$EventLogUser   = $UpdateBy;
$EventLogData   = 'Delete Product ' . $ProductName;

try {
    if (empty($ProductID) and empty($StatusID) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $Product = new Product();
        $Product->deleteProduct(
            $ProductID,
            $StatusID,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
