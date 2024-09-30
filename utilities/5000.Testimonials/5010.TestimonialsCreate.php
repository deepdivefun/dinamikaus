<?php
$WebRootPath = realpath('../../');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/class/ConnectionClass.php');

if (strpos($_SERVER['HTTP_REFERER'], 'index.php') === FALSE) {
    echo    "<script>
                alert('Invalid Caller');
                document.location.href = '../../index.php';
            </script>";
    die;
}

if (isset($_POST['createTestimonials'])) {

    $FullName               = filter_input(INPUT_POST, 'FullName');
    $Testimonials           = filter_input(INPUT_POST, 'Testimonials');
    $TestimonialsRating     = filter_input(INPUT_POST, 'TestimonialsRatings');
    $GToken                 = filter_input(INPUT_POST, 'GToken');
    $CreateBy               = $FullName;

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
        if (empty($FullName) and empty($Testimonials) and empty($TestimonialsRating) and empty($CreateBy)) {
            throw new Exception("Error Processing Request");
        } else {
            $conn->begin_transaction();

            $sql = "INSERT INTO tbl_testimonials (StatusID, FullName, Testimonials, TestimonialsRatings, CreateBy) 
                        VALUES (2, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssis', $FullName, $Testimonials, $TestimonialsRating, $CreateBy);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $conn->commit();
                echo    "<script>
                            alert('Thank you for providing testimony!');
                            document.location = '../../index.php'; 
                        </script>";
            } else {
                echo    "<script>
                            alert('Testimonials failed to create');
                            document.location = '../../index.php'; 
                        </script>";
            }
        }

        $stmt->close();
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
}
$conn->close();
