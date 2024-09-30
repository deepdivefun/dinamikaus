<?php
$WebRootPath = realpath('../../');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/class/MessageClass.php');

if (strpos($_SERVER['HTTP_REFERER'], 'contact.php') === FALSE) {
    echo    "<script>
                alert('Invalid Caller');
                document.location.href = '../../contact.php';
            </script>";
    die;
}
if (isset($_POST['createMessage'])) {

    $StatusMessageID    = 1;
    $FullName           = filter_input(INPUT_POST, 'FullName');
    $Email              = filter_input(INPUT_POST, 'Email');
    $CompanyName        = filter_input(INPUT_POST, 'CompanyName');

    if ($CompanyName == null) {
        $CompanyName    = "Personal";
    }

    $PhoneNumber        = filter_input(INPUT_POST, 'PhoneNumber');

    // convert PhoneNumber 0 to WhatsappNumber 62
    if (!preg_match("/[^+0-9]/", trim($PhoneNumber))) {
        if (substr(trim($PhoneNumber), 0, 2) == "62") {
            $WhatsappNumber   = $PhoneNumber;
        } elseif (substr(trim($PhoneNumber), 0, 1) == "0") {
            $WhatsappNumber   = "62" . substr(trim($PhoneNumber), 1);
        }
    }
    // End Convert 

    $MessageSubject     = filter_input(INPUT_POST, 'MessageSubject');
    $MessageContents    = filter_input(INPUT_POST, 'MessageContents');
    $GToken             = filter_input(INPUT_POST, 'GToken');
    $CreateBy           = $FullName;

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
        if (empty($StatusMessageID) and empty($FullName) and empty($Email) and empty($CompanyName) and empty($PhoneNumber) and empty($WhatsappNumber) and empty($MessageSubject) and empty($MessageContents) and empty($CreateBy)) {
            throw new Exception("Error Processing Request");
        } else {
            $Message = new Message();
            $Message->createMessage(
                $StatusMessageID,
                $FullName,
                $Email,
                $CompanyName,
                $PhoneNumber,
                $WhatsappNumber,
                $MessageSubject,
                $MessageContents,
                $CreateBy
            );
        }
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
}
$conn->close();
