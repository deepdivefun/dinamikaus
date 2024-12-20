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

$ShippingID     = filter_input(INPUT_POST, 'ShippingID');

$query          = "SELECT ShippingName FROM tbl_shipping WHERE ShippingID = ? LIMIT 1";
$stmt           = $conn->prepare($query);
$stmt->bind_param("i", $ShippingID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($ShippingName);

$result = [];

while ($stmt->fetch()) {
    $result[] = [
        'ShippingName'  => $ShippingName
    ];
}

$StatusID       = 1;
$UpdateBy       = $_SESSION['Username'];
$EventLogUser   = $UpdateBy;
$EventLogData   = 'Active Shipping Logo ' . $ShippingName;

try {
    if (empty($ShippingID) and empty($StatusID) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $ShippingLogo = new ShippingLogo();
        $ShippingLogo->activeShippingLogo(
            $ShippingID,
            $StatusID,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
