<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="<?= WebRootPath(); ?>1000.Home/1000.Home.php">
                <!-- <img src="<?= WebRootPath(); ?>assets/img/logo/logoDashboard.png" height="32" width="110" alt="Logo" class="navbar-brand-image"> -->
                <h1 class="text-left fw-bold mt-3">PT. Dinamika Utama Saka</h1>
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                    </svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                    </svg>
                </a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <?php foreach ($User->fetchAccountByID($_SESSION['UserID']) as $row) : ?>
                        <span class="avatar avatar-sm"><img src="https://eu.ui-avatars.com/api/?name=<?= $row['FullName']; ?>"></span>
                    <?php endforeach; ?>
                    <div class="d-none d-xl-block ps-2">
                        <?php foreach ($User->fetchAccountByID($_SESSION['UserID']) as $row) : ?>
                            <div><?= $row['FullName']; ?></div>
                        <?php endforeach; ?>
                        <?php foreach ($User->fetchAccountByID($_SESSION['UserID']) as $row) : ?>
                            <div class="mt-1 small text-muted">
                                <?php
                                if ($row['RoleID'] == 1) {
                                    echo 'Staff';
                                } elseif ($row['RoleID'] == 2) {
                                    echo 'Admin';
                                } elseif ($row['RoleID'] == 3) {
                                    echo 'App Admin';
                                } else {
                                    echo 'SYS Admin';
                                }
                                ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="<?= WebRootPath(); ?>2000.Account/2100.Profile.php?UserID=<?= $_SESSION['UserID']; ?>" class="dropdown-item">Profile</a>
                    <a href="<?= WebRootPath(); ?>15000.EventLog/15100.ActivityLog.php" class="dropdown-item">Activity Log</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <a href="<?= WebRootPath(); ?>99999.Logout/99999.Logout.php" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>