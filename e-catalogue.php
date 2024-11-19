<?php
$Title          = "E-Catalogue";
require_once('includes/helpers/WebRootPath.php');
require_once('includes/class/MetaClass.php');
$Meta           = new Meta();
require_once('includes/component/Header.php');
require_once('includes/class/ProductClass.php');
$Product        = new Product();
require_once('includes/class/SettingsClass.php');
$SettingsLogo   = new Settings();
require_once('includes/component/Navbar.php');
require_once('includes/class/PaymentLogoClass.php');
$PaymentLogo    = new PaymentLogo();
require_once('includes/class/ShippingLogoClass.php');
$ShippingLogo   = new ShippingLogo();
require_once('includes/component/SidebarMenu.php');
?>

<div class='lg:mx-8 mx-6 mt-6'>
    <ul class='flex gap-3'>
        <li>Home /</li>
        <li>E-Catalogue</li>
    </ul>
    <div class="my-6 grid place-content-center">
        <h1 class="text-center mb-3 text-xl font-semibold">Tittle</h1>
        <object class="pdf"
            data="https://media.geeksforgeeks.org/wp-content/cdn-uploads/20210101201653/PDF.pdf"
            width="800"
            height="500">
        </object>
    </div>

</div>

<?php
require_once('includes/component/Footer.php');
require_once('includes/component/GRecaptcha.php');
require_once('includes/component/Script.php');
require_once('includes/component/EndFooter.php');
?>