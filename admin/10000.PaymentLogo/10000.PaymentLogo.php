<?php
$Title          = 'Contact';
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
                    Payment Logo
                </h2>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary rounded-5" data-bs-toggle="modal" data-bs-target="#addPaymentLogo">
            Create Payment Logo
        </button>

        <!-- Add Modal -->
        <div class="modal fade" id="addPaymentLogo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="staticBackdropLabel">Add Payment Logo</h1>
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

                            <div class="form-group mb-3">
                                <label class="form-label" for="PaymentName">Payment Name</label>
                                <input type="text" class="form-control" name="PaymentName" id="PaymentName" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="PaymentPhoto">Payment Photo</label>
                                <input type="file" class="form-control" name="PaymentPhoto" id="PaymentPhoto" accept="image/png, image/jpeg, image/jpg, image/webp" required>
                            </div>

                            <small class="text-danger">
                                <ul>
                                    <li>Photo size must be 300 x 150 pixels</li>
                                </ul>
                            </small>

                            <div class="form-group mb-3">
                                <img src="#" id="PreviewPaymentPhoto" class="rounded mx-auto d-block w-50 h-50" alt="Preview Image">
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="CreateBy" id="CreateBy" value="<?= $_SESSION['Username']; ?>" readonly required>
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-outline-primary rounded-5" onclick="createPaymentLogo();">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editPaymentLogo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="staticBackdropLabel">Edit Payment Logo</h1>
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

                            <div class="form-group mb-3">
                                <label class="form-label" for="EditContactNameArea">Name Area</label>
                                <input type="text" class="form-control" name="EditContactNameArea" id="EditContactNameArea" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="EditContactAddress">Address</label>
                                <textarea class="form-control" name="EditContactAddress" id="EditContactAddress" rows="8"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="EditContactLinkGmaps">Link Gmaps</label>
                                <input type="text" class="form-control" name="EditContactLinkGmaps" id="EditContactLinkGmaps">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="EditContactNumber">Contact Number</label>
                                <input type="number" class="form-control" name="EditContactNumber" id="EditContactNumber" maxlength="13">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="EditContactEmail">Contact Email</label>
                                <input type="email" class="form-control" name="EditContactEmail" id="EditContactEmail" required>
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="EditContactID" id="EditContactID" readonly required>
                                <input type="hidden" class="form-control" name="UpdateBy" id="UpdateBy" value="<?= $_SESSION['Username']; ?>" readonly required>
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-outline-primary rounded-5" onclick="updateContact();">Save</button>
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
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="FilterStatusID">Status</label>
                                        <select class="form-control form-select" name="FilterStatusID" id="FilterStatusID" required>
                                            <?php foreach ($Status->fetchStatus() as $row) : ?>
                                                <option value="<?= $row['StatusID']; ?>"><?= $row['StatusName']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="FilterPaymentName">Payment Name</label>
                                            <input type="text" class="form-control" name="FilterPaymentName" id="FilterPaymentName">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>
                            <div class="modal-footer mb-3">
                                <button type="button" class="btn btn-outline-info w-100 rounded-5" onclick="showButtonPaymentLogoData();">Show Data</button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Payment Name</th>
                                        <th>Payment Photo</th>
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
echo '<script src="10000.PaymentLogo.js"></script>';
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>