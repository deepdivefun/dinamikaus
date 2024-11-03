<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ConnectionClass.php');
require_once($WebRootPath . '/includes/class/VerifyRecaptchaTokenFunction.php');

if (strpos($_SERVER['HTTP_REFERER'], '6000.Testimonial.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin()) {
    echo    "You don't have access rights to this page";
    die();
}

$TestimonialStatusID    = filter_input(INPUT_POST, 'TestimonialStatusID');
$FullName               = filter_input(INPUT_POST, 'FullName');
$GToken                 = filter_input(INPUT_POST, 'GToken');

if (VerifyRecaptchaToken($GToken) == null) {
    echo    "You are spammer! Get out";
    die();
} else {
    try {
        if (empty($TestimonialStatusID)) {
            throw new Exception("Error Processing Request");
        } else {
            $conn->begin_transaction();

            $query  = "SELECT a.TestimonialID, b.TestimonialStatusID, b.TestimonialStatusName, a.FullName, 
                        a.Company, a.TestimonialRating, a.TestimonialDescription, a.CreateBy, a.CreateTime, 
                        a.UpdateBy, a.UpdateTime FROM tbl_testimonial a 
                        LEFT OUTER JOIN tbl_testimonial_status b ON a.TestimonialStatusID = b.TestimonialStatusID
                        WHERE a.TestimonialStatusID = ? AND a.FullName LIKE CONCAT('%', ?, '%')";
            $stmt   = $conn->prepare($query);
            $stmt->bind_param("is", $TestimonialStatusID, $FullName);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($TestimonialID, $TestimonialStatusID, $TestimonialStatusName, $FullName, $Company, $TestimonialRating, $TestimonialDescription, $CreateBy, $CreateTime, $UpdateBy, $UpdateTime);

            $JSONData   = "";

            while ($stmt->fetch()) {
                if ($JSONData !== "") $JSONData .= ",";

                if ($TestimonialRating == 5) {
                    $TestimonialRating = "<i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i>";
                } elseif ($TestimonialRating == 4) {
                    $TestimonialRating = "<i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i>";
                } elseif ($TestimonialRating == 3) {
                    $TestimonialRating = "<i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i>";
                } elseif ($TestimonialRating == 2) {
                    $TestimonialRating = "<i class='fa-solid fa-star text-primary'></i><i class='fa-solid fa-star text-primary'></i>";
                } else {
                    $TestimonialRating = "<i class='fa-solid fa-star text-primary'></i>";
                }

                if ($TestimonialStatusID == 1) {
                    $TestimonialStatusName = "<span class='badge rounded-pill text-bg-warning mx-1'>$TestimonialStatusName</span>";
                } elseif ($TestimonialStatusID == 2) {
                    $TestimonialStatusName = "<span class='badge rounded-pill text-bg-success mx-1'>$TestimonialStatusName</span>";
                } else {
                    $TestimonialStatusName = "<span class='badge rounded-pill text-bg-danger mx-1'>$TestimonialStatusName</span>";
                }

                if ($TestimonialStatusID == 1) {
                    $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 reviewTestimonial' title='REVIEW' TestimonialID='$TestimonialID' TestimonialStatusID='$TestimonialStatusID' FullName='$FullName' Company='$Company' TestimonialDescription='$TestimonialDescription' CreateBy='$CreateBy' CreateTime='$CreateBy' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-eye'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 approveTestimonial' title='APPROVE' TestimonialID='$TestimonialID'><i class='fa-solid fa-check'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 notApproveTestimonial' title='NOT APPROVE' TestimonialID='$TestimonialID'><i class='fa-solid fa-x'></i></button>";
                    if (SYSAdmin()) {
                        $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 reviewTestimonial' title='REVIEW' TestimonialID='$TestimonialID' TestimonialStatusID='$TestimonialStatusID' FullName='$FullName' Company='$Company' TestimonialDescription='$TestimonialDescription' CreateBy='$CreateBy' CreateTime='$CreateBy' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-eye'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 approveTestimonial' title='APPROVE' TestimonialID='$TestimonialID'><i class='fa-solid fa-check'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 notApproveTestimonial' title='NOT APPROVE' TestimonialID='$TestimonialID'><i class='fa-solid fa-x'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugTestimonial' title='DEBUG' TestimonialID='$TestimonialID'><i class='fa-solid fa-eye'></i></button>";
                    }
                } elseif ($TestimonialStatusID == 2) {
                    $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 reviewTestimonial' title='REVIEW' TestimonialID='$TestimonialID' TestimonialStatusID='$TestimonialStatusID' FullName='$FullName' Company='$Company' TestimonialDescription='$TestimonialDescription' CreateBy='$CreateBy' CreateTime='$CreateBy' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-eye'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 notApproveTestimonial' title='NOT APPROVE' TestimonialID='$TestimonialID'><i class='fa-solid fa-x'></i></button>";
                    if (SYSAdmin()) {
                        $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 reviewTestimonial' title='REVIEW' TestimonialID='$TestimonialID' TestimonialStatusID='$TestimonialStatusID' FullName='$FullName' Company='$Company' TestimonialDescription='$TestimonialDescription' CreateBy='$CreateBy' CreateTime='$CreateBy' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-eye'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 notApproveTestimonial' title='NOT APPROVE' TestimonialID='$TestimonialID'><i class='fa-solid fa-x'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugTestimonial' title='DEBUG' TestimonialID='$TestimonialID'><i class='fa-solid fa-eye'></i></button>";
                    }
                } else {
                    $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 reviewTestimonial' title='REVIEW' TestimonialID='$TestimonialID' TestimonialStatusID='$TestimonialStatusID' FullName='$FullName' Company='$Company' TestimonialDescription='$TestimonialDescription' CreateBy='$CreateBy' CreateTime='$CreateBy' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-eye'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 approveTestimonial' title='APPROVE' TestimonialID='$TestimonialID'><i class='fa-solid fa-check'></i></button>";
                    if ($_SESSION['RoleID'] == 4) {
                        $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 reviewTestimonial' title='REVIEW' TestimonialID='$TestimonialID' TestimonialStatusID='$TestimonialStatusID' FullName='$FullName' Company='$Company' TestimonialDescription='$TestimonialDescription' CreateBy='$CreateBy' CreateTime='$CreateBy' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-eye'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 approveTestimonial' title='APPROVE' TestimonialID='$TestimonialID'><i class='fa-solid fa-check'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugTestimonial' title='DEBUG' TestimonialID='$TestimonialID'><i class='fa-solid fa-eye'></i></button>";
                    }
                }

                $JSONData .= '["' . $FullName . '","' . $Company . '", "' . $TestimonialRating . '", "' . $TestimonialStatusName . '", "' . $Button . '"]';
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
