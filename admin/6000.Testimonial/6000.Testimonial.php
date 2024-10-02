<?php
$Title = 'Testimonial';
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
require_once($WebRootPath . '/includes/class/StatusTestimonialClass.php');
$TestimonialStatus = new StatusTestimonial();

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
                    Testimonial
                </h2>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary rounded-5" data-bs-toggle="modal" data-bs-target="#addTestimonial">
            Create Testimonial
        </button>

        <!-- Add Modal -->
        <div class="modal fade" id="addTestimonial" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="staticBackdropLabel">Add Testimonial</h1>
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

        <!-- Review Modal -->
        <div class="modal fade" id="reviewTestimonial" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="staticBackdropLabel">Review Testimonial</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="ReadFullName">Full Name</label>
                                    <input type="text" class="form-control" name="ReadFullName" id="ReadFullName" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="ReadCompany">Company</label>
                                    <input type="text" class="form-control" name="ReadCompany" id="ReadCompany" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="ReadTestimonialDescription">Testimonial Description</label>
                            <textarea class="form-control" name="ReadTestimonialDescription" id="ReadTestimonialDescription" rows="8" readonly></textarea>
                        </div>

                        <div class="form-group">
                            <input type="hidden" class="form-control" name="ReadTestimonialID" id="ReadTestimonialID" readonly>
                            <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger rounded-5" data-bs-dismiss="modal">Close</button>
                        </div>
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
                                        <label class="form-label" for="FilterTestimonialStatusID">Status Testimonials</label>
                                        <select class="form-control form-select" name="FilterTestimonialStatusID" id="FilterTestimonialStatusID">
                                            <?php foreach ($TestimonialStatus->fetchStatusTestimonial() as $row) : ?>
                                                <option value="<?= $row['TestimonialStatusID']; ?>"><?= $row['TestimonialStatusName']; ?></option>
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
                <div class="card shadow-lg rounded-5">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Company</th>
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
echo '<script src="6000.Testimonial.js"></script>';
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>