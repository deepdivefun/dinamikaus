<?php
$WebRootPath = realpath('../');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/AccountClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '2000.User.php') === FALSE) {
    echo    "<script>
                alert('Invalid Caller');
                document.location.href = '2000.User.php';
            </script>";
    die;
}

if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3) {
    echo    "You don't have access rights to this page";
    die;
}

$UserID         = filter_input(INPUT_POST, 'UserID');

$query          = "SELECT Username FROM tbl_user WHERE UserID = ? LIMIT 1";
$stmt           = $conn->prepare($query);
$stmt->bind_param("i", $UserID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($Username);

$result = [];

while ($stmt->fetch()) {
    $result[] = [
        'Username'  => $Username
    ];
}

$StatusID       = 2;
$UpdateBy       = $_SESSION['Username'];
$EventLogUser   = $UpdateBy;
$EventLogData   = 'Delete Account ' . $Username;

try {
    if (empty($UserID) and empty($StatusID) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $User = new Account();
        $User->deleteAccount(
            $UserID,
            $StatusID,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
