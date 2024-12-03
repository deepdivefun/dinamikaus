<?php
$Title          = "Contact Us";
require_once('includes/helpers/WebRootPath.php');
require_once('includes/component/HeaderCSP.php');
require_once('includes/class/MetaClass.php');
$Meta           = new Meta();
require_once('includes/component/Header.php');
require_once('includes/class/ProductClass.php');
$Product        = new Product();
require_once('includes/function/EncryptFunction.php');
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
require_once('includes/component/WhatsAppWidget.php');
?>
<section>
    <div class='mx-8 my-6'>
        <nav class="bg-grey-light w-full rounded-md">
            <ol class="list-reset flex gap-1 text-sm/[20px]">
                <li class="hover:text-yellow-500"><a href="<?= WebRootPath(); ?>index" class="text-primary transition duration-150 ease-in-out hover:text-primary-accent-300 focus:text-primary-accent-300 active:text-primary-accent-300 motion-reduce:transition-none dark:text-primary-400">Home</a></li>
                <li><span class="mx-2 text-neutral-400">></span></li>
                <li><a href="javascript:void(0)" class="text-primary transition duration-150 ease-in-out hover:text-primary-accent-300 focus:text-primary-accent-300 active:text-primary-accent-300 motion-reduce:transition-none dark:text-primary-400">Contact</a></li>
            </ol>
        </nav>

        <h3 class='mt-6 mb-3 font-semibold'> Contact Us </h3>

        <div>
            <div class="grid lg:grid-cols-3 grid-cols-1 justify-items-start gap-4">
                <?php foreach ($Contact->fetchContact() as $row) : ?>
                    <div data-aos="fade-up" class='p-6'>
                        <h4 class='font-semibold mb-3'><?= $row['ContactNameArea']; ?></h4>
                        <a href="<?= $row['ContactLinkGmaps']; ?>" target="_blank" rel="nofollow">
                            <p><?= $row['ContactAddress']; ?></p>
                        </a>
                        <a href="mailto:<?= $row['ContactEmail']; ?>" target="_blank" rel="nofollow">
                            <p class="font-semibold"><?= $row['ContactEmail']; ?></p>
                        </a>
                        <a href="mailto:<?= $row['ContactEmailAlternative']; ?>" target="_blank" rel="nofollow">
                            <p class="font-semibold"><?= $row['ContactEmailAlternative']; ?></p>
                        </a>
                        <a href="tel:<?= $row['ContactNumber']; ?>" target="_blank" rel="nofollow">
                            <p class="font-semibold"><?= $row['ContactNumber']; ?></p>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php
require_once('includes/component/GRecaptcha.php');
require_once('includes/component/Footer.php');
require_once('includes/component/Script.php');
require_once('includes/component/EndFooter.php');
?>