<?php
$Title = 'Message';
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
require_once($WebRootPath . '/includes/class/MessageClass.php');
$Message = new Message();

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
                    Message
                </h2>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editMessage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="staticBackdropLabel">Message</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" autocomplete="off">

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="FullName">Full Name</label>
                                        <input type="text" class="form-control" name="FullName" id="FullName" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="Email">Email</label>
                                        <input type="text" class="form-control" name="Email" id="Email" readonly disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="CompanyName">Whatsapp Number</label>
                                        <input type="number" class="form-control" name="WhatsappNumber" id="WhatsappNumber" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="PhoneNumber">Phone Number</label>
                                        <input type="number" class="form-control" name="PhoneNumber" id="PhoneNumber" readonly disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="CompanyName">Company Name</label>
                                        <input type="text" class="form-control" name="CompanyName" id="CompanyName" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="MessageSubject">Message Subject</label>
                                        <input type="text" class="form-control" name="MessageSubject" id="MessageSubject" readonly disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="MessageContents">Message Contents</label>
                                <textarea class="form-control" name="MessageContents" id="MessageContents" rows="8" readonly disabled></textarea>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="StatusMessageID">Status Message</label>
                                        <select class="form-control form-select" name="StatusMessageID" id="StatusMessageID" required>
                                            <?php foreach ($Message->fetchStatusMessage() as $row) : ?>
                                                <option value="<?= $row['StatusMessageID']; ?>"><?= $row['StatusMessage']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="CreateTime">Date & Time</label>
                                        <input type="text" class="form-control" name="CreateTime" id="CreateTime" readonly disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="MessageID" id="MessageID" readonly required>
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                                <input type="hidden" class="form-control" name="UpdateBy" id="UpdateBy" value="<?= $_SESSION['Username']; ?>" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-primary rounded-5" onclick="updateMessage();">Save</button>
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
                                        <label class="form-label" for="FilterStatusMessageID">Status Message</label>
                                        <select class="form-control form-select" name="FilterStatusMessageID" id="FilterStatusMessageID">
                                            <?php foreach ($Message->fetchStatusMessage() as $row) : ?>
                                                <option value="<?= $row['StatusMessageID']; ?>"><?= $row['StatusMessage']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="FilterFullName">Full Name</label>
                                        <input type="text" class="form-control" name="FilterFullName" id="FilterFullName">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="FilterEmail">Email</label>
                                        <input type="email" class="form-control" name="FilterEmail" id="FilterEmail">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="FilterCompanyName">Company Name</label>
                                        <input type="text" class="form-control" name="FilterCompanyName" id="FilterCompanyName">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-info w-100 rounded-5" onclick="showButtonMessageData();">Show Data</button>
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
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Company Name</th>
                                        <th>Phone Number</th>
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
echo '<script src="6000.Message.js"></script>';
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>