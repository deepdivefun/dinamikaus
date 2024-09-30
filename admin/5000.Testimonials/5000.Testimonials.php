<?php
$Title = 'Testimonials';
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
                    Testimonials
                </h2>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary rounded-5" data-bs-toggle="modal" data-bs-target="#addTestimonials">
            Create Testimonials
        </button>

        <!-- Add Modal -->
        <div class="modal fade" id="addTestimonials" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="staticBackdropLabel">Add Testimonials</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">

                            <div class="form-group mb-3">
                                <label class="form-label" for="FullName">Full Name</label>
                                <input type="text" class="form-control" name="FullName" id="FullName" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="Testimonials">Testimonials</label>
                                <textarea class="form-control" name="Testimonials" id="Testimonials" rows="8" required></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="TestimonialsRatings">Ratings</label>
                                <input type="number" class="form-control" name="TestimonialsRatings" id="TestimonialsRatings" min="1" max="5" maxlength="1" required>
                            </div>

                            <small class="text-danger">
                                <ul>
                                    <li>Give a rating using numbers 1 - 5</li>
                                </ul>
                            </small>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                                <input type="hidden" class="form-control" name="CreateBy" id="CreateBy" value="<?= $_SESSION['Username']; ?>" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-primary rounded-5" onclick="createTestimonials();">Save</button>
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
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="FilterStatusID">Status Testimonials</label>
                                        <select class="form-control form-select" name="FilterStatusID" id="FilterStatusID">
                                            <?php foreach ($Status->fetchStatus() as $row) : ?>
                                                <option value="<?= $row['StatusID']; ?>"><?= $row['Status']; ?></option>
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

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-info w-100 rounded-5" onclick="showButtonTestimonialsData();">Show Data</button>
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
                                        <th>Testimonials</th>
                                        <th>Testimonials Ratings</th>
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
echo '<script src="5000.Testimonials.js"></script>';
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>