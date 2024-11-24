<?php
$WebRootPath = realpath('../../');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/class/TestimonialClass.php');
require_once($WebRootPath . '/includes/function/VerifyRecaptchaTokenFunction.php');

if (strpos($_SERVER['HTTP_REFERER'], 'index.php') === FALSE) {
    echo    "<script>
                alert('Invalid Caller');
                document.location.href = '../../index.php';
            </script>";
    die;
}

if (isset($_POST['createTestimonial'])) {

    $TestimonialStatusID    = 1;
    $FullName               = filter_input(INPUT_POST, 'FullName');
    $Company                = filter_input(INPUT_POST, 'Company');

    if ($Company == null) {
        $Company    = "Personal";
    }

    $TestimonialRating      = filter_input(INPUT_POST, 'TestimonialRating');
    $TestimonialDescription = filter_input(INPUT_POST, 'TestimonialDescription');
    $CreateBy               = $FullName;
    $GToken                 = filter_input(INPUT_POST, 'GToken');

    if (VerifyRecaptchaToken($GToken) == null) {
        echo    "You are spammer! Get out";
        die();
    } else {
        try {
            if (empty($TestimonialStatusID) and empty($FullName) and empty($TestimonialRating) and empty($TestimonialDescription) and empty($CreateBy)) {
                throw new Exception("Error Processing Request");
            } else {
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
            echo 'Message: ' . $e->getMessage();
        }
        $conn->close();
    }

    // try {
    //     if (empty($FullName) and empty($Testimonials) and empty($TestimonialsRating) and empty($CreateBy)) {
    //         throw new Exception("Error Processing Request");
    //     } else {
    //         $conn->begin_transaction();

    //         $sql = "INSERT INTO tbl_testimonials (StatusID, FullName, Testimonials, TestimonialsRatings, CreateBy) 
    //                     VALUES (2, ?, ?, ?, ?)";
    //         $stmt = $conn->prepare($sql);
    //         $stmt->bind_param('ssis', $FullName, $Testimonials, $TestimonialsRating, $CreateBy);
    //         $stmt->execute();

    //         if ($stmt->affected_rows > 0) {
    //             $conn->commit();
    //             echo    "<script>
    //                         alert('Thank you for providing testimony!');
    //                         document.location = '../../index.php'; 
    //                     </script>";
    //         } else {
    //             echo    "<script>
    //                         alert('Testimonials failed to create');
    //                         document.location = '../../index.php'; 
    //                     </script>";
    //         }
    //     }

    //     $stmt->close();
    // } catch (Exception $e) {
    //     echo 'Message: ' . $e->getMessage();
    // }
}
