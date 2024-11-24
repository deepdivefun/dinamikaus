<?php
$Title          = "Product View";
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
?>

<section>
    <div class='lg:mx-8 mx-6 mt-6 mb-12'>
        <nav class="bg-grey-light w-full rounded-md">
            <ol class="list-reset flex gap-1 text-sm/[20px]">
                <li class="hover:text-yellow-500"><a href="<?= WebRootPath(); ?>index.php" class="text-primary transition duration-150 ease-in-out hover:text-primary-accent-300 focus:text-primary-accent-300 active:text-primary-accent-300 motion-reduce:transition-none dark:text-primary-400">Home</a></li>
                <li><span class="mx-2 text-neutral-400">></span></li>
                <li class="hover:text-yellow-500">
                    <?php foreach ($Product->fetchProductByIDBreadcumb(Encryptor('decrypt', $_GET['page'])) as $row) : ?>
                        <a href="products.php?page=<?= Encryptor('encrypt', $row['ProductCategoryID']); ?>" class="text-primary transition duration-150 ease-in-out hover:text-primary-accent-300 focus:text-primary-accent-300 active:text-primary-accent-300 motion-reduce:transition-none dark:text-primary-400"><?= $row['ProductCategoryName']; ?></a>
                    <?php endforeach; ?>
                </li>
                <li><span class="mx-2 text-neutral-400">></span></li>
                <li>
                    <?php foreach ($Product->fetchProductByIDBreadcumb(Encryptor('decrypt', $_GET['page'])) as $row) : ?>
                        <a href="javascript:void(0)" class="text-primary transition duration-150 ease-in-out hover:text-primary-accent-300 focus:text-primary-accent-300 active:text-primary-accent-300 motion-reduce:transition-none dark:text-primary-400"><?= $row['ProductName']; ?></a>
                    <?php endforeach; ?>
                </li>
            </ol>
        </nav>

        <div class="lg:grid grid-cols-12">
            <?php foreach ($Product->fetchProductByID(Encryptor('decrypt', $_GET['page'])) as $row) : ?>
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