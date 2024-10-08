<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/TeamClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '3000.Team.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin()) {
    echo    "You don't have access rights to this page";
    die();
}

$TeamID     = filter_input(INPUT_POST, 'TeamID');

$query      = "SELECT FullName FROM tbl_team WHERE TeamID = ? LIMIT 1";
$stmt       = $conn->prepare($query);
$stmt->bind_param("i", $TeamID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($FullName);

$result = [];

while ($stmt->fetch()) {
    $result[] = [
        'FullName'  => $FullName
    ];
}

$StatusID       = 1;
$UpdateBy       = $_SESSION['Username'];
$EventLogUser   = $UpdateBy;
$EventLogData   = 'Active Team ' . $FullName;

try {
    if (empty($TeamID) and empty($StatusID) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $Team = new Team();
        $Team->deleteTeam(
            $TeamID,
            $StatusID,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
