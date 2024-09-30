<?php
$Title = 'Forgot Password';
$WebRootPath = realpath('../../admin');
require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/component/Header.php');
require_once($WebRootPath . '/includes/class/ForgotPasswordClass.php');

if (isset($_POST['ForgotPassword'])) {

    $Email      = filter_input(INPUT_POST, 'Email');
    $GToken     = filter_input(INPUT_POST, 'GToken');

    if ($GToken == !null) {
        $SecretKey  = '6Lco2AAjAAAAACZSJFoBUebx-xmcGVjemLtJjEk1';
        $Token      = $GToken;
        $IP         = $_SERVER['REMOTE_ADDR'];
        $URL        = "https://www.google.com/recaptcha/api/siteverify?secret=" . $SecretKey . "&response=" . $Token . "&remoteip=" . $IP;

        $Request    = file_get_contents($URL);
        $Response   = json_decode($Request);

        if ($Response->success === 0) {
            echo    "You are spammer ! Get the @$%K out";
        }
    }

    try {
        if (empty($Email)) {
            throw new Exception("Error Processing Request");
        } else {
            $ForgotPassword = new ForgotPassword();
            $ForgotPassword->sendEmailForgotPassword($Email);
        }
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
}
?>
<div class="container container-tight py-4">
    <div class="text-center">
        <a href="../../index.php" class="navbar-brand navbar-brand-autodark">
            <!-- <h1 class="text-center">Zaveryna Utama</h1> -->
            <img src="<?= WebRootPath(); ?>assets/img/logo/logo.png" height="150" alt="Logo">
        </a>
    </div>
    <div class="card card-md rounded-5">
        <div class="card-body">
            <h2 class="h2 text-center mb-4">Forgot password</h2>
            <form method="POST" autocomplete="off">
                <p class="text-muted mb-4">Enter your email address and your password will be reset and emailed to you.</p>
                <div class="mb-3">
                    <label class="form-label" for="Email">Email address</label>
                    <input type="email" class="form-control" name="Email" id="Email" placeholder="Enter email" required>
                </div>
                <div>
                    <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                </div>
                <div class="form-footer">
                    <button type="submit" name="ForgotPassword" class="btn btn-outline-primary rounded-5 w-100"><i class="fa-solid fa-envelope"></i>&nbsp;Send me new password</button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center text-muted mt-3">
        Forget it, <a href="../../login.php">send me back</a> to the login in screen.
    </div>
</div>
<?php
require_once($WebRootPath . '/includes/component/Script.php');
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>