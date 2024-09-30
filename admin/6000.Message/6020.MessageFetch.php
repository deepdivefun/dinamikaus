<?php
$WebRootPath = realpath('../');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/ConnectionClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '6000.Message.php') === FALSE) {
    echo    "<script>
                alert('Invalid Caller');
                document.location.href = '6000.Message.php';
            </script>";
    die;
}

$StatusMessageID    = filter_input(INPUT_POST, "StatusMessageID");
$FullName           = filter_input(INPUT_POST, "FullName");
$Email              = filter_input(INPUT_POST, "Email");
$CompanyName        = filter_input(INPUT_POST, "CompanyName");
$GToken             = filter_input(INPUT_POST, "GToken");

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
    if (empty($StatusMessageID) and empty($FullName) and empty($Email) and empty($CompanyName)) {
        throw new Exception("Error Processing Request");
    } else {

        $conn->begin_transaction();

        $query  = "SELECT a.MessageID, b.StatusMessageID, b.StatusMessage, a.FullName, a.Email, 
                    a.CompanyName, a.PhoneNumber, a.WhatsappNumber, a.MessageSubject, a.MessageContents, 
                    a.CreateBy, a.CreateTime, a.UpdateBy, a.UpdateTime FROM tbl_message a
                    LEFT OUTER JOIN tbl_status_message b ON a.StatusMessageID = b.StatusMessageID 
                    WHERE a.StatusMessageID = ? AND a.FullName LIKE CONCAT('%', ?, '%') 
                    AND a.Email LIKE CONCAT('%', ?, '%') AND a.CompanyName LIKE CONCAT('%', ?, '%')";
        $stmt   = $conn->prepare($query);
        $stmt->bind_param("isss", $StatusMessageID, $FullName, $Email, $CompanyName);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($MessageID, $StatusMessageID, $StatusMessage, $FullName, $Email, $CompanyName, $PhoneNumber, $WhatsappNumber, $MessageSubject, $MessageContents, $CreateBy, $CreateTime, $UpdateBy, $UpdateTime);

        $JSONData   = "";

        while ($stmt->fetch()) {
            if ($JSONData !== "") $JSONData .= ",";

            if ($StatusMessageID == 1) {
                $StatusMessage = "<span MessageID='$MessageID' StatusMessageID='$StatusMessageID' class='badge rounded-pill text-bg-danger mx-1'>$StatusMessage</span>";
            } else {
                $StatusMessage = "<span MessageID='$MessageID' StatusMessageID='$StatusMessageID' class='badge rounded-pill text-bg-success mx-1'>$StatusMessage</span>";
            }

            if ($CompanyName == "Personal") {
                $companyName = "<span MessageID='$MessageID' CompanyName='$CompanyName' class='badge rounded-pill text-bg-info mx-1'>$CompanyName</span>";
            } else {
                $companyName = "<span MessageID='$MessageID' CompanyName='$CompanyName' class='badge rounded-pill text-bg-success mx-1'>$CompanyName</span>";
            }

            if ($StatusMessageID == 1) {
                $Button = "<button type='button' class='btn btn-outline-warning rounded-5 mx-1 editMessage' title='READ & EDIT' MessageID='$MessageID' StatusMessageID='$StatusMessageID' FullName='$FullName' Email='$Email' CompanyName='$CompanyName' PhoneNumber='$PhoneNumber' WhatsappNumber='$WhatsappNumber' MessageSubject='$MessageSubject' MessageContents='$MessageContents' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-eye'></i></button>";
                $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 sendEmail' title='SEND EMAIL' MessageID='$MessageID' Email='$Email'><i class='fa-solid fa-envelope'></i></button>";
                $Button .= "<button type='button' class='btn btn-outline-info rounded-5 mx-1 callPhoneNumber' title='CALL PHONE NUMBER' MessageID='$MessageID' PhoneNumber='$PhoneNumber'><i class='fa-solid fa-phone'></i></button>";
                $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 sendWhatsapp' title='SEND WHATSAPP' MessageID='$MessageID' WhatsappNumber='$WhatsappNumber'><i class='fa-brands fa-whatsapp'></i></button>";
                if ($_SESSION['RoleID'] == 4) {
                    $Button = "<button type='button' class='btn btn-outline-warning rounded-5 mx-1 editMessage' title='READ & EDIT' MessageID='$MessageID' StatusMessageID='$StatusMessageID' FullName='$FullName' Email='$Email' CompanyName='$CompanyName' PhoneNumber='$PhoneNumber' WhatsappNumber='$WhatsappNumber' MessageSubject='$MessageSubject' MessageContents='$MessageContents' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-eye'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 sendEmail' title='SEND EMAIL' MessageID='$MessageID' Email='$Email'><i class='fa-solid fa-envelope'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-info rounded-5 mx-1 callPhoneNumber' title='CALL PHONE NUMBER' MessageID='$MessageID' PhoneNumber='$PhoneNumber'><i class='fa-solid fa-phone'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 sendWhatsapp' title='SEND WHATSAPP' MessageID='$MessageID' WhatsappNumber='$WhatsappNumber'><i class='fa-brands fa-whatsapp'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugMessage' title='DEBUG' MessageID='$MessageID'><i class='fa-solid fa-eye'></i></button>";
                }
            } else {
                $Button = "<button type='button' class='btn btn-outline-warning rounded-5 mx-1 editMessage' title='READ & EDIT' MessageID='$MessageID' StatusMessageID='$StatusMessageID' FullName='$FullName' Email='$Email' CompanyName='$CompanyName' PhoneNumber='$PhoneNumber' WhatsappNumber='$WhatsappNumber' MessageSubject='$MessageSubject' MessageContents='$MessageContents' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-eye'></i></button>";
                $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 sendEmail' title='SEND EMAIL' MessageID='$MessageID' Email='$Email'><i class='fa-solid fa-envelope'></i></button>";
                $Button .= "<button type='button' class='btn btn-outline-info rounded-5 mx-1 callPhoneNumber' title='CALL PHONE NUMBER' MessageID='$MessageID' PhoneNumber='$PhoneNumber'><i class='fa-solid fa-phone'></i></button>";
                $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 sendWhatsapp' title='SEND WHATSAPP' MessageID='$MessageID' WhatsappNumber='$WhatsappNumber'><i class='fa-brands fa-whatsapp'></i></button>";
                if ($_SESSION['RoleID'] == 4) {
                    $Button = "<button type='button' class='btn btn-outline-warning rounded-5 mx-1 editMessage' title='READ & EDIT' MessageID='$MessageID' StatusMessageID='$StatusMessageID' FullName='$FullName' Email='$Email' CompanyName='$CompanyName' PhoneNumber='$PhoneNumber' WhatsappNumber='$WhatsappNumber' MessageSubject='$MessageSubject' MessageContents='$MessageContents' CreateBy='$CreateBy' CreateTime='$CreateTime' UpdateBy='$UpdateBy' UpdateTime='$UpdateTime'><i class='fa-solid fa-eye'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-danger rounded-5 mx-1 sendEmail' title='SEND EMAIL' MessageID='$MessageID' Email='$Email'><i class='fa-solid fa-envelope'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-info rounded-5 mx-1 callPhoneNumber' title='CALL PHONE NUMBER' MessageID='$MessageID' PhoneNumber='$PhoneNumber'><i class='fa-solid fa-phone'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 sendWhatsapp' title='SEND WHATSAPP' MessageID='$MessageID' WhatsappNumber='$WhatsappNumber'><i class='fa-brands fa-whatsapp'></i></button>";
                    $Button .= "<button type='button' class='btn btn-outline-success rounded-5 mx-1 debugMessage' title='DEBUG' MessageID='$MessageID'><i class='fa-solid fa-eye'></i></button>";
                }
            }

            $JSONData .= '["' . $FullName . '","' . $Email . '", "' . $companyName . '", "' . $PhoneNumber . '", "' . $StatusMessage . '", "' . $Button . '"]';
        }
    }

    if ($JSONData == null) {
        $JSONData = ["", "", "", "", "", ""];
        echo "[" . json_encode($JSONData) . "]";
    } else {
        $conn->commit();
        echo "[" . $JSONData . "]";
    }

    $stmt->close();
} catch (Exception $e) {
    $conn->rollback();
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
