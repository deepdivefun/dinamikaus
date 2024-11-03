<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/TestimonialClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');
require_once($WebRootPath . '/includes/class/VerifyRecaptchaTokenFunction.php');

if (strpos($_SERVER['HTTP_REFERER'], '6000.Testimonial.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin()) {
    echo    "You don't have access rights to this page";
    die();
}

$TestimonialStatusID    = filter_input(INPUT_POST, 'TestimonialStatusID');
$FullName               = filter_input(INPUT_POST, 'FullName');
$Company                = filter_input(INPUT_POST, 'Company');
$TestimonialRating      = filter_input(INPUT_POST, 'TestimonialRating');
$TestimonialDescription = filter_input(INPUT_POST, 'TestimonialDescription');
$CreateBy               = filter_input(INPUT_POST, 'CreateBy');
$EventLogUser           = $CreateBy;
$EventLogData           = 'Create Testimonial from ' . $FullName;
$GToken                 = filter_input(INPUT_POST, 'GToken');

if (VerifyRecaptchaToken($GToken) == null) {
    echo    "You are spammer! Get out";
    die();
} else {
    try {
        if (empty($TestimonialStatusID) and empty($FullName) and empty($TestimonialRating) and empty($TestimonialDescription) and empty($CreateBy)) {
            throw new Exception("Error Processing Request");
        } else {
            $EventLog = new EventLog();
            $EventLog->createEventLog(
                $EventLogUser,
                $EventLogData
            );

            $Testimonial = new Testimonial();
            $Testimonial->createTestimonial(
                $TestimonialStatusID,
                $FullName,
                $Company,
                $TestimonialRating,
                $TestimonialDescription,
                $CreateBy
            );
        }
    } catch (Exception $e) {
        $conn->rollback();
        echo 'Message: ' . $e->getMessage();
    }
    $conn->close();
}

// if (!empty($GToken)) {
//     $SecretKey  = '6Lco2AAjAAAAACZSJFoBUebx-xmcGVjemLtJjEk1';
//     $Token      = $GToken;
//     $IP         = $_SERVER['REMOTE_ADDR'];
//     $URL        = "https://www.google.com/recaptcha/api/siteverify?secret=" . $SecretKey . "&response=" . $Token . "&remoteip=" . $IP;

//     $Request    = file_get_contents($URL);
//     $Response   = json_decode($Request);

//     if ($Response->success === 0) {
//         echo    "You are spammer ! Get the @$%K out";
//         die();
//     }
// }
