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

if (strpos($_SERVER['HTTP_REFERER'], '6000.Testimonial.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin()) {
    echo    "You don't have access rights to this page";
    die();
}

$StatusID               = 2;
$FullName               = filter_input(INPUT_POST, 'FullName');
$Testimonials           = filter_input(INPUT_POST, 'Testimonials');
$TestimonialsRatings    = filter_input(INPUT_POST, 'TestimonialsRatings');
$GToken                 = filter_input(INPUT_POST, 'GToken');
$CreateBy               = filter_input(INPUT_POST, 'CreateBy');

if ($GToken != null) {
    $SecretKey  = '6Lco2AAjAAAAACZSJFoBUebx-xmcGVjemLtJjEk1';
    $Token      = $GToken;
    $IP         = $_SERVER['REMOTE_ADDR'];
    $URL        = "https://www.google.com/recaptcha/api/siteverify?secret=" . $SecretKey . "&response=" . $Token . "&remoteip=" . $IP;

    $Request    = file_get_contents($URL);
    $Response   = json_decode($Request);

    if ($Response->success == 0) {
        echo    "You are spammer ! Get the @$%K out";
        die();
    }
}

try {
    if (empty($StatusID) and empty($FullName) and empty($Testimonials) and empty($TestimonialsRatings) and empty($CreateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $conn->begin_transaction();

        $query  = "INSERT INTO tbl_testimonials (StatusID, FullName, Testimonials, TestimonialsRatings, CreateBy) 
                            VALUES (?,?,?,?,?)";
        $stmt   = $conn->prepare($query);
        $stmt->bind_param('issss', $StatusID, $FullName, $Testimonials, $TestimonialsRatings, $CreateBy);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $conn->commit();
            echo    "Testimonials successfully created";
        } else {
            echo    "Testimonials failed to create";
        }
    }

    $stmt->close();
} catch (Exception $e) {
    $conn->rollback();
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
