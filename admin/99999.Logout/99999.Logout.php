<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');

$EventLogUser   = $_SESSION['Username'];
$EventLogData   = $EventLogUser . ' has logged out';

try {
    if (empty($EventLogUser) and empty($EventLogData)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog   = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();

$_SESSION = array();
session_unset();
session_destroy();

setcookie('ID', '', time() - 1800);
setcookie('Key', '', time() - 1800);

header("Location: ../../index");
exit;
