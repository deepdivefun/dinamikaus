<?php

function Home()
{
    return '<a class="nav-link" href=' . WebRootPath() . '1000.Home/1000.Home.php>
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <i class="fa-solid fa-house"></i>
                </span>
                <span class="nav-link-title">
                    Home
                </span>
            </a>';
}

function Management()
{
    if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3 and $_SESSION['RoleID'] !== 2) {
        echo '';
    } else {
        echo '<a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <i class="fa-solid fa-users"></i>
                </span>
                <span class="nav-link-title">
                    Management
                </span>
            </a>';
    };
}

function User()
{
    if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3) {
        echo    '';
    } else {
        echo    '<a class="dropdown-item" href="' . WebRootPath() . '2000.Account/2000.User.php">
                    User
                </a>';
    }
}

function Team()
{
    if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3 and $_SESSION['RoleID'] !== 2) {
        echo    '';
    } else {
        echo    '<a class="dropdown-item" href="' . WebRootPath() . '3000.Team/3000.Team.php">
                    Team
                </a>';
    }
}


function ProductManagement()
{
    if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3 and $_SESSION['RoleID'] !== 2 and $_SESSION['RoleID'] !== 1) {
        echo    '';
    } else {
        echo    '<a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <i class="fa-solid fa-box"></i>
                    </span>
                    <span class="nav-link-title">
                        Product Management
                    </span>
                </a>';
    }
}

function ProductCategory()
{
    if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3 and $_SESSION['RoleID'] !== 2 and $_SESSION['RoleID'] !== 1) {
        echo    '';
    } else {
        echo    '<a class=" dropdown-item" href="' . WebRootPath() . '4000.ProductCategory/4000.ProductCategory.php">
                    Product Category
                </a>';
    }
}

function Product()
{
    if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3 and $_SESSION['RoleID'] !== 2 and $_SESSION['RoleID'] !== 1) {
        echo    '';
    } else {
        echo    '<a class=" dropdown-item" href="' . WebRootPath() . '5000.Product/5000.Product.php">
                    Product
                </a>';
    }
}

function Testimonial()
{
    if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3) {
        echo    '';
    } else {
        echo    '<a class="nav-link" href="' . WebRootPath() . '6000.Testimonial/6000.Testimonial.php">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <i class="fas fa-star"></i>
                    </span>
                    <span class="nav-link-title">
                        Testimonial
                    </span>
                </a>';
    };
}

function Messages()
{
    if ($_SESSION['RoleID'] !== 4) {
        echo    '';
    } else {
        echo    '<a class="nav-link" href="' . WebRootPath() . '">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <i class="fa-solid fa-message"></i>
                    </span>
                    <span class="nav-link-title">
                        Messages
                    </span>
                </a>';
    }
}

function Tools()
{
    if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3) {
        echo '';
    } else {
        echo    '<a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <i class="fa-solid fa-gear"></i>
                    </span>
                    <span class="nav-link-title">
                        Tools
                    </span>
                </a>';
    }
}

function EventLog()
{
    if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3) {
        echo    '';
    } else {
        echo    '<a class="dropdown-item" href="' . WebRootPath() . '15000.EventLog/15000.EventLog.php">
                    Event Log
                </a>';
    }
}

function DebugTools()
{
    if ($_SESSION['RoleID'] !== 4) {
        echo    '';
    } else {
        echo    '<a class="dropdown-item" href="' . WebRootPath() . '14000.DebugTools/14000.DebugTools.php">
                    Debug Tools
                </a>';
    }
}

function ResetPasswordTools()
{
    if ($_SESSION['RoleID'] !== 4 and $_SESSION['RoleID'] !== 3) {
        echo    '';
    } else {
        echo    '<a class="dropdown-item" href="' . WebRootPath() . '14000.DebugTools/14100.DebugToolsResetPassword.php">
                    Reset Password Tools
                </a>';
    }
}

function Settings()
{
    if ($_SESSION['RoleID'] !== 4) {
        echo    '';
    } else {
        echo    '<a class="dropdown-item" href="' . WebRootPath() . '9000.Settings/9000.Settings.php">
                    Settings
                </a>';
    };
}

function MetaTag()
{
    if ($_SESSION['RoleID'] !== 4) {
        echo    '';
    } else {
        echo    '<a class="dropdown-item" href="' . WebRootPath() . '13000.Meta/13000.Meta.php">
                    Meta Tag
                </a>';
    }
}
