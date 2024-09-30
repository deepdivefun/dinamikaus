<?php
function ShortcutUser()
{
    if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3) {
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
    };
}

function ShortcutTeam()
{
    return '<div class="col-sm-6 col-lg-3">
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

function ShortcutProduct()
{
    return '<div class="col-sm-6 col-lg-3">
                <a href="' . WebRootPath() . '">
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

function ShortcutProductCategory()
{
    return '<div class="col-sm-6 col-lg-3">
                <a href="' . WebRootPath() . '">
                    <div class="card card-sm rounded-5">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="btn btn-outline-primary avatar rounded-5"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                        <i class="fa-solid fa-box"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="fw-bold text-wrap">
                                        Product Categpry
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>';
}

function ShortcutTestimonials()
{
    if ($_SESSION['RoleID'] !== 4) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '">
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
                                            Testimonials
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    };
}

function ShortcutMessages()
{
    return '<div class="col-sm-6 col-lg-3">
                <a href="' . WebRootPath() . '">
                    <div class="card card-sm rounded-5">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="btn btn-outline-primary avatar rounded-5">
                                        <i class="fa-solid fa-message"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="fw-bold text-wrap">
                                        Message
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>';
}

function ShortcutEventLog()
{
    if ($_SESSION['RoleID'] !== 4) {
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
    };
}

function ShortcutDebutTools()
{
    if ($_SESSION['RoleID'] !== 4) {
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

function ShortcutResetPasswordTools()
{
    if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 1) {
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
    };
}

function ShortcutSettings()
{
    if ($_SESSION['RoleID'] !== 4) {
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
                                            Settings
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    };
}


function ShortcutMetaTagSEO()
{
    if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 1) {
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
                                            Meta Tag SEO Tools
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    };
}

function ShortcutTheHistory()
{
    if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 1) {
        echo    '';
    } else {
        echo    '<div class="col-sm-6 col-lg-3">
                    <a href="' . WebRootPath() . '17000.TheHistory/17000.TheHistory.php">
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
                                            The History
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
    };
}