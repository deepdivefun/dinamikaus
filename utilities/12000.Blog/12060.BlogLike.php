<?php
$WebRootPath = realpath('../../');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/class/BlogClass.php');

if (strpos($_SERVER['HTTP_REFERER'], 'blog.php') === FALSE) {
    echo    "<script>
                alert('Invalid Caller');
                document.location.href = '../../blog.php';
            </script>";
    die;
}

if (isset($_POST['createLike'])) {

    $BlogID     = filter_input(INPUT_POST, 'BlogID');
    $BlogLike   = filter_input(INPUT_POST, 'BlogLike');
    $GToken     = filter_input(INPUT_POST, 'GToken');

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
        if (empty($BlogID) and empty($BlogLike)) {
            throw new Exception("Error Processing Request");
        } else {
            $Blog   = new Blog();
            $Blog->updateLike($BlogID, $BlogLike);
        }
    } catch (Exception $e) {
        $conn->rollback();
        echo 'Message: ' . $e->getMessage();
    }
}
$conn->close();
