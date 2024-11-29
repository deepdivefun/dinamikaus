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
                    Contact
                </h2>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary rounded-5" data-bs-toggle="modal" data-bs-target="#addContact">
            Create Contact
        </button>

        <!-- Add Modal -->
        <div class="modal fade" id="addContact" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="staticBackdropLabel">Add Contact</h1>
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
                                <label class="form-label" for="ContactNameArea">Name Area</label>
                                <input type="text" class="form-control" name="ContactNameArea" id="ContactNameArea" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="ContactAddress">Address</label>
                                <textarea class="form-control" name="ContactAddress" id="ContactAddress" rows="8"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="ContactLinkGmaps">Link Gmaps</label>
                                <input type="text" class="form-control" name="ContactLinkGmaps" id="ContactLinkGmaps">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="ContactNumber">Contact Number</label>
                                <input type="number" class="form-control" name="ContactNumber" id="ContactNumber" maxlength="13">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="ContactEmail">Contact Email</label>
                                <input type="email" class="form-control" name="ContactEmail" id="ContactEmail" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="ContactEmailAlternative">Contact Email Alternative</label>
                                <input type="email" class="form-control" name="ContactEmailAlternative" id="ContactEmailAlternative">
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="CreateBy" id="CreateBy" value="<?= $_SESSION['Username']; ?>" readonly required>
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-outline-primary rounded-5" onclick="createContact();">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editContact" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="staticBackdropLabel">Edit Contact</h1>
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

                            <div class="form-group mb-3">
                                <label class="form-label" for="EditContactEmailAlternative">Contact Email Alternative</label>
                                <input type="email" class="form-control" name="EditContactEmailAlternative" id="EditContactEmailAlternative">
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
                                            <label class="form-label" for="FilterContactNameArea">Name Area</label>
                                            <input type="text" class="form-control" name="FilterContactNameArea" id="FilterContactNameArea">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>
                            <div class="modal-footer mb-3">
                                <button type="button" class="btn btn-outline-info w-100 rounded-5" onclick="showButtonContacttData();">Show Data</button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Name Area</th>
                                        <th>Address</th>
                                        <th>Contact Number</th>
                                        <th>Contact Email</th>
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
echo '<script src="8000.Contact.js"></script>';
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>