<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ConnectionClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '11000.ShippingLogo.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin()) {
    echo    "You don't have access rights to this page";
    die();
}

$StatusID       = filter_input(INPUT_POST, 'StatusID');
$ShippingName   = filter_input(INPUT_POST, 'ShippingName');
$GToken         = filter_input(INPUT_POST, 'GToken');

if (!empty($GToken)) {
    $SecretKey  = '6Le0EGkpAAAAAB-9Mv73FGP_1p5rUCO8jpesJIqP';
    $Token      = $GToken;
    $IP         = $_SERVER['REMOTE_ADDR'];
    $URL        = "https://www.google.com/recaptcha/api/siteverify?secret=" . $SecretKey . "&response=" . $Token . "&remoteip=" . $IP;

    $Request    = file_get_contents($URL);
    $Response   = json_decode($Request);

    if ($Response->success === 0) {
        echo    "You are spammer ! Get the @$%K out";
        die();
    }
}

try {
    if (empty($StatusID)) {
        throw new Exception("Error Processing Request");
    } else {
        $conn->begin_transaction();

        $query  = "SELECT a.ShippingID, b.StatusID, b.StatusName, a.ShippingName, a.ShippingPhoto, 
                    a.CreateBy, a.CreateTime, a.UpdateBy, a.UpdateTime FROM tbl_shipping a 
                    LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID 
                    WHERE a.StatusID = ? AND a.ShippingName LIKE CONCAT('%', ?, '%')";
        $stmt   = $conn->prepare($query);
        $stmt->bind_param("is", $StatusID, $ShippingName);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result(
            $ShippingID,
            $StatusID,
            $StatusName,
            $ShippingName,
            $ShippingPhoto,
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
                $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editShippingLogo' title='EDIT' ShippingID='$ShippingID' StatusID='$StatusID' ShippingName='$ShippingName' ShippingPhoto='$ShippingPhoto' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteShippingLogo' title='DELETE' ShippingID='$ShippingID'><i class='fa-solid fa-trash'></i></button>";
                if (SYSAdmin()) {
                    $Button = "<button type='button' class='btn btn-outline-info rounded-5 mx-1 editShippingLogo' title='EDIT' ShippingID='$ShippingID' StatusID='$StatusID' ShippingName='$ShippingName' ShippingPhoto='$ShippingPhoto' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-pen'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 deleteShippingLogo' title='DELETE' ShippingID='$ShippingID'><i class='fa-solid fa-trash'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugShippingLogo' title='DEBUG' ShippingID='$ShippingID'><i class='fa-solid fa-eye'></i></button>";
                }
            } else {
                $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeShippingLogo' title='ACTIVATE' ShippingID='$ShippingID'><i class='fa-solid fa-check'></i></button>";
                if (SYSAdmin()) {
                    $Button = "<button type='button' class='btn btn-outline-success rounded-5 mx-1 activeShippingLogo' title='ACTIVATE' ShippingID='$ShippingID'><i class='fa-solid fa-check'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugShippingLogo' title='DEBUG' ShippingID='$ShippingID'><i class='fa-solid fa-eye'></i></button>";
                }
            }


            $ShippingPhoto = "<img src='" . WebRootPath() . "assets/img/shippinglogo/" . $ShippingPhoto . "' class='img-fluid h-50 w-auto rounded-5' alt='" . $ShippingPhoto . "'>";

            $JSONData .= '["' . $ShippingName . '", "' . $ShippingPhoto . '", "' . $StatusName . '", "' . $Button . '"]';
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
