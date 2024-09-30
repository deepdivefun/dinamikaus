<?php
$WebRootPath = realpath('../');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/TestimonialsClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '5000.Testimonials.php') === FALSE) {
    echo    "<script>
                alert('Invalid Caller');
                document.location.href = '5000.Testimonials.php';
            </script>";
    die;
}

if ($_SESSION['RoleID'] !== 4) {
    echo    "You don't have access rights to this page";
    die;
}

$TestimonialsID     = filter_input(INPUT_POST, 'TestimonialsID');
$StatusID           = 2;
$UpdateBy           = $_SESSION['Username'];

try {
    if (empty($TestimonialsID) and empty($StatusID) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $Testimonials = new Testimonials();
        $Testimonials->reviewTestimonials($TestimonialsID, $StatusID, $UpdateBy);
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
