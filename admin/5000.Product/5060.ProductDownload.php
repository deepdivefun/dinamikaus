<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ProductClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');
require_once($WebRootPath . '/includes/class/ExcelClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '5000.Product.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
    echo    "You don't have access rights to this page";
    die();
}

$UpdateBy       = $_SESSION['Username'];
$EventLogUser   = $UpdateBy;
$EventLogData   = 'Download data product';

$EventLog   = new EventLog();
$EventLog->createEventLog(
    $EventLogUser,
    $EventLogData
);

$Excel  = new Excel();
$Excel->downloadProduct();
