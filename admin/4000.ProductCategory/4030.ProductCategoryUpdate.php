<?php
$WebRootPath = realpath('../');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/ProductCategoryClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');

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

$ProductCategoryID                      = filter_input(INPUT_POST, 'ProductCategoryID');
$ProductCategoryCatalogBeforeConvert    = filter_input(INPUT_POST, 'ProductCategoryCatalogBeforeConvert');
if (file_exists("../assets/file/productcatalog/$ProductCategoryCatalogBeforeConvert")) {
    unlink("../assets/file/productcatalog/$ProductCategoryCatalogBeforeConvert");
}
$StatusID                               = filter_input(INPUT_POST, 'StatusID');
$ProductCategoryName                    = filter_input(INPUT_POST, 'ProductCategoryName');

$ProductCategoryCatalog                 = $_FILES['ProductCategoryCatalog']['name'];
$Dir                                    = "../assets/file/productcatalog/";
$File                                   = $_FILES['ProductCategoryCatalog']['tmp_name'];
$ProductCategoryCatalogConvert          =  uniqid() . "-" . date('Y-m-d') . "-" . $ProductCategoryCatalog;
move_uploaded_file($File, $Dir . $ProductCategoryCatalogConvert);

$UpdateBy                               = filter_input(INPUT_POST, 'UpdateBy');
$EventLogUser                           = $UpdateBy;
$EventLogData                           = 'Update Product Category ' . $ProductCategoryName;
$GToken                                 = filter_input(INPUT_POST, 'GToken');

if ($GToken != null) {
    $SecretKey  = '6Lco2AAjAAAAACZSJFoBUebx-xmcGVjemLtJjEk1';
    $Token      = $GToken;
    $IP         = $_SERVER['REMOTE_ADDR'];
    $URL        = "https://www.google.com/recaptcha/api/siteverify?secret=" . $SecretKey . "&response=" . $Token . "&remoteip=" . $IP;

    $Request    = file_get_contents($URL);
    $Response   = json_decode($Request);

    if ($Response->success == 0) {
        echo    "You are spammer ! Get the @$%K out";
        die;
    }
}

try {
    if (empty($ProductCategoryID) and empty($StatusID) and empty($ProductCategoryName) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $ProductCategory = new ProductCategory();
        $ProductCategory->updateProductCategory(
            $ProductCategoryID,
            $StatusID,
            $ProductCategoryName,
            $ProductCategoryCatalogConvert,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
