<?php
$WebRootPath = realpath('../');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/TestimonialClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '6000.Testimonial.php') === FALSE) {
    echo    "<script>
                alert('Invalid Caller');
                document.location.href = '6000.Testimonial.php';
            </script>";
    die;
}

if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3) {
    echo    "You don't have access rights to this page";
    die;
}

$TestimonialID          = filter_input(INPUT_POST, 'TestimonialID');

$query                  = "SELECT FullName FROM tbl_testimonial WHERE TestimonialID = ? LIMIT 1";
$stmt                   = $conn->prepare($query);
$stmt->bind_param("i", $TestimonialID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($FullName);

$result = [];

while ($stmt->fetch()) {
    $result[] = [
        'FullName'  => $FullName
    ];
}

$TestimonialStatusID    = 2;
$UpdateBy       = $_SESSION['Username'];
$EventLogUser   = $UpdateBy;
$EventLogData   = 'Approve Testimonial from ' . $FullName;

try {
    if (empty($TestimonialID) and empty($TestimonialStatusID) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $Testimonial = new Testimonial();
        $Testimonial->approveTestimonial(
            $TestimonialID,
            $TestimonialStatusID,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
