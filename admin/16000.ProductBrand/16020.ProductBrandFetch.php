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

if (strpos($_SERVER['HTTP_REFERER'], '16000.ProductBrand.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
    echo    "You don't have access rights to this page";
    die();
}

$StatusID           = filter_input(INPUT_POST, 'StatusID');
$ProductBrandName   = filter_input(INPUT_POST, 'ProductBrandName');
$GToken             = filter_input(INPUT_POST, 'GToken');

if (VerifyRecaptchaToken($GToken) == null) {
    echo    "You are spammer! Get out";
    die();
} else {
    try {
        if (empty($StatusID)) {
            throw new Exception("Error Processing Request");
        } else {
            $conn->begin_transaction();

            $query  = "SELECT a.ProductBrandID, b.StatusID, b.StatusName, a.ProductBrandName, a.CreateBy, 
                        a.CreateTime, a.UpdateBy, a.UpdateTime FROM tbl_product_brand a 
                        LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID 
                        WHERE a.StatusID = ? AND a.ProductBrandName LIKE CONCAT('%', ?, '%')";
            $stmt   = $conn->prepare($query);
            $stmt->bind_param("is", $StatusID, $ProductBrandName);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result(
                $ProductBrandID,
                $StatusID,
                $StatusName,
                $ProductBrandName,
                $CreateBy,
                $CreateTime,
                $UpdateBy,
                $UpdateTime
            );

            $JSONData   = "";

            while ($stmt->fetch()) {
                if ($JSONData !== "") $JSONData .= ",";

                if ($StatusID == 1) {
                    $StatusName = "<span StatusID='$StatusID' class='badge rounded-pill text-bg-success mx-1'>$StatusName</span>";
                } else {
                    $StatusName = "<span StatusID='$StatusID' class='badge rounded-pill text-bg-danger mx-1'>$StatusName</span>";
                }

                if ($StatusID == 1) {
                    $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editProductBrand' title='EDIT' ProductBrandID='$ProductBrandID' StatusID='$StatusID' ProductBrandName='$ProductBrandName' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteProductBrand' title='DELETE' ProductBrandID='$ProductBrandID'><i class='fa-solid fa-trash'></i></button>";
                    if (SYSAdmin()) {
                        $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editProductBrand' title='EDIT' ProductBrandID='$ProductBrandID' StatusID='$StatusID' ProductBrandName='$ProductBrandName' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteProductBrand' title='DELETE' ProductBrandID='$ProductBrandID'><i class='fa-solid fa-trash'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugProductBrand' title='DEBUG' ProductBrandID='$ProductBrandID'><i class='fa-solid fa-eye'></i></button>";
                    }
                } else {
                    $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeProductBrand' title='ACTIVATE' ProductBrandID='$ProductBrandID'><i class='fa-solid fa-check'></i></button>";
                    if (SYSAdmin()) {
                        $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeProductBrand' title='ACTIVATE' ProductBrandID='$ProductBrandID'><i class='fa-solid fa-check'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugProductBrand' title='DEBUG' ProductBrandID='$ProductBrandID'><i class='fa-solid fa-eye'></i></button>";
                    }
                }

                $JSONData .= '["' . $ProductBrandName . '", "' . $StatusName . '", "' . $Button . '"]';
            }

            if ($JSONData == null) {
                $JSONData = ["", "", ""];
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
