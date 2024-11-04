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
require_once('includes/component/SidebarMenu.php');
?>

<div class='mx-8 mt-6'>
    <ul class='flex gap-3'>
        <li>Home /</li>
        <li>Product</li>
    </ul>
    <div class='grid lg:grid-cols-4 grid-cols-2 gap-6 my-6'>
        <?php foreach ($Product->fetchProductByCategoryID($_GET['page']) as $row) : ?>
            <div class="flex flex-col gap-6 items-center justify-center text-center">
                <a href="<?= WebRootPath(); ?>products-view.php?page=<?= $row['ProductID']; ?>">
                    <img class="w-32 h-32" src="<?= WebRootPath(); ?>admin/assets/img/productphoto/<?= $row['ProductPhoto']; ?>" alt="<?= $row['ProductPhoto']; ?>">
                    <h2><?= $row['ProductName']; ?></h2>
                    <!-- <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</span> -->
                    <a class='p-3 border-2 border-green-400' href="<?= WebRootPath(); ?>products-view.php?page=<?= $row['ProductID']; ?>">Read more</a>
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