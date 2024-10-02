<?php
$WebRootPath = realpath('../');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/MetaClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '13000.Meta.php') === FALSE) {
    echo    "<script>
                alert('Invalid Caller');
                document.location.href = '13000.Meta.php';
            </script>";
    die;
}

if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3) {
    echo    "You don't have access rights to this page";
    die;
}

$MetaID     = filter_input(INPUT_POST, 'MetaID');
$StatusID   = 1;
$UpdateBy   = $_SESSION['Username'];

try {
    if (empty($MetaID) and empty($StatusID) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $Meta = new Meta();
        $Meta->activeMeta($MetaID, $StatusID, $UpdateBy);
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
