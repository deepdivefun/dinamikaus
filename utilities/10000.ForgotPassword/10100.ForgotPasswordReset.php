<?php
$Title = 'Reset Password';
$WebRootPath = realpath('../../admin');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/component/Header.php');
require_once($WebRootPath . '/includes/class/ForgotPasswordClass.php');

$Token          = $_GET['Token'];

if (isset($_POST['ForgotPasswordReset'])) {

    $ResetTokenHash     = $_POST['Token'];
    $Password           = filter_input(INPUT_POST, 'Password');
    $ConfirmPassword    = filter_input(INPUT_POST, 'ConfirmPassword');
    $GToken             = filter_input(INPUT_POST, 'GToken');

    if ($GToken == !null) {
        $SecretKey  = '6Lco2AAjAAAAACZSJFoBUebx-xmcGVjemLtJjEk1';
        $Token      = $GToken;
        $IP         = $_SERVER['REMOTE_ADDR'];
        $URL        = "https://www.google.com/recaptcha/api/siteverify?secret=" . $SecretKey . "&response=" . $Token . "&remoteip=" . $IP;

        $Request    = file_get_contents($URL);
        $Response   = json_decode($Request);

        if ($Response->success === 0) {
            echo    "You are spammer ! Get the @$%K out";
        } else {
            $ForgotPassword = new ForgotPassword();
            $ForgotPassword->getEmailForgotPassword(
                $ResetTokenHash,
                $Password,
                $ConfirmPassword
            );
        }
    }
}
?>
<div class="container container-tight py-4">
    <div class="text-center">
        <a href="10100.ForgotPasswordReset.php" class="navbar-brand navbar-brand-autodark">
            <img src="<?= WebRootPath(); ?>assets/img/logo/logo.png" height="150" alt="Logo">
        </a>
    </div>
    <div class="card card-md rounded-5">
        <div class="card-body">
            <h2 class="h2 text-center mb-4">Reset password</h2>
            <form method="post" autocomplete="off">
                <div class="form-group mb-3">
                    <label class="form-label" for="Password">Password</label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="Password" id="Password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 characters or more" required>
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip" onclick="showPassword()"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                </svg>
                            </a>
                        </span>
                    </div>
                    <script>
                        function showPassword() {
                            var x = document.getElementById("Password");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="ConfirmPassword">Confirm Password</label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="ConfirmPassword" id="ConfirmPassword" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 characters or more" required>
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip" onclick="showConfirmPassword()"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                </svg>
                            </a>
                        </span>
                    </div>
                    <script>
                        function showConfirmPassword() {
                            var x = document.getElementById("ConfirmPassword");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                </div>
                <div>
                    <input type="hidden" class="form-control" name="Token" id="Token" value="<?= htmlspecialchars($Token) ?>" required>
                    <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                </div>
                <div class="form-footer">
                    <button type="submit" name="ForgotPasswordReset" class="btn btn-outline-primary rounded-5 w-100"><i class="fa-solid fa-recycle"></i>&nbsp;Submit new password</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once($WebRootPath . '/includes/component/Script.php');
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>