<?php
$Title = 'Reset Password Tools';
$WebRootPath = realpath('../');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/component/Header.php');
require_once($WebRootPath . '/includes/class/AccountClass.php');
$User       = new Account();
require_once($WebRootPath . '/includes/component/Topbar.php');
require_once($WebRootPath . '/includes/class/NavbarFunction.php');
require_once($WebRootPath . '/includes/component/Navbar.php');

if ($_SESSION['RoleID'] !== 4) {
    echo    "You don't have access rights to this page";
    die;
}
?>
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <h2 class="page-title">
                    Reset Password Tools
                </h2>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="card card-md shadow-lg rounded-5">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <h3 class="text-primary">Reset Password Tools&nbsp;:</h3>
                            <div class="col-md-12">
                                <div class="col-12 mb-4">
                                    <div class="row row-cards">
                                        <div class="col-sm-12 col-lg-6">
                                            <form method="POST">
                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="Email">Email</label>
                                                    <input type="email" class="form-control" name="Email" id="Email" required>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="ConfirmEmail">Confirm Email</label>
                                                    <input type="email" class="form-control" name="ConfirmEmail" id="ConfirmEmail" required>
                                                </div>

                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-danger rounded-5 w-100" onclick="resetPasswordTools();">Reset Password</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once($WebRootPath . '/includes/component/Footer.php');
require_once($WebRootPath . '/includes/component/Script.php');
echo '<script src="14100.DebugToolsResetPassword.js"></script>';
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>