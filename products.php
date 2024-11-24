<?php
$Title          = "Product";
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

<div class='mx-8 mt-6'>
    <nav class="bg-grey-light w-full rounded-md">
        <ol class="list-reset flex gap-1 text-sm/[20px]">
            <li class="hover:text-yellow-500"><a href="<?= WebRootPath(); ?>index.php" class="text-primary transition duration-150 ease-in-out hover:text-primary-accent-300 focus:text-primary-accent-300 active:text-primary-accent-300 motion-reduce:transition-none dark:text-primary-400">Home</a></li>
            <li><span class="mx-2 text-neutral-400">></span></li>
            <li>
                <?php foreach ($Product->fetchProductByCategoryIDBreadcumb(Encryptor('decrypt', $_GET['page'])) as $row) : ?>
                    <a href="javascript:void(0)" class="text-primary transition duration-150 ease-in-out hover:text-primary-accent-300 focus:text-primary-accent-300 active:text-primary-accent-300 motion-reduce:transition-none dark:text-primary-400"><?= $row['ProductCategoryName']; ?></a>
                <?php endforeach; ?>
            </li>
        </ol>
    </nav>

    <div class="grid lg:grid-cols-4 grid-cols-2 gap-6 my-6 justify-items-center">
        <?php foreach ($Product->fetchProductByCategoryID(Encryptor('decrypt', $_GET['page'])) as $row) : ?>
            <div data-aos="fade-up" class="grid gap-3 text-center justify-items-center">
                <a href="<?= WebRootPath(); ?>products-view.php?page=<?= Encryptor('encrypt', $row['ProductID']); ?>" class="block">
                    <img
                        class="w-32 h-32 mx-auto"
                        src="<?= WebRootPath(); ?>admin/assets/img/productphoto/<?= $row['ProductPhoto']; ?>"
                        alt="<?= $row['ProductPhoto']; ?>">
                    <h2 class="mt-2"><?= $row['ProductName']; ?></h2>
                </a>
                <a
                    class="mt-3 px-3 py-1 rounded-lg border-2 border-gray-400 hover:border-yellow-500"
                    href="<?= WebRootPath(); ?>products-view.php?page=<?= Encryptor('encrypt', $row['ProductID']); ?>">
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