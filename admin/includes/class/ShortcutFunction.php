<?php
function ShortcutUser()
{
    if (!SYSAdmin() and !AppAdmin()) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '2000.Account/2000.User.php">
                        <div class="card card-sm rounded-5">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="btn btn-outline-primary avatar rounded-5">
                                            <i class="fa-solid fa-users"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold text-wrap text-wrap">
                                            User
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    }
}

function ShortcutTeam()
{
    if (!SYSAdmin() and !AppAdmin() and !Admin()) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '3000.Team/3000.Team.php">
                        <div class="card card-sm rounded-5">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="btn btn-outline-primary avatar rounded-5">
                                            <i class="fa-solid fa-users"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold text-wrap">
                                            Team
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    }
}

function ShortcutOurClient()
{
    if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '7000.OurClient/7000.OurClient.php">
                        <div class="card card-sm rounded-5">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="btn btn-outline-primary avatar rounded-5">
                                            <i class="fa-solid fa-users"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold text-wrap">
                                            Our Client
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    }
}

function ShortcutProductCategory()
{
    if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '4000.ProductCategory/4000.ProductCategory.php">
                        <div class="card card-sm rounded-5">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="btn btn-outline-primary avatar rounded-5">
                                            <i class="fa-solid fa-box"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold text-wrap">
                                            Product Category
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    }
}

function ShortcutProductBrand()
{
    if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '16000.ProductBrand/16000.ProductBrand.php">
                        <div class="card card-sm rounded-5">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="btn btn-outline-primary avatar rounded-5">
                                            <i class="fa-solid fa-box"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold text-wrap">
                                            Product Brand
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    }
}

function ShortcutProduct()
{
    if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '5000.Product/5000.Product.php">
                        <div class="card card-sm rounded-5">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="btn btn-outline-primary avatar rounded-5">
                                            <i class="fa-solid fa-box"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold text-wrap">
                                            Product
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    }
}

function ShortcutTestimonial()
{
    if (!SYSAdmin() and !AppAdmin() and !Admin()) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '6000.Testimonial/6000.Testimonial.php">
                        <div class="card card-sm rounded-5">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="btn btn-outline-primary avatar rounded-5">
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold text-wrap">
                                            Testimonial
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    }
}

function ShortcutContact()
{
    if (!SYSAdmin() and !AppAdmin() and !Admin()) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '8000.Contact/8000.Contact.php">
                        <div class="card card-sm rounded-5">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="btn btn-outline-primary avatar rounded-5">
                                            <i class="fa-solid fa-gear"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold text-wrap">
                                            Contact
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    }
}

function ShortcutPaymentLogo()
{
    if (!SYSAdmin() and !AppAdmin() and !Admin()) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '10000.PaymentLogo/10000.PaymentLogo.php">
                        <div class="card card-sm rounded-5">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="btn btn-outline-primary avatar rounded-5">
                                            <i class="fa-solid fa-gear"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold text-wrap">
                                            Payment Logo
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    }
}

function ShortcutShippingLogo()
{
    if (!SYSAdmin() and !AppAdmin() and !Admin()) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '11000.ShippingLogo/11000.ShippingLogo.php">
                        <div class="card card-sm rounded-5">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="btn btn-outline-primary avatar rounded-5">
                                            <i class="fa-solid fa-gear"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold text-wrap">
                                            Shipping Logo
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    }
}

function ShortcutSettingsApplication()
{
    if (!SYSAdmin() and !AppAdmin()) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '9000.Settings/9000.Settings.php">
                        <div class="card card-sm rounded-5">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="btn btn-outline-primary avatar rounded-5">
                                            <i class="fa-solid fa-gear"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold text-wrap">
                                            Settings Application
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    };
}

function ShortcutSettingsLogo()
{
    if (!SYSAdmin() and !AppAdmin()) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '9000.Settings/9100.SettingsLogo.php">
                        <div class="card card-sm rounded-5">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="btn btn-outline-primary avatar rounded-5">
                                            <i class="fa-solid fa-gear"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold text-wrap">
                                            Settings Logo
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    };
}

function ShortcutEventLog()
{
    if (!SYSAdmin() and !AppAdmin()) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '15000.EventLog/15000.EventLog.php">
                        <div class="card card-sm rounded-5">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="btn btn-outline-primary avatar rounded-5">
                                            <i class="fa-solid fa-gear"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold text-wrap">
                                            Event Log
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    }
}

function ShortcutResetPasswordTools()
{
    if (!SYSAdmin() and !AppAdmin()) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '14000.DebugTools/14100.DebugToolsResetPassword.php">
                        <div class="card card-sm rounded-5">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="btn btn-outline-primary avatar rounded-5">
                                            <i class="fa-solid fa-gear"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold text-wrap">
                                            Reset Password Tools
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    }
}

function ShortcutMetaTag()
{
    if (!SYSAdmin() and !AppAdmin()) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '13000.Meta/13000.Meta.php">
                        <div class="card card-sm rounded-5">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="btn btn-outline-primary avatar rounded-5">
                                            <i class="fa-solid fa-gear"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold text-wrap">
                                            Meta Tag
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    };
}

function ShortcutDebutTools()
{
    if (!SYSAdmin()) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '14000.DebugTools/14000.DebugTools.php">
                        <div class="card card-sm rounded-5">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="btn btn-outline-primary avatar rounded-5">
                                            <i class="fa-solid fa-gear"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold text-wrap">
                                            Debug Tools
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    };
}
