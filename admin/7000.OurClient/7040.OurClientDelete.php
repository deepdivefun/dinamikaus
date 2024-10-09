<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/OurClientClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '7000.OurClient.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
    echo    "You don't have access rights to this page";
    die();
}

$OurClientID  = filter_input(INPUT_POST, 'OurClientID');

$query      = "SELECT OurClientName FROM tbl_ourclient WHERE OurClientID = ? LIMIT 1";
$stmt       = $conn->prepare($query);
$stmt->bind_param("i", $OurClientID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($OurClientName);

$result = [];

while ($stmt->fetch()) {
    $result[] = [
        'OurClientName'  => $OurClientName
    ];
}

$StatusID       = 2;
$UpdateBy       = $_SESSION['Username'];
$EventLogUser   = $UpdateBy;
$EventLogData   = 'Delete Our Client ' . $OurClientName;

try {
    if (empty($OurClientID) and empty($StatusID) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $OurClient = new OurClient();
        $OurClient->deleteOurClient(
            $OurClientID,
            $StatusID,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
