<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ConnectionClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '15000.EventLog.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin()) {
    echo    "You don't have access rights to this page";
    die();
}

$EventLogTimeStamp  = filter_input(INPUT_POST, 'EventLogTimeStamp');
$EventLogUser       = filter_input(INPUT_POST, 'EventLogUser');
$GToken             = filter_input(INPUT_POST, 'GToken');

if (!empty($GToken)) {
    $SecretKey  = '6Lco2AAjAAAAACZSJFoBUebx-xmcGVjemLtJjEk1';
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
    $conn->begin_transaction();

    $query  = "SELECT EventLogID, EventLogTimeStamp, EventLogUser, EventLogData 
                FROM tbl_eventlog 
                WHERE EventLogTimeStamp LIKE CONCAT('%', ?, '%') AND EventLogUser LIKE CONCAT('%', ?, '%')";
    $stmt   = $conn->prepare($query);
    $stmt->bind_param("ss", $EventLogTimeStamp, $EventLogUser);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($EventLogID, $EventLogTimeStamp, $EventLogUser, $EventLogData);

    $JSONData   = "";

    while ($stmt->fetch()) {
        if ($JSONData !== "") $JSONData .= ",";

        $JSONData .= '["' . $EventLogTimeStamp . '", "' . $EventLogUser . '", "' . $EventLogData . '"]';
    }

    if ($JSONData == null) {
        $JSONData = ["", "", ""];
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
