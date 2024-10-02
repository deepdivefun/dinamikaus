<?php
$Title = 'Meta';
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

if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3) {
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
                    Meta
                </h2>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary rounded-5" data-bs-toggle="modal" data-bs-target="#addMeta">
            Create Meta
        </button>

        <!-- Add Modal -->
        <div class="modal fade" id="addMeta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="staticBackdropLabel">Add Meta</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group mb-3">
                                <label class="form-label" for="StatusID">Status</label>
                                <select class="form-control form-select" name="StatusID" id="StatusID" required>
                                    <option disabled selected value>Select Status</option>
                                    <?php foreach ($Status->fetchStatus() as $row) : ?>
                                        <option value="<?= $row['StatusID']; ?>"><?= $row['StatusName']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="Name">Name</label>
                                <textarea class="form-control" name="Name" id="Name" rows="8"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="Content">Content</label>
                                <textarea class="form-control" name="Content" id="Content" rows="8"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                                <input type="hidden" class="form-control" name="CreateBy" id="CreateBy" value="<?= $_SESSION['Username']; ?>" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-outline-primary rounded-5" onclick="createMeta();">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editMeta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="staticBackdropLabel">Edit Services Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group mb-3">
                                <label class="form-label" for="EditStatusID">Status</label>
                                <select class="form-control form-select" name="EditStatusID" id="EditStatusID" required>
                                    <?php foreach ($Status->fetchStatus() as $row) : ?>
                                        <option value="<?= $row['StatusID']; ?>"><?= $row['StatusName']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="EditName">Name</label>
                                <textarea class="form-control" name="EditName" id="EditName" rows="8"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="EditContent">Content</label>
                                <textarea class="form-control" name="EditContent" id="EditContent" rows="8"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="EditMetaID" id="EditMetaID" readonly required>
                                <input type="hidden" class="form-control" name="UpdateBy" id="UpdateBy" value="<?= $_SESSION['Username']; ?>" readonly required>
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-outline-primary rounded-5" onclick="updateMeta();">Save</button>
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
                        <form method="POST">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="FilterStatusID">Status Meta</label>
                                        <select class="form-control form-select" name="FilterStatusID" id="FilterStatusID">
                                            <?php foreach ($Status->fetchStatus() as $row) : ?>
                                                <option value="<?= $row['StatusID']; ?>"><?= $row['StatusName']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="FilterName">Name</label>
                                        <input type="text" class="form-control" name="FilterName" id="FilterName">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="FilterContent">Content</label>
                                        <input type="text" class="form-control" name="FilterContent" id="FilterContent">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-info w-100 rounded-5" onclick="showButtonMetaData();">Show Data</button>
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
                                        <th>Name</th>
                                        <th>Content</th>
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
echo '<script src="13000.Meta.js"></script>';
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>