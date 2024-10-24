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
    if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
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
    if (!SYSAdmin() and !AppAdmin()) {
        echo    '';
    } else {
        echo    '<a class="dropdown-item" href="' . WebRootPath() . '2000.Account/2000.User.php">
                    User
                </a>';
    }
}

function Team()
{
    if (!SYSAdmin() and !AppAdmin() and !Admin()) {
        echo    '';
    } else {
        echo    '<a class="dropdown-item" href="' . WebRootPath() . '3000.Team/3000.Team.php">
                    Team
                </a>';
    }
}

function OurClient()
{
    if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
        echo    '';
    } else {
        echo    '<a class="dropdown-item" href="' . WebRootPath() . '7000.OurClient/7000.OurClient.php">
                    Our Client
                </a>';
    }
}

function ProductManagement()
{
    if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
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
    if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
        echo    '';
    } else {
        echo    '<a class=" dropdown-item" href="' . WebRootPath() . '4000.ProductCategory/4000.ProductCategory.php">
                    Product Category
                </a>';
    }
}

function Product()
{
    if (!SYSAdmin() and !AppAdmin() and !Admin() and !Staff()) {
        echo    '';
    } else {
        echo    '<a class=" dropdown-item" href="' . WebRootPath() . '5000.Product/5000.Product.php">
                    Product
                </a>';
    }
}

function Testimonial()
{
    if (!SYSAdmin() and !AppAdmin() and !Admin()) {
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

function Tools()
{
    if (!SYSAdmin() and !AppAdmin() and !Admin()) {
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

function Contact()
{
    if (!SYSAdmin() and !AppAdmin() and !Admin()) {
        echo    '';
    } else {
        echo    '<a class="dropdown-item" href="' . WebRootPath() . '8000.Contact/8000.Contact.php">
                    Contact
                </a>';
    }
}

function PaymentLogo()
{
    if (!SYSAdmin() and !AppAdmin() and !Admin()) {
        echo    '';
    } else {
        echo    '<a class="dropdown-item" href="' . WebRootPath() . '10000.PaymentLogo/10000.PaymentLogo.php">
                    Payment Logo
                </a>';
    }
}

function AppAdminTools()
{
    if (!SYSAdmin() and !AppAdmin()) {
        echo '';
    } else {
        echo    '<a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <i class="fa-solid fa-gear"></i>
                    </span>
                    <span class="nav-link-title">
                        AppAdmin Tools
                    </span>
                </a>';
    }
}

function SettingsApplication()
{
    if (!SYSAdmin() and !AppAdmin()) {
        echo    '';
    } else {
        echo    '<a class="dropdown-item" href="' . WebRootPath() . '9000.Settings/9000.Settings.php">
                    Settings Application
                </a>';
    };
}

function EventLog()
{
    if (!SYSAdmin() and !AppAdmin()) {
        echo    '';
    } else {
        echo    '<a class="dropdown-item" href="' . WebRootPath() . '15000.EventLog/15000.EventLog.php">
                    Event Log
                </a>';
    }
}

function ResetPasswordTools()
{
    if (!SYSAdmin() and !AppAdmin()) {
        echo    '';
    } else {
        echo    '<a class="dropdown-item" href="' . WebRootPath() . '14000.DebugTools/14100.DebugToolsResetPassword.php">
                    Reset Password Tools
                </a>';
    }
}

function MetaTag()
{
    if (!SYSAdmin() and !AppAdmin()) {
        echo    '';
    } else {
        echo    '<a class="dropdown-item" href="' . WebRootPath() . '13000.Meta/13000.Meta.php">
                    Meta Tag
                </a>';
    }
}

function SYSAdminTools()
{
    if (!SYSAdmin()) {
        echo '';
    } else {
        echo    '<a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <i class="fa-solid fa-gear"></i>
                    </span>
                    <span class="nav-link-title">
                        SYSAdmin Tools
                    </span>
                </a>';
    }
}

function DebugTools()
{
    if (!SYSAdmin()) {
        echo    '';
    } else {
        echo    '<a class="dropdown-item" href="' . WebRootPath() . '14000.DebugTools/14000.DebugTools.php">
                    Debug Tools
                </a>';
    }
}
