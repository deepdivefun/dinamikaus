<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ContactClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '8000.Contact.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin()) {
    echo    "You don't have access rights to this page";
    die();
}

$ContactID  = filter_input(INPUT_POST, 'ContactID');

$query      = "SELECT ContactNameArea FROM tbl_contact WHERE ContactID = ? LIMIT 1";
$stmt       = $conn->prepare($query);
$stmt->bind_param("i", $ContactID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($ContactNameArea);

$result = [];

while ($stmt->fetch()) {
    $result[] = [
        'ContactNameArea'  => $ContactNameArea
    ];
}

$StatusID       = 2;
$UpdateBy       = $_SESSION['Username'];
$EventLogUser   = $UpdateBy;
$EventLogData   = 'Delete Contact For Area ' . $ContactNameArea;

try {
    if (empty($ContactID) and empty($StatusID) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $Contact = new Contact();
        $Contact->deleteContact(
            $ContactID,
            $StatusID,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
