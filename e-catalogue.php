<?php
$Title          = "E-Catalogue";
require_once('includes/helpers/WebRootPath.php');
require_once('includes/class/MetaClass.php');
$Meta           = new Meta();
require_once('includes/component/Header.php');
require_once('includes/class/ProductClass.php');
$Product        = new Product();
require_once('includes/function/EncryptFunction.php');
require_once('includes/class/SettingsClass.php');
$SettingsLogo   = new Settings();
require_once('includes/component/Navbar.php');
require_once('includes/class/PaymentLogoClass.php');
$PaymentLogo    = new PaymentLogo();
require_once('includes/class/ShippingLogoClass.php');
$ShippingLogo   = new ShippingLogo();
require_once('includes/component/SidebarMenu.php');
require_once('includes/component/WhatsAppWidget.php');
?>

<div class='lg:mx-8 mx-6 mt-6'>
    <nav class="bg-grey-light w-full rounded-md">
        <ol class="list-reset flex gap-1 text-sm/[20px]">
            <li class="hover:text-yellow-500"><a href="<?= WebRootPath(); ?>index.php" class="text-primary transition duration-150 ease-in-out hover:text-primary-accent-300 focus:text-primary-accent-300 active:text-primary-accent-300 motion-reduce:transition-none dark:text-primary-400">Home</a></li>
            <li><span class="mx-2 text-neutral-400">></span>
            </li>
            <li>
                <?php foreach ($Product->fetchProductECatalogueByID(Encryptor('decrypt', $_GET['page'])) as $row) : ?>
                    <a href="javascript:void(0)" class="text-primary transition duration-150 ease-in-out hover:text-primary-accent-300 focus:text-primary-accent-300 active:text-primary-accent-300 motion-reduce:transition-none dark:text-primary-400">E-Catalogue <?= $row['ProductCategoryName']; ?></a>
                <?php endforeach; ?>
            </li>
        </ol>
    </nav>

    <div class="my-6 grid place-content-center">
        <?php foreach ($Product->fetchProductECatalogueByID(Encryptor('decrypt', $_GET['page'])) as $row) : ?>
            <h1 class="text-center mb-3 text-xl font-semibold">E-Catalogue <?= $row['ProductCategoryName']; ?></h1>
            <object class="pdf"
                data="<?= WebRootPath(); ?>admin/assets/catalog/<?= $row['ProductCategoryCatalog']; ?>"
                width="800"
                height="500">
            </object>
        <?php endforeach; ?>
    </div>

</div>

<?php
require_once('includes/component/Footer.php');
require_once('includes/component/GRecaptcha.php');
require_once('includes/component/Script.php');
require_once('includes/component/EndFooter.php');
?>