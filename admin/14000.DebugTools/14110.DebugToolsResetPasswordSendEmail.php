<?php
$WebRootPath = realpath('../');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/ForgotPasswordClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '14100.DebugToolsResetPassword.php') === FALSE) {
    echo    "<script>
                alert('Invalid Caller');
                document.location.href = '14100.DebugToolsResetPassword.php';
            </script>";
    die;
}

if ($_SESSION['RoleID'] !== 4) {
    echo    "You don't have access rights to this page";
    die;
}

$Email          = filter_input(INPUT_POST, 'Email');
$ConfirmEmail   = filter_input(INPUT_POST, 'ConfirmEmail');
$GToken         = filter_input(INPUT_POST, 'GToken');

if ($GToken == !null) {
    $SecretKey  = '6Lco2AAjAAAAACZSJFoBUebx-xmcGVjemLtJjEk1';
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

if ($Email !== $ConfirmEmail) {
    echo    "<script>
                alert('Email and Confirm Email not match');
                document.location.href = '14100.DebugToolsResetPassword.php';
            </script>";
    die;
}

try {
    if (empty($Email)) {
        throw new Exception("Error Processing Request");
    } else {
        $ForgotPassword = new ForgotPassword();
        $ForgotPassword->sendEmailForgotPasswordAppAdminTools($Email);
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
