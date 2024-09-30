<?php
$WebRootPath = realpath('../');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/ConnectionClass.php');

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

$StatusID               = filter_input(INPUT_POST, 'StatusID');
$FullName               = filter_input(INPUT_POST, 'FullName');
$GToken                 = filter_input(INPUT_POST, 'GToken');

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
    if (empty($StatusID)) {
        throw new Exception("Error Processing Request");
    } else {
        $conn->begin_transaction();

        $query  = "SELECT a.TestimonialsID, b.StatusID, b.Status, a.FullName, a.Testimonials, 
                    a.TestimonialsRatings, a.CreateBy, a.CreateTime, a.UpdateBy, a.UpdateTime 
                    FROM tbl_testimonials a
                    LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID
                    WHERE a.StatusID = ? AND a.FullName LIKE CONCAT('%', ?, '%')";
        $stmt   = $conn->prepare($query);
        $stmt->bind_param("is", $StatusID, $FullName);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($TestimonialsID, $StatusID, $Status, $FullName, $Testimonials, $TestimonialsRatings, $CreateBy, $CreateTime, $UpdateBy, $UpdateTime);

        $JSONData   = "";

        while ($stmt->fetch()) {
            if ($JSONData !== "") $JSONData .= ",";

            if ($TestimonialsRatings == 5) {
                $TestimonialsRatings = "<i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i>";
            } elseif ($TestimonialsRatings == 4) {
                $TestimonialsRatings = "<i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i>";
            } elseif ($TestimonialsRatings == 3) {
                $TestimonialsRatings = "<i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i>";
            } elseif ($TestimonialsRatings == 2) {
                $TestimonialsRatings = "<i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i>";
            } else {
                $TestimonialsRatings = "<i class='fa-solid fa-star text-primary'></i>";
            }

            if ($StatusID == 1) {
                $Status = "<span TestimonialsID='$TestimonialsID' class='badge rounded-pill text-bg-success mx-1'>Approved</span>";
            } else {
                $Status = "<span TestimonialsID='$TestimonialsID' class='badge rounded-pill text-bg-danger mx-1'>NotApproved</span>";
            }

            if ($StatusID == 1) {
                // $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 approveTestimonials' title='APPROVE' TestimonialsID='$TestimonialsID'><i class='fa-solid fa-check'></i></button>";
                $Button = "<button type='button' class='btn btn-outline-warning rounded-5 mx-1 reviewTestimonials' title='REVIEW AGAIN' TestimonialsID='$TestimonialsID'><i class='fa-solid fa-rotate-left'></i></button>";
                if ($_SESSION['RoleID'] == 4) {
                    // $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 approveTestimonials' title='APPROVE' TestimonialsID='$TestimonialsID'><i class='fa-solid fa-check'></i></button>";
                    $Button = "<button type='button' class='btn btn-outline-warning rounded-5 mx-1 reviewTestimonials' title='REVIEW AGAIN' TestimonialsID='$TestimonialsID'><i class='fa-solid fa-rotate-left'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugTestimonials' title='DEBUG' TestimonialsID='$TestimonialsID'><i class='fa-solid fa-eye'></i></button>";
                }
            } else {
                $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 approveTestimonials' title='APPROVE' TestimonialsID='$TestimonialsID'><i class='fa-solid fa-check'></i></button>";
                if ($_SESSION['RoleID'] == 4) {
                    $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 approveTestimonials' title='APPROVE' TestimonialsID='$TestimonialsID'><i class='fa-solid fa-check'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugTestimonials' title='DEBUG' TestimonialsID='$TestimonialsID'><i class='fa-solid fa-eye'></i></button>";
                }
            }


            // $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 approveTestimonials' title='APPROVE' TestimonialsID='$TestimonialsID'><i class='fa-solid fa-check'></i></button>";
            // $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 notapproveTestimonials' title='NOT APPROVE' TestimonialsID='$TestimonialsID'><i class='fa-solid fa-x'></i></button>";
            // if ($_SESSION['RoleID'] == 4) {
            //     $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 approveTestimonials' title='APPROVE' TestimonialsID='$TestimonialsID'><i class='fa-solid fa-check'></i></button>";
            //     $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 notapproveTestimonials' title='NOT APPROVE' TestimonialsID='$TestimonialsID'><i class='fa-solid fa-x'></i></button>";
            //     $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugTestimonials' title='DEBUG' TestimonialsID='$TestimonialsID'><i class='fa-solid fa-eye'></i></button>";
            // } else {
            //     $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 reviewTestimonials' title='APPROVE' TestimonialsID='$TestimonialsID'><i class='fa-solid fa-check'></i></button>";
            //     $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugTestimonials' title='DEBUG' TestimonialsID='$TestimonialsID'><i class='fa-solid fa-eye'></i></button>";
            // }


            $JSONData .= '["' . $FullName . '","' . $Testimonials . '", "' . $TestimonialsRatings . '", "' . $Status . '", "' . $Button . '"]';
        }

        if ($JSONData == null) {
            $JSONData = ["", "", "", "", ""];
            echo "[" . json_encode($JSONData) . "]";
        } else {
            $conn->commit();
            echo "[" . $JSONData . "]";
        }

        $stmt->close();
    }
} catch (Exception $e) {
    $conn->rollback();
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
