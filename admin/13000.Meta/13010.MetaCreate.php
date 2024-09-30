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

if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 1) {
    echo    "You don't have access rights to this page";
    die;
}

$StatusID   = filter_input(INPUT_POST, 'StatusID');
$Name       = filter_input(INPUT_POST, 'Name');
$Content    = filter_input(INPUT_POST, 'Content');
$GToken     = filter_input(INPUT_POST, 'GToken');
$CreateBy   = filter_input(INPUT_POST, 'CreateBy');

if ($GToken == !null) {
    $SecretKey  = '6Le0EGkpAAAAAB-9Mv73FGP_1p5rUCO8jpesJIqP';
    $Token      = $GToken;
    $IP         = $_SERVER['REMOTE_ADDR'];
    $URL        = "https://www.google.com/recaptcha/api/siteverify?secret=" . $SecretKey . "&response=" . $Token . "&remoteip=" . $IP;

    $Request    = file_get_contents($URL);
    $Response   = json_decode($Request);

    if ($Response->success === 0) {
        echo    "You are spammer ! Get the @$%K out";
        die;
    }
}

try {
    if (empty($StatusID) and empty($CreateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $Meta = new Meta();
        $Meta->createMeta($StatusID, $Name, $Content, $CreateBy);
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
