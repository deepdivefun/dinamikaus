<?php
$Title          = 'Login';
$WebRootPath    = realpath('admin');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/component/Header.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/class/EventLogClass.php');
require_once('includes/class/SettingsClass.php');
$SettingsLogo   = new Settings();

if (isset($_POST['Login'])) {

    $Username       = filter_input(INPUT_POST, 'Username');
    $Password       = filter_input(INPUT_POST, 'Password');
    $EventLogUser   = $Username;
    $EventLogData   = $Username . ' is logged in';
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
        } else {
            $EventLog = new EventLog();
            $EventLog->createEventLog(
                $EventLogUser,
                $EventLogData
            );

            $Session    = new SessionManagement();
            $Session->userLogin(
                $Username,
                $Password
            );
        }
    }
}
?>
<div class="container container-tight py-4">
    <div class="text-center">
        <a href="index.php" class="navbar-brand navbar-brand-autodark">
            <?php foreach ($SettingsLogo->fetchLogoLoginPage() as $row) : ?>
                <img src="<?= WebRootPath(); ?>assets/img/settingslogo/<?= $row['SettingsLogoValue']; ?>" height="150" alt="<?= $row['SettingsLogoValue']; ?>">
            <?php endforeach; ?>
        </a>
    </div>
    <div class="card card-md shadow-lg rounded-5">
        <div class="card-body">
            <h2 class="h2 text-center mb-4">Login to your account</h2>
            <form method="POST" autocomplete="off">
                <div class="form-group mb-3">
                    <label class="form-label" for="Username">Username</label>
                    <input type="text" class="form-control" name="Username" id="Username" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="Password">
                        Password
                        <span class="form-label-description">
                            <a href="utilities/10000.ForgotPassword/10000.ForgotPassword.php">Forgot Password</a>
                        </span>
                    </label>
                    <div class="input-group input-group-flat">
                        <input type="password" class="form-control" name="Password" id="Password" required>
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
                <div class="form-group">
                    <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input" name="Remember" id="Remember">
                        <span class="form-check-label">Remember me</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" name="Login" class="btn btn-outline-primary rounded-5 w-100">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once($WebRootPath . '/includes/component/Script.php');
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>