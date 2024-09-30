<?php
$Title  = '404 Not Found';
$WebRootPath = realpath('../');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/component/Header.php');
?>
<!-- 404 Start -->
<div class="container-fluid py-5" style="background: linear-gradient(rgba(19, 53, 123, 0.3), rgba(19, 53, 153, 0.3)); object-fit: cover;">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                <h1 class="display-1">404</h1>
                <h1 class="mb-4 text-dark">Page Not Found</h1>
                <p class="mb-4 text-dark">We’re sorry, the page you have looked for does not exist in our website! Maybe go to our home page or try to use a search?</p>
                <a class="btn btn-primary rounded-pill py-3 px-5" href="<?= WebRootPath(); ?>index.php">Go Back To Home</a>
            </div>
        </div>
    </div>
</div>
<!-- 404 End -->

<!-- Copyright Start -->
<div class="container-fluid copyright text-body py-4">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-12 text-center">
                <i class="fas fa-copyright me-2"></i>
                <a class="text-white" href="#">Zaveryna Utama</a>, All right reserved.
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->
<?php
// require_once($WebRootPath . '/includes/component/Footer.php');
require_once($WebRootPath . '/includes/component/Script.php');
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>