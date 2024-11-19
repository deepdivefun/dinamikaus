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

if (strpos($_SERVER['HTTP_REFERER'], '5000.Product.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
    echo    "You don't have access rights to this page";
    die();
}

$StatusID               = filter_input(INPUT_POST, 'StatusID');
$ProductCategoryID      = filter_input(INPUT_POST, 'ProductCategoryID');
$ProductName            = filter_input(INPUT_POST, 'ProductName');
$GToken                 = filter_input(INPUT_POST, 'GToken');

if (VerifyRecaptchaToken($GToken) == null) {
    echo    "You are spammer! Get out";
    die();
} else {
    try {
        if (empty($StatusID) and empty($ProductCategoryID)) {
            throw new Exception("Error Processing Request");
        } elseif (empty($ProductCategoryID)) {
            $conn->begin_transaction();

            $query  = "SELECT a.ProductID, b.ProductCategoryID, b.ProductCategoryName, c.StatusID, 
                        c.StatusName, a.ProductName, a.ProductDescription, a.ProductPhoto, a.CreateBy, 
                        a.CreateTime, a.UpdateBy, a.UpdateTime 
                        FROM tbl_product a 
                        LEFT OUTER JOIN tbl_product_category b ON a.ProductCategoryID = b.ProductCategoryID 
                        LEFT OUTER JOIN tbl_status c ON a.StatusID = c.StatusID 
                        WHERE a.StatusID = ? AND a.ProductName LIKE CONCAT('%', ?, '%')";
            $stmt   = $conn->prepare($query);
            $stmt->bind_param("is", $StatusID, $ProductName);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result(
                $ProductID,
                $ProductCategoryID,
                $ProductCategoryName,
                $StatusID,
                $StatusName,
                $ProductName,
                $ProductDescription,
                $ProductPhoto,
                $CreateBy,
                $CreateTime,
                $UpdateBy,
                $UpdateTime
            );

            $JSONData   = "";

            while ($stmt->fetch()) {
                if ($JSONData !== "") $JSONData .= ",";

                if ($StatusID == 1) {
                    $StatusName = "<span ProductID='$ProductID' StatusID='$StatusID' class='badge rounded-pill text-bg-success mx-1'>$StatusName</span>";
                } else {
                    $StatusName = "<span ProductID='$ProductID' StatusID='$StatusID' class='badge rounded-pill text-bg-danger mx-1'>$StatusName</span>";
                }

                $ProductDescriptionConvert = trim(preg_replace('/\s+/', ' ', $ProductDescription));

                if ($StatusID == 1) {
                    $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editProduct' title='EDIT' ProductID='$ProductID' ProductCategoryID='$ProductCategoryID' ProductCategoryName='$ProductCategoryName' StatusID='$StatusID' ProductName='$ProductName' ProductDescription='$ProductDescriptionConvert' ProductPhoto='$ProductPhoto' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteProduct' title='DELETE' ProductID='$ProductID'><i class='fa-solid fa-trash'></i></button>";
                    if (SYSAdmin()) {
                        $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editProduct' title='EDIT' ProductID='$ProductID' ProductCategoryID='$ProductCategoryID' ProductCategoryName='$ProductCategoryName' StatusID='$StatusID' ProductName='$ProductName' ProductDescription='$ProductDescriptionConvert' ProductPhoto='$ProductPhoto' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteProduct' title='DELETE' ProductID='$ProductID'><i class='fa-solid fa-trash'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugProduct' title='DEBUG' ProductID='$ProductID'><i class='fa-solid fa-eye'></i></button>";
                    }
                } else {
                    $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeProduct' title='ACTIVATE' ProductID='$ProductID'><i class='fa-solid fa-check'></i></button>";
                    if (SYSAdmin()) {
                        $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeProduct' title='ACTIVATE' ProductID='$ProductID'><i class='fa-solid fa-check'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugProduct' title='DEBUG' ProductID='$ProductID'><i class='fa-solid fa-eye'></i></button>";
                    }
                }

                $ProductPhoto = "<img src='" . WebRootPath() . "assets/img/productphoto/" . $ProductPhoto . "' class='img-fluid h-25 w-25 rounded-5' alt='" . $ProductPhoto . "'>";

                $JSONData .= '["' . $ProductName . '", "' . $ProductCategoryName . '", "' . $ProductPhoto . '", "' . $StatusName . '", "' . $Button . '"]';
            }

            if ($JSONData == null) {
                $JSONData = ["", "", "", "", ""];
                echo "[" . json_encode($JSONData) . "]";
            } else {
                $conn->commit();
                echo "[" . $JSONData . "]";
            }

            $stmt->close();
        } else {
            $conn->begin_transaction();

            $query  = "SELECT a.ProductID, b.ProductCategoryID, b.ProductCategoryName, c.StatusID, 
                        c.StatusName, a.ProductName, a.ProductPrice, a.ProductDescription, a.ProductPhoto, 
                        a.CreateBy, a.CreateTime, a.UpdateBy, a.UpdateTime 
                        FROM tbl_product a 
                        LEFT OUTER JOIN tbl_product_category b ON a.ProductCategoryID = b.ProductCategoryID 
                        LEFT OUTER JOIN tbl_status c ON a.StatusID = c.StatusID 
                        WHERE a.StatusID = ? AND a.ProductCategoryID = ? AND a.ProductName LIKE CONCAT('%', ?, '%')";
            $stmt   = $conn->prepare($query);
            $stmt->bind_param("iis", $StatusID, $ProductCategoryID, $ProductName);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result(
                $ProductID,
                $ProductCategoryID,
                $ProductCategoryName,
                $StatusID,
                $StatusName,
                $ProductName,
                $ProductPrice,
                $ProductDescription,
                $ProductPhoto,
                $CreateBy,
                $CreateTime,
                $UpdateBy,
                $UpdateTime
            );

            $JSONData   = "";

            while ($stmt->fetch()) {
                if ($JSONData !== "") $JSONData .= ",";

                if ($StatusID == 1) {
                    $StatusName = "<span ProductID='$ProductID' StatusID='$StatusID' class='badge rounded-pill text-bg-success mx-1'>$StatusName</span>";
                } else {
                    $StatusName = "<span ProductID='$ProductID' StatusID='$StatusID' class='badge rounded-pill text-bg-danger mx-1'>$StatusName</span>";
                }

                $ProductDescriptionConvert = trim(preg_replace('/\s+/', ' ', $ProductDescription));

                if ($StatusID == 1) {
                    $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editProduct' title='EDIT' ProductID='$ProductID' ProductCategoryID='$ProductCategoryID' ProductCategoryName='$ProductCategoryName' StatusID='$StatusID' ProductName='$ProductName' ProductPrice='$ProductPrice' ProductDescription='$ProductDescriptionConvert' ProductPhoto='$ProductPhoto' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteProduct' title='DELETE' ProductID='$ProductID'><i class='fa-solid fa-trash'></i></button>";
                    if (SYSAdmin()) {
                        $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editProduct' title='EDIT' ProductID='$ProductID' ProductCategoryID='$ProductCategoryID' ProductCategoryName='$ProductCategoryName' StatusID='$StatusID' ProductName='$ProductName' ProductPrice='$ProductPrice' ProductDescription='$ProductDescriptionConvert' ProductPhoto='$ProductPhoto' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteProduct' title='DELETE' ProductID='$ProductID'><i class='fa-solid fa-trash'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugProduct' title='DEBUG' ProductID='$ProductID'><i class='fa-solid fa-eye'></i></button>";
                    }
                } else {
                    $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeProduct' title='ACTIVATE' ProductID='$ProductID'><i class='fa-solid fa-check'></i></button>";
                    if (SYSAdmin()) {
                        $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeProduct' title='ACTIVATE' ProductID='$ProductID'><i class='fa-solid fa-check'></i></button>";
                        $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugProduct' title='DEBUG' ProductID='$ProductID'><i class='fa-solid fa-eye'></i></button>";
                    }
                }

                $ProductPhoto = "<img src='" . WebRootPath() . "assets/img/productphoto/" . $ProductPhoto . "' class='img-fluid h-25 w-25 rounded-5' alt='" . $ProductPhoto . "'>";

                $JSONData .= '["' . $ProductName . '", "' . $ProductCategoryName . '", "' . $ProductPhoto . '", "' . $StatusName . '", "' . $Button . '"]';
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
