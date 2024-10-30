<?php
$Title          = 'Dashboard';
$WebRootPath    = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/component/Header.php');
require_once($WebRootPath . '/includes/class/AccountClass.php');
$User           = new Account();
require_once($WebRootPath . '/includes/component/Topbar.php');
require_once($WebRootPath . '/includes/class/NavbarFunction.php');
require_once($WebRootPath . '/includes/component/Navbar.php');
require_once($WebRootPath . '/includes/class/ShortcutFunction.php');
?>
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <h2 class="page-title">
                    Dashboard
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
                <div class="card card-md rounded-5 shadow-lg">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <?php foreach ($User->fetchAccountByID($_SESSION['UserID']) as $row) : ?>
                                <h3 class="h1 text-center">Hello <?= $row['FullName']; ?>, Welcome to Dinamika Utama Saka</h3>
                            <?php endforeach; ?>
                            <hr>

                            <h2 class="text-primary">Shortcut&nbsp;:</h2>
                            <div class="col-md-12">
                                <div class="col-12 mb-4">
                                    <div class="row row-cards">
                                        <?= ShortcutUser(); ?>
                                        <?= ShortcutTeam(); ?>
                                        <?= ShortcutOurClient(); ?>
                                    </div>
                                </div>

                                <div class="col-12 mb-4">
                                    <div class="row row-cards">
                                        <?= ShortcutProductCategory(); ?>
                                        <?= ShortcutProduct(); ?>
                                    </div>
                                </div>

                                <div class="col-12 mb-4">
                                    <div class="row row-cards">
                                        <?= ShortcutTestimonial(); ?>
                                    </div>
                                </div>

                                <div class="col-12 mb-4">
                                    <div class="row row-cards">
                                        <?= ShortcutContact(); ?>
                                        <?= ShortcutPaymentLogo(); ?>
                                        <?= ShortcutShippingLogo(); ?>
                                    </div>
                                </div>

                                <div class="col-12 mb-4">
                                    <div class="row row-cards">
                                        <?= ShortcutSettingsApplication(); ?>
                                        <?= ShortcutSettingsLogo(); ?>
                                        <?= ShortcutEventLog(); ?>
                                        <?= ShortcutResetPasswordTools(); ?>
                                        <?= ShortcutMetaTag(); ?>
                                    </div>
                                </div>

                                <div class="col-12 mb-4">
                                    <div class="row row-cards">
                                        <?= ShortcutDebutTools(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
    </div>
</div>
<?php
require_once($WebRootPath . '/includes/component/Footer.php');
require_once($WebRootPath . '/includes/component/Script.php');
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>