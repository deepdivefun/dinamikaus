<?php
$WebRootPath = realpath('../');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/MessageClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '6000.Message.php') === FALSE) {
    echo    "<script>
                alert('Invalid Caller');
                document.location.href = '6000.Message.php';
            </script>";
    die;
}

if ($_SESSION['RoleID'] !== 4) {
    echo    "You don't have access rights to this page";
    die;
}

$MessageID          = filter_input(INPUT_POST, "MessageID");
$StatusMessageID    = filter_input(INPUT_POST, "StatusMessageID");
$GToken             = filter_input(INPUT_POST, "GToken");
$UpdateBy           = filter_input(INPUT_POST, "UpdateBy");

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
    if (empty($MessageID) and empty($StatusMessageID) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $Message = new Message();
        $Message->updateMessage($MessageID, $StatusMessageID, $UpdateBy);
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
