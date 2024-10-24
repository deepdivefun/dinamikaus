<?php
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/TeamClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');

if (strpos($_SERVER['HTTP_REFERER'], '3000.Team.php') === FALSE) {
    echo    "Invalid Caller";
    die();
}

if (!SYSAdmin() and !AppAdmin() and !Admin()) {
    echo    "You don't have access rights to this page";
    die();
}

$TeamID                     = filter_input(INPUT_POST, 'TeamID');

$TeamPhotoBeforeConvert     = filter_input(INPUT_POST, 'TeamPhotoBeforeConvert');
if (file_exists("../assets/img/teamphoto/$TeamPhotoBeforeConvert")) {
    unlink("../assets/img/teamphoto/$TeamPhotoBeforeConvert");
}

$StatusID                   = filter_input(INPUT_POST, 'StatusID');
$FullName                   = filter_input(INPUT_POST, 'FullName');
$Position                   = filter_input(INPUT_POST, 'Position');
$Linkedin                   = filter_input(INPUT_POST, 'Linkedin');
$Instagram                  = filter_input(INPUT_POST, 'Instagram');

$TeamPhoto                  = $_FILES['TeamPhoto']['name'];
$Dir                        = "../assets/img/teamphoto/";
$File                       = $_FILES['TeamPhoto']['tmp_name'];
$TeamPhotoConvert           = uniqid() . "-" . date('Y-m-d') . "-" . $TeamPhoto;
move_uploaded_file($File, $Dir . $TeamPhotoConvert);

$UpdateBy                   = filter_input(INPUT_POST, 'UpdateBy');
$EventLogUser               = $UpdateBy;
$EventLogData               = 'Update Team ' . $FullName;
$GToken                     = filter_input(INPUT_POST, 'GToken');

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
    if (empty($TeamID) and empty($StatusID) and empty($FullName) and empty($Position) and empty($TeamPhotoBeforeConvert) and empty($UpdateBy)) {
        throw new Exception("Error Processing Request");
    } else {
        $EventLog = new EventLog();
        $EventLog->createEventLog(
            $EventLogUser,
            $EventLogData
        );

        $Team = new Team();
        $Team->updateTeam(
            $TeamID,
            $StatusID,
            $FullName,
            $Position,
            $Linkedin,
            $Instagram,
            $TeamPhotoConvert,
            $UpdateBy
        );
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
$conn->close();
