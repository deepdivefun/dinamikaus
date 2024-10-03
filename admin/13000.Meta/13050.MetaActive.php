<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/MetaClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '13000.Meta.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin()) {
    echo    "You don't have access rights to this page";
    die();
}

$MetaID         = filter_input(INPUT_POST, 'MetaID');

$query          = "SELECT Name FROM tbl_meta WHERE MetaID = ? LIMIT 1";
$stmt           = $conn->prepare($query);
$stmt->bind_param("i", $MetaID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($Name);

$result = [];

while ($stmt->fetch()) {
    $result[] = [
        'Name'  => $Name
    ];
}

$StatusID       = 1;
$UpdateBy       = $_SESSION['Username'];
$EventLogUser   = $UpdateBy;
$EventLogData   = 'Active Meta ' . $Name;

try {
    if (empty($MetaID) and empty($StatusID) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $Meta = new Meta();
        $Meta->activeMeta(
            $MetaID,
            $StatusID,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
