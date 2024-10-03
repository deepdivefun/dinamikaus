<?php
$Title          = 'Profile';
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
?>
<div class="page-header">
    <div class="container">
        <div class="row align-items-center">
            <?php foreach ($User->fetchAccountByID($_SESSION['UserID']) as $row) : ?>
                <div class="col-auto">
                    <span class="avatar avatar-lg rounded" style="background-image: url(https://eu.ui-avatars.com/api/?name=<?= $row['Username']; ?>)"></span>
                </div>
                <div class="col">
                    <h1 class="fw-bold"><?= $row['FullName']; ?></h1>
                    <div class="my-2"></div>
                    <div class="list-inline list-inline-dots text-muted">
                        <div class="list-inline-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                <path d="M3 7l9 6l9 -6" />
                            </svg>
                            <a href="mailto:<?= $row['Email']; ?>" class="text-reset"><?= $row['Email']; ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="card mt-5 rounded-5">
            <div class="card-body">
                <?php foreach ($User->fetchAccountByID($_GET['UserID']) as $row) : ?>
                    <form method="POST">

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="RoleName">Role</label>
                                    <input type="text" class="form-control" name="RoleName" id="RoleName" value="<?= $row['RoleName']; ?>" readonly disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="StatusName">Status</label>
                                    <input type="text" class="form-control" name="StatusName" id="StatusName" value="<?= $row['StatusName']; ?>" readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="FullName">Full Name</label>
                                    <input type="text" class="form-control" name="FullName" id="FullName" value="<?= $row['FullName']; ?>" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="Email">Email</label>
                                    <input type="email" class="form-control" name="Email" id="Email" value="<?= $row['Email']; ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="Username">Username</label>
                            <input type="text" class="form-control" name="Username" id="Username" value="<?= $row['Username']; ?>" readonly required>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="Password">Password</label>
                                    <div class="input-group input-group-flat">
                                        <input type="password" class="form-control" name="Password" id="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 characters or more" required>
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
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="ConfirmPassword">Confirm Password</label>
                                    <div class="input-group input-group-flat">
                                        <input type="password" class="form-control" name="ConfirmPassword" id="ConfirmPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 characters or more" required>
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
                            </div>
                        </div>

                        <small class="text-danger">
                            <ul>
                                <li>Password must contain at least one number and one uppercase and lowercase letter, and at least 8 characters or more</li>
                            </ul>
                        </small>

                        <div class="form-group">
                            <input type="hidden" class="form-control" name="UserID" id="UserID" value="<?= $row['UserID']; ?>" readonly required>
                            <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            <input type="hidden" class="form-control" name="UpdateBy" id="UpdateBy" value="<?= $_SESSION['Username']; ?>" readonly required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary rounded-5 w-100" onclick="updateUserByID();">Update</button>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php
require_once($WebRootPath . '/includes/component/Footer.php');
require_once($WebRootPath . '/includes/component/Script.php');
echo '<script src="2100.Profile.js"></script>';
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>