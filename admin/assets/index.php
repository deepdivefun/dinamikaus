<?php
$WebRootPath = realpath('../');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/component/Header.php');
?>
<div class="page page-center">
  <div class="container-tight py-4">
    <div class="empty">
      <div class="empty-header">404</div>
      <p class="empty-title">Oops… You just found an error page</p>
      <p class="empty-subtitle text-muted">
        We are sorry but the page you are looking for was not found
      </p>
      <div class="empty-action">
        <a href="<?= WebRootPath(); ?>1000.Home/1000.Home.php" class="btn btn-outline-primary rounded-5">
          Take me home
        </a>
      </div>
    </div>
  </div>
</div>
<?php
require_once($WebRootPath . '/includes/component/Script.php');
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>