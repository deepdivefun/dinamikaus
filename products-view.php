<?php
$Title          = "Product View";
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

<section>
    <div class='lg:mx-8 mx-6 mt-6 mb-12'>
        <ul class='flex gap-3'>
            <li>Home /</li>
            <li>Product /</li>
            <li>Product View</li>
        </ul>
        <div class="lg:grid grid-cols-12">
            <?php foreach ($Product->fetchProductByID($_GET['page']) as $row) : ?>
                <div class="col-span-8 justify-items-center">
                    <img class="w-96 h-96" src="<?= WebRootPath() ?>admin/assets/img/productphoto/<?= $row['ProductPhoto']; ?>" alt="<?= $row['ProductName']; ?>">
                </div>
                <div class="col-span-4 items-center">
                    <div class="grid gap-3">
                        <h2 class="text-2xl font-semibold"><?= $row['ProductName']; ?></h2>
                        <h3 class="font-semibold">Rp <?= number_format($row['ProductPrice'], 0, ',', '.'); ?></h3>
                        <p style="text-align: justify;"><?= $row['ProductDescription']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>

    <?php
    require_once('includes/component/Footer.php');
    require_once('includes/component/GRecaptcha.php');
    require_once('includes/component/Script.php');
    require_once('includes/component/EndFooter.php');
    ?>