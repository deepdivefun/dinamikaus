<?php
$Title              = 'Product';
$WebRootPath        = realpath('../');

require_once($WebRootPath . '/includes/class/ErrorHandlingFunction.php');
set_error_handler('errorHandling');
require_once($WebRootPath . '/includes/helpers/WebRootPath.php');
require_once($WebRootPath . '/includes/helpers/Session.php');
require_once($WebRootPath . '/includes/class/SessionManagementClass.php');
require_once($WebRootPath . '/includes/component/HeaderCSP.php');
require_once($WebRootPath . '/includes/component/Header.php');
require_once($WebRootPath . '/includes/class/AccountClass.php');
$User               = new Account();
require_once($WebRootPath . '/includes/component/Topbar.php');
require_once($WebRootPath . '/includes/class/NavbarFunction.php');
require_once($WebRootPath . '/includes/component/Navbar.php');
require_once($WebRootPath . '/includes/class/StatusClass.php');
$Status             = new Status();
require_once($WebRootPath . '/includes/class/ProductCategoryClass.php');
$ProductCategory    = new ProductCategory();
require_once($WebRootPath . '/includes/class/ProductBrandClass.php');
$ProductBrand       = new ProductBrand();

if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
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
                    Product
                </h2>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary rounded-5" data-bs-toggle="modal" data-bs-target="#addProduct">
            Create Product
        </button>

        <a href="5060.ProductDownload.php"><button class="btn btn-outline-primary rounded-5">Download Data Product</button></a>

        <button type="button" class="btn btn-outline-primary rounded-5" data-bs-toggle="modal" data-bs-target="#uploadDataProduct">
            Upload Data Product
        </button>

        <!-- Upload Data User Modal -->
        <div class="modal fade" id="uploadDataProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="staticBackdropLabel">Upload Data Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group mb-3">
                                <label class="form-label" for="UploadDataProduct">Upload Data Product</label>
                                <input type="file" class="form-control" name="UploadDataProduct" id="UploadDataProduct" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, .csv">
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="UpdateBy" id="UpdateBy" value="<?= $_SESSION["Username"]; ?>" readonly required>
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-outline-primary rounded-5" onclick="uploadDataProduct();">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Modal -->
        <div class="modal fade" id="addProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="staticBackdropLabel">Add Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label class="form-label" for="ProductCategoryID">Product Category</label>
                                <select class="form-control form-select" name="ProductCategoryID" id="ProductCategoryID" required>
                                    <option disabled selected value>Select Product Category</option>
                                    <?php foreach ($ProductCategory->fetchProductCategory() as $row) : ?>
                                        <option value="<?= $row['ProductCategoryID']; ?>"><?= $row['ProductCategoryName']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="ProductBrandID">Product Brand Name</label>
                                <select class="form-control form-select" name="ProductBrandID" id="ProductBrandID" required>
                                    <option disabled selected value>Select Product Brand Name</option>
                                    <?php foreach ($ProductBrand->fetchProductBrand() as $row) : ?>
                                        <option value="<?= $row['ProductBrandID']; ?>"><?= $row['ProductBrandName']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

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
                                        <label class="form-label" for="ProductName">Product Name</label>
                                        <input type="text" class="form-control" name="ProductName" id="ProductName" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="ProductPrice">Product Price</label>
                                        <input type="number" class="form-control" name="ProductPrice" id="ProductPrice">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="ProductDescription">Product Description</label>
                                <textarea class="form-control" name="ProductDescription" id="ProductDescription" rows="8" required></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="ProductPhoto">Product Photo</label>
                                <input type="file" class="form-control" name="ProductPhoto" id="ProductPhoto" accept="image/png, image/jpeg, image/jpg, image/webp">
                            </div>

                            <div class="form-group mb-3">
                                <img src="#" id="PreviewProductPhoto" class="rounded mx-auto d-block w-50 h-50" alt="Preview Image">
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="CreateBy" id="CreateBy" value="<?= $_SESSION['Username']; ?>" readonly required>
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-outline-primary rounded-5" onclick="createProduct();">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="staticBackdropLabel">Edit Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label class="form-label" for="EditProductCategoryID">Product Category</label>
                                <select class="form-control form-select" name="EditProductCategoryID" id="EditProductCategoryID" required>
                                    <?php foreach ($ProductCategory->fetchProductCategory() as $row) : ?>
                                        <option value="<?= $row['ProductCategoryID']; ?>"><?= $row['ProductCategoryName']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="EditProductBrandID">Product Brand Name</label>
                                <select class="form-control form-select" name="EditProductBrandID" id="EditProductBrandID" required>
                                    <?php foreach ($ProductBrand->fetchProductBrand() as $row) : ?>
                                        <option value="<?= $row['ProductBrandID']; ?>"><?= $row['ProductBrandName']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

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
                                        <label class="form-label" for="EditProductName">Product Name</label>
                                        <input type="text" class="form-control" name="EditProductName" id="EditProductName" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="EditProductPrice">Product Price</label>
                                        <input type="number" class="form-control" name="EditProductPrice" id="EditProductPrice">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="EditProductDescription">Product Description</label>
                                <textarea class="form-control" name="EditProductDescription" id="EditProductDescription" rows="8" required></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="EditProductPhoto">Product Photo</label>
                                <input type="file" class="form-control" name="EditProductPhoto" id="EditProductPhoto" accept="image/png, image/jpeg, image/jpg, image/webp">
                                <input type="hidden" class="form-control" name="EditProductPhotoBeforeConvert" id="EditProductPhotoBeforeConvert" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <img src="#" id="PreviewEditProductPhoto" class="rounded mx-auto d-block w-50 h-50" alt="Preview Image">
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="EditProductID" id="EditProductID" readonly required>
                                <input type="hidden" class="form-control" name="UpdateBy" id="UpdateBy" value="<?= $_SESSION['Username']; ?>" readonly required>
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger rounded-5" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-outline-primary rounded-5" onclick="updateProduct();">Save</button>
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
                        <p><b>Information&nbsp;:</b></p>
                        <small class="text-danger">
                            <ul>
                                <li><b>Photo canvas size must be 500 x 500 pixels</b></li>
                                <li><b>Use tag < br> if you want the text to go down. (< br> Without spaces)</b></li>
                            </ul>
                        </small>
                        <hr>
                        <form method="POST">
                            <div class="form-group mb-3">
                                <label class="form-label" for="FilterStatusID">Status</label>
                                <select class="form-control form-select" name="FilterStatusID" id="FilterStatusID">
                                    <?php foreach ($Status->fetchStatus() as $row) : ?>
                                        <option value="<?= $row['StatusID']; ?>"><?= $row['StatusName']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="FilterProductCategoryID">Product Category</label>
                                        <select class="form-control form-select" name="FilterProductCategoryID" id="FilterProductCategoryID">
                                            <?php foreach ($ProductCategory->fetchProductCategory() as $row) : ?>
                                                <option value="<?= $row['ProductCategoryID']; ?>"><?= $row['ProductCategoryName']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="FilterProductBrandID">Product Brand Name</label>
                                        <select class="form-control form-select" name="FilterProductBrandID" id="FilterProductBrandID">
                                            <?php foreach ($ProductBrand->fetchProductBrand() as $row) : ?>
                                                <option value="<?= $row['ProductBrandID']; ?>"><?= $row['ProductBrandName']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="FilterProductName">Product Name</label>
                                <input type="text" class="form-control" name="FilterProductName" id="FilterProductName">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="GToken" id="GToken" readonly required>
                            </div>
                            <div class="modal-footer mb-3">
                                <button type="button" class="btn btn-outline-info w-100 rounded-5" onclick="showButtonProductData();">Show Data</button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Category Name</th>
                                        <th>Product Brand Name</th>
                                        <th>Product Photo</th>
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
echo '<script src="5000.Product.js"></script>';
require_once($WebRootPath . '/includes/component/EndFooter.php');
?>