<?php
$Title          = 'Team';
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

if (!SYSAdmin() and !AppAdmin() and !Admin()) {
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
                    Team
                </h2>
            </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary rounded-5" data-bs-toggle="modal" data-bs-target="#addTeam">
            Create Team
        </button>

        <!-- Add Modal -->
        <div class="modal fade" id="addTeam" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="staticBackdropLabel">Add Team</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data">

                            <div class="form-group mb-3">
                                <label class="form-label" for="StatusID">Status</label>
                                <select class="form-control form-select" name="StatusID" id="StatusID" required>
                                    <option disabled selected value>Select Status</option>
                                    <?php foreach ($Status->fetchStatus() as $row) : ?>
                                        <option value="<?= $row['StatusID']; ?>"><?= $row['StatusName']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="FullName">Full Name</label>
                                        <input type="text" class="form-control" name="FullName" id="FullName" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="Position">Position</label>
                                        <input type="text" class="form-control" name="Position" id="Position" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="Linkedin">Linkedin</label>
                                        <input type="url" class="form-control" name="Linkedin" id="Linkedin">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="Instagram">Instagram</label>
                                        <input type="url" class="form-control" name="Instagram" id="Instagram">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="TeamPhoto">Team Photo</label>
                                <input type="file" class="form-control" name="TeamPhoto" id="TeamPhoto" accept="image/png, image/jpeg, image/jpg, image/webp" required>
                            </div>

                            <small class="text-danger">
                                <ul>
                                    <li>Photo size must be 500 x 400 pixels</li>
                                </ul>
                            </small>

                            <div class="form-group mb-3">
                                <img src="#" id="PreviewTeamPhoto" class="rounded mx-auto d-block w-50 h-50" alt="Preview Image">
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="CreateBy" id="CreateBy" value="<?= $_SESSION['Username']; ?>" readonly required>
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-outline-primary rounded-5" onclick="createTeam();">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editTeam" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="staticBackdropLabel">Edit Team</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data">

                            <div class="form-group mb-3">
                                <label class="form-label" for="EditStatusID">Status</label>
                                <select class="form-control form-select" name="EditStatusID" id="EditStatusID" required>
                                    <?php foreach ($Status->fetchStatus() as $row) : ?>
                                        <option value="<?= $row['StatusID']; ?>"><?= $row['StatusName']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="EditFullName">Full Name</label>
                                        <input type="text" class="form-control" name="EditFullName" id="EditFullName" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="EditPosition">Position</label>
                                        <input type="text" class="form-control" name="EditPosition" id="EditPosition" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="EditLinkedin">Linkedin</label>
                                        <input type="url" class="form-control" name="EditLinkedin" id="EditLinkedin">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="EditInstagram">Instagram</label>
                                        <input type="url" class="form-control" name="EditInstagram" id="EditInstagram">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="EditTeamPhoto">Team Photo</label>
                                <input type="file" class="form-control" name="EditTeamPhoto" id="EditTeamPhoto" accept="image/png, image/jpeg, image/jpg, image/webp" required>
                                <input type="hidden" class="form-control" name="EditTeamPhotoBeforeConvert" id="EditTeamPhotoBeforeConvert" readonly required>
                            </div>

                            <small class="text-danger">
                                <ul>
                                    <li>Photo size must be 500 x 400 pixels</li>
                                    <li>If you edit the data, re-enter the image.</li>
                                </ul>
                            </small>

                            <div class="form-group mb-3">
                                <img src="#" id="PreviewEditTeamPhoto" class="rounded mx-auto d-block w-50 h-50" alt="Preview Image">
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="EditTeamID" id="EditTeamID" readonly required>
                                <input type="hidden" class="form-control" name="UpdateBy" id="UpdateBy" value="<?= $_SESSION['Username']; ?>" readonly required>
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-outline-primary rounded-5" onclick="updateTeam();">Save</button>
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
                        <form method="POST">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="FilterStatusID">Status</label>
                                        <select class="form-control form-select" name="FilterStatusID" id="FilterStatusID">
                                            <?php foreach ($Status->fetchStatus() as $row) : ?>
                                                <option value="<?= $row['StatusID']; ?>"><?= $row['StatusName']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="FillterFullName">Full Name</label>
                                        <input type="text" class="form-control" name="FillterFullName" id="FillterFullName">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="FilterPosition">Position</label>
                                        <input type="text" class="form-control" name="FilterPosition" id="FilterPosition">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>
                            <div class="modal-footer mb-3">
                                <button type="button" class="btn btn-outline-info w-100 rounded-5" onclick="showButtonTeamData();">Show Data</button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Position</th>
                                        <th>Photo</th>
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
echo '<script src="3000.Team.js"></script>';
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>