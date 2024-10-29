<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/PaymentLogoClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '10000.PaymentLogo.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin()) {
    echo    "You don't have access rights to this page";
    die();
}

$PaymentID      = filter_input(INPUT_POST, 'PaymentID');

$query          = "SELECT PaymentName FROM tbl_payment WHERE PaymentID = ? LIMIT 1";
$stmt           = $conn->prepare($query);
$stmt->bind_param("i", $PaymentID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($PaymentName);

$result = [];

while ($stmt->fetch()) {
    $result[] = [
        'PaymentName'  => $PaymentName
    ];
}

$StatusID       = 1;
$UpdateBy       = $_SESSION['Username'];
$EventLogUser   = $UpdateBy;
$EventLogData   = 'Active Payment Logo ' . $PaymentName;

try {
    if (empty($PaymentID) and empty($StatusID) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $PaymentLogo = new PaymentLogo();
        $PaymentLogo->activePaymentLogo(
            $PaymentID,
            $StatusID,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
