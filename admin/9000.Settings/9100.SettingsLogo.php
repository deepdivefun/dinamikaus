<?php
$Title          = 'Settings Logo';
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
                    Settings Logo
                </h2>
            </div>
        </div>

        <?php
        // Button trigger modal
        if (SYSAdmin()) {
            echo    '<button type="button" class="btn btn-outline-primary rounded-5" data-bs-toggle="modal" data-bs-target="#addSettingsLogo">
                        Create Settings Logo
                    </button>';
        } else {
            echo    'You do not have access rights to add settings logo';
            die();
        }

        // Add Modal
        if (SYSAdmin()) {
            echo    '<div class="modal fade" id="addSettingsLogo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="staticBackdropLabel">Add Settings</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data" autocomplete="off">

                                        <div class="form-group mb-3">
                                            <input type="hidden" class="form-control" name="StatusID" id="StatusID" value="1" readonly required>
                                            <label class="form-label" for="SettingsLogoName">Settings Logo Name</label>
                                            <input type="text" class="form-control" name="SettingsLogoName" id="SettingsLogoName" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label" for="SettingsLogoValue">Settings Value</label>
                                            <input type="file" class="form-control" name="SettingsLogoValue" id="SettingsLogoValue" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <img src="#" id="PreviewSettingsLogoValue" class="rounded mx-auto d-block w-50 h-50" alt="Preview Image">
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="CreateBy" id="CreateBy" value="' . $_SESSION['Username'] . '" readonly required>
                                            <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-outline-primary rounded-5" onclick="createSettingsLogo();">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';
        } else {
            echo    'You do not have access rights to add settings logo';
            die();
        }
        ?>

        <!-- Edit Modal -->
        <div class="modal fade" id="editSettingsLogo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="staticBackdropLabel">Edit Settings Logo`</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" autocomplete="off">

                            <div class="form-group mb-3">
                                <input type="hidden" class="form-control" name="EditStatusID" id="EditStatusID" value="1" readonly required>
                                <label class="form-label" for="EditSettingsLogoName">Settings Name</label>
                                <input type="text" class="form-control" name="EditSettingsLogoName" id="EditSettingsLogoName" readonly required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="EditSettingsLogoValue">Settings Value</label>
                                <input type="file" class="form-control" name="EditSettingsLogoValue" id="EditSettingsLogoValue">
                                <input type="hidden" class="form-control" name="EditSettingsLogoValueBeforeConvert" id="EditSettingsLogoValueBeforeConvert" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <img src="#" id="PreviewEditSettingsLogoValue" class="rounded mx-auto d-block w-50 h-50" alt="Preview Image">
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="EditSettingsLogoID" id="EditSettingsLogoID" readonly required>
                                <input type="hidden" class="form-control" name="UpdateBy" id="UpdateBy" value="<?= $_SESSION['Username']; ?>" readonly required>
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-primary rounded-5" onclick="updateSettingsLogo();">Save</button>
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
                                        <label class="form-label" for="FilterSettingsLogoName">Settings Logo Name</label>
                                        <input type="text" class="form-control" name="FilterSettingsLogoName" id="FilterSettingsLogoName">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-info w-100 rounded-5" onclick="showButtonSettingsLogoData();">Show Data</button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Settings Logo Name</th>
                                        <th>Settings Logo Value</th>
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
echo '<script src="9100.SettingsLogo.js"></script>';
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>