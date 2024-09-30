<?php
$Title = 'Settings';
$WebRootPath = realpath('../');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/component/Header.php');
require_once($WebRootPath . '/includes/class/AccountClass.php');
$User = new Account();
require_once($WebRootPath . '/includes/component/Topbar.php');
require_once($WebRootPath . '/includes/class/NavbarFunction.php');
require_once($WebRootPath . '/includes/component/Navbar.php');
require_once($WebRootPath . '/includes/class/StatusClass.php');
$Status = new Status();

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
                <h2 class="page-title mb-3">
                    Settings
                </h2>
            </div>
        </div>

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
                                <label class="form-label" for="StatusID">Status Settings</label>
                                <select class="form-control form-select" name="StatusID" id="StatusID">
                                    <?php foreach ($Status->fetchStatus() as $row) : ?>
                                        <option value="<?= $row['StatusID']; ?>"><?= $row['Status']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="SettingsName">Settings Name</label>
                                <input type="text" class="form-control" name="SettingsName" id="SettingsName" readonly disabled>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="SettingsContents">Settings Contents</label>
                                <textarea class="form-control" name="SettingsContents" id="SettingsContents" rows="8"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="SettingsID" id="SettingsID" readonly required>
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                                <input type="hidden" class="form-control" name="UpdateBy" id="UpdateBy" value="<?= $_SESSION['Username']; ?>" readonly required>
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
                <div class="card rounded-5">
                    <div class="card-body">
                        <form method="POST" autocomplete="off">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="FilterStatusID">Status Settings</label>
                                        <select class="form-control form-select" name="FilterStatusID" id="FilterStatusID">
                                            <?php foreach ($Status->fetchStatus() as $row) : ?>
                                                <option value="<?= $row['StatusID']; ?>"><?= $row['Status']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
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
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card rounded-5">
                    <div class="card-body border-bottom py-3">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Settings Name</th>
                                        <th>Settings Contents</th>
                                        <th>Status</th>
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