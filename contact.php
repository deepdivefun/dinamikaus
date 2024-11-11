<?php
$Title          = "Contact Us";
require_once('includes/helpers/WebRootPath.php');
require_once('includes/class/MetaClass.php');
$Meta           = new Meta();
require_once('includes/component/Header.php');
require_once('includes/class/ProductClass.php');
$Product        = new Product();
require_once('includes/class/SettingsClass.php');
$SettingsLogo   = new Settings();
require_once('includes/component/Navbar.php');
require_once('includes/class/ContactClass.php');
$Contact        = new Contact();
require_once('includes/class/PaymentLogoClass.php');
$PaymentLogo    = new PaymentLogo();
require_once('includes/class/ShippingLogoClass.php');
$ShippingLogo   = new ShippingLogo();
require_once('includes/component/SidebarMenu.php');
?>

<div class='mx-8 my-6'>
    <ul class='flex gap-3'>
        <li>Home /</li>
        <li>Contact</li>
    </ul>

    <h3 class='mt-6 mb-3 font-semibold'> Contact Us </h3>

    <div>
        <div class="grid lg:grid-cols-3 grid-cols-1 justify-items-start gap-4">
            <?php foreach ($Contact->fetchContact() as $row) : ?>
                <div class='p-6'>
                    <h4 class='font-semibold mb-3'><?= $row['ContactNameArea']; ?></h4>
                    <a href="<?= $row['ContactLinkGmaps']; ?>" target="_blank" rel="nofollow">
                        <p><?= $row['ContactAddress']; ?></p>
                    </a>
                    <a href="mailto:<?= $row['ContactEmail']; ?>" target="_blank" rel="nofollow">
                        <p class="font-semibold"><?= $row['ContactEmail']; ?></p>
                    </a>
                    <a href="tel:<?= $row['ContactNumber']; ?>" target="_blank" rel="nofollow">
                        <p class="font-semibold"><?= $row['ContactNumber']; ?></p>
                    </a>
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