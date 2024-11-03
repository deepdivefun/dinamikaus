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

if (strpos($_SERVER['HTTP_REFERER'], '4000.ProductCategory.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
    echo    "You don't have access rights to this page";
    die();
}

$StatusID               = filter_input(INPUT_POST, 'StatusID');
$ProductCategoryName    = filter_input(INPUT_POST, 'ProductCategoryName');
$GToken                 = filter_input(INPUT_POST, 'GToken');

if (VerifyRecaptchaToken($GToken) == null) {
    echo    "You are spammer! Get out";
    die();
} else {
    try {
        if (empty($StatusID)) {
            throw new Exception("Error Processing Request");
        } else {
            $conn->begin_transaction();

            $query  = "SELECT a.ProductCategoryID, b.StatusID, b.StatusName, a.ProductCategoryName, 
                        a.ProductCategoryCatalog, a.ProductCategoryPhoto, a.CreateBy, a.CreateTime, a.UpdateBy, a.UpdateTime 
                        FROM tbl_product_category a 
                        LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID 
                        WHERE a.StatusID = ? AND a.ProductCategoryName LIKE CONCAT('%', ?, '%')";
            $stmt   = $conn->prepare($query);
            $stmt->bind_param("is", $StatusID, $ProductCategoryName);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result(
                $ProductCategoryID,
                $StatusID,
                $StatusName,
                $ProductCategoryName,
                $ProductCategoryCatalog,
                $ProductCategoryPhoto,
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

                $ProductCategoryCatalogIcon = $ProductCategoryCatalog;

                if ($ProductCategoryCatalogIcon != null) {
                    $ProductCategoryCatalogIcon = "<span ProductCategoryID='$ProductCategoryID' class='badge rounded-pill text-bg-success viewPDF' title='PDF Found' ProductCategoryCatalog='$ProductCategoryCatalog'><i class='fa-solid fa-file-pdf'></i></span>";
                } else {
                    $ProductCategoryCatalogIcon = "<span ProductCategoryID='$ProductCategoryID' class='badge rounded-pill text-bg-danger' title='PDF Not Found'><i class='fa-solid fa-file-pdf'></i></span>";
                }

                if ($StatusID == 1) {
                    $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editProductCategory' title='EDIT' ProductCategoryID='$ProductCategoryID' StatusID='$StatusID' ProductCategoryName='$ProductCategoryName' ProductCategoryCatalog='$ProductCategoryCatalog' ProductCategoryPhoto='$ProductCategoryPhoto' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteProductCategory' title='DELETE' ProductCategoryID='$ProductCategoryID'><i class='fa-solid fa-trash'></i></button>";
                    if (SYSAdmin()) {
                        $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editProductCategory' title='EDIT' ProductCategoryID='$ProductCategoryID' StatusID='$StatusID' ProductCategoryName='$ProductCategoryName' ProductCategoryCatalog='$ProductCategoryCatalog' ProductCategoryPhoto='$ProductCategoryPhoto' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteProductCategory' title='DELETE' ProductCategoryID='$ProductCategoryID'><i class='fa-solid fa-trash'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugProductCategory' title='DEBUG' ProductCategoryID='$ProductCategoryID'><i class='fa-solid fa-eye'></i></button>";
                    }
                } else {
                    $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeProductCategory' title='ACTIVATE' ProductCategoryID='$ProductCategoryID'><i class='fa-solid fa-check'></i></button>";
                    if (SYSAdmin()) {
                        $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeProductCategory' title='ACTIVATE' ProductCategoryID='$ProductCategoryID'><i class='fa-solid fa-check'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugProductCategory' title='DEBUG' ProductCategoryID='$ProductCategoryID'><i class='fa-solid fa-eye'></i></button>";
                    }
                }

                $ProductCategoryPhoto = "<img src='" . WebRootPath() . "assets/img/productcategoryphoto/" . $ProductCategoryPhoto . "' class='img-fluid h-50 w-auto rounded-5' alt='" . $ProductCategoryPhoto . "'>";

                $JSONData .= '["' . $ProductCategoryName . '", "' . $ProductCategoryCatalogIcon . '", "' . $ProductCategoryPhoto . '", "' . $StatusName . '", "' . $Button . '"]';
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
