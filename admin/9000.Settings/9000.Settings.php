<?php
$Title          = 'Settings Application';
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
require_once($WebRootPath . '/includes/class/StatusClass.php');
$Status         = new Status();

if (!SYSAdmin() and !AppAdmin()) {
    echo    "You don't have access rights to this page";
    die();
}
?>

<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <h2 class="page-title mb-3">
                    Settings
                </h2>
            </div>
        </div>

        <?php
        // Button trigger modal
        if (SYSAdmin()) {
            echo    '<button type="button" class="btn btn-outline-primary rounded-5" data-bs-toggle="modal" data-bs-target="#addSettings">
                        Create Settings
                    </button>';
        } else {
            echo    'You do not have access rights to add settings';
            die();
        }

        // Add Modal
        if (SYSAdmin()) {
            echo    '<div class="modal fade" id="addSettings" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="staticBackdropLabel">Add Settings</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" autocomplete="off">

                                        <div class="form-group mb-3">
                                            <input type="hidden" class="form-control" name="StatusID" id="StatusID" value="1" readonly required>
                                            <label class="form-label" for="SettingsName">Settings Name</label>
                                            <input type="text" class="form-control" name="SettingsName" id="SettingsName" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label" for="SettingsValue">Settings Value</label>
                                            <textarea class="form-control" name="SettingsValue" id="SettingsValue" rows="8"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="CreateBy" id="CreateBy" value="' . $_SESSION['Username'] . '" readonly required>
                                            <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-outline-primary rounded-5" onclick="createSettings();">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';
        } else {
            echo    'You do not have access rights to add settings';
            die();
        }
        ?>

        <!-- Edit Modal -->
        <div class="modal fade" id="editSettings" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="staticBackdropLabel">Edit Settings</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" autocomplete="off">

                            <div class="form-group mb-3">
                                <input type="hidden" class="form-control" name="EditStatusID" id="EditStatusID" value="1" readonly required>
                                <label class="form-label" for="EditSettingsName">Settings Name</label>
                                <input type="text" class="form-control" name="EditSettingsName" id="EditSettingsName" readonly required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="EditSettingsValue">Settings Value</label>
                                <textarea class="form-control" name="EditSettingsValue" id="EditSettingsValue" rows="8"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="EditSettingsID" id="EditSettingsID" readonly required>
                                <input type="hidden" class="form-control" name="UpdateBy" id="UpdateBy" value="<?= $_SESSION['Username']; ?>" readonly required>
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-primary rounded-5" onclick="updateSettings();">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="card shadow-lg rounded-5">
                    <div class="card-body">
                        <form method="POST" autocomplete="off">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <input type="hidden" class="form-control" name="FilterStatusID" id="FilterStatusID" value="1" readonly required>
                                        <label class="form-label" for="FilterSettingsName">Settings Name</label>
                                        <input type="text" class="form-control" name="FilterSettingsName" id="FilterSettingsName">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-info w-100 rounded-5" onclick="showButtonSettingsData();">Show Data</button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Settings Name</th>
                                        <th>Settings Value</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
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
echo '<script src="9000.Settings.js"></script>';
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>