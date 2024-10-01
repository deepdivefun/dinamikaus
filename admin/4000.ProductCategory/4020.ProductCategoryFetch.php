<?php
$WebRootPath = realpath('../');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/ConnectionClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '4000.ProductCategory.php') === FALSE) {
    echo    "<script>
                alert('Invalid Caller');
                document.location.href = '4000.ProductCategory.php';
            </script>";
    die;
}

if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3 and $_SESSION['RoleID'] !== 2 and $_SESSION['RoleID'] !== 1) {
    echo    "You don't have access rights to this page";
    die;
}

$StatusID               = filter_input(INPUT_POST, 'StatusID');
$ProductCategoryName    = filter_input(INPUT_POST, 'ProductCategoryName');
$GToken                 = filter_input(INPUT_POST, 'GToken');

if ($GToken == !null) {
    $SecretKey  = '6Lco2AAjAAAAACZSJFoBUebx-xmcGVjemLtJjEk1';
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

        $query  = "SELECT a.ProductCategoryID, b.StatusID, b.StatusName, a.ProductCategoryName, 
                    a.ProductCategoryCatalog, a.CreateBy, a.CreateTime, a.UpdateBy, a.UpdateTime 
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
            $CreateBy,
            $CreateTime,
            $UpdateBy,
            $UpdateTime
        );

        $JSONData   = "";

        while ($stmt->fetch()) {
            if ($JSONData !== "") $JSONData .= ",";

            if ($StatusID == 1) {
                $StatusName = "<span ProductCategoryID='$ProductCategoryID' StatusID='$StatusID' class='badge rounded-pill text-bg-success mx-1'>$StatusName</span>";
            } else {
                $StatusName = "<span ProductCategoryID='$ProductCategoryID' StatusID='$StatusID' class='badge rounded-pill text-bg-danger mx-1'>$StatusName</span>";
            }

            // if ($ProductCategoryCatalog != null) {
            //     $ProductCategoryCatalog = "<span ProductCategoryID='$ProductCategoryID' ProductCategoryCatalog='$ProductCategoryCatalog' class='badge rounded-pill text-bg-success'><i class='fa-solid fa-circle-check'></i></span>";
            // } else {
            //     $ProductCategoryCatalog = "<span ProductCategoryID='$ProductCategoryID' ProductCategoryCatalog='$ProductCategoryCatalog' class='badge rounded-pill text-bg-danger'><i class='fa-solid fa-circle-xmark'></i></span>";
            // }

            if ($StatusID == 1) {
                $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editProductCategory' title='EDIT' ProductCategoryID='$ProductCategoryID' StatusID='$StatusID' ProductCategoryName='$ProductCategoryName' ProductCategoryCatalog='$ProductCategoryCatalog' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteProductCategory' title='DELETE' ProductCategoryID='$ProductCategoryID'><i class='fa-solid fa-trash'></i></button>";
                if ($_SESSION['RoleID'] == 4) {
                    $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editProductCategory' title='EDIT' ProductCategoryID='$ProductCategoryID' StatusID='$StatusID' ProductCategoryName='$ProductCategoryName' ProductCategoryCatalog='$ProductCategoryCatalog' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteProductCategory' title='DELETE' ProductCategoryID='$ProductCategoryID'><i class='fa-solid fa-trash'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugProductCategory' title='DEBUG' ProductCategoryID='$ProductCategoryID'><i class='fa-solid fa-eye'></i></button>";
                }
            } else {
                $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeProductCategory' title='ACTIVATE' ProductCategoryID='$ProductCategoryID'><i class='fa-solid fa-check'></i></button>";
                if ($_SESSION['RoleID'] == 4) {
                    $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeProductCategory' title='ACTIVATE' ProductCategoryID='$ProductCategoryID'><i class='fa-solid fa-check'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugProductCategory' title='DEBUG' ProductCategoryID='$ProductCategoryID'><i class='fa-solid fa-eye'></i></button>";
                }
            }

            $JSONData .= '["' . $ProductCategoryName . '", "' . $ProductCategoryCatalog . '", "' . $StatusName . '", "' . $Button . '"]';
        }

        if ($JSONData == null) {
            $JSONData = ["", "", "", ""];
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
