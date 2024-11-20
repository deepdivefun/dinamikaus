<?php
$Title          = "Product";
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

<div class='mx-8 mt-6'>
    <ul class='flex gap-3'>
        <li>Home /</li>
        <li>Product</li>
    </ul>
    <div class="grid lg:grid-cols-4 grid-cols-2 gap-6 my-6 justify-items-center">
        <?php foreach ($Product->fetchProductByCategoryID($_GET['page']) as $row) : ?>
            <div data-aos="fade-up" class="grid gap-3 text-center justify-items-center">
                <a href="<?= WebRootPath(); ?>products-view.php?page=<?= $row['ProductID']; ?>" class="block">
                    <img
                        class="w-32 h-32 mx-auto"
                        src="<?= WebRootPath(); ?>admin/assets/img/productphoto/<?= $row['ProductPhoto']; ?>"
                        alt="<?= $row['ProductPhoto']; ?>">
                    <h2 class="mt-2"><?= $row['ProductName']; ?></h2>
                </a>
                <a
                    class="mt-3 px-3 py-1 rounded-lg border-2 border-gray-400 hover:border-yellow-500"
                    href="<?= WebRootPath(); ?>products-view.php?page=<?= $row['ProductID']; ?>">
                    Read more
                </a>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?php
require_once('includes/component/Footer.php');
require_once('includes/component/GRecaptcha.php');
require_once('includes/component/Script.php');
require_once('includes/component/EndFooter.php');
?>