<?php
$Title          = "About Us";
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
require_once('includes/class/TeamClass.php');
$Team           = new Team();
require_once('includes/class/PaymentLogoClass.php');
$PaymentLogo    = new PaymentLogo();
require_once('includes/class/ShippingLogoClass.php');
$ShippingLogo   = new ShippingLogo();
require_once('includes/component/SidebarMenu.php');
?>
<section>
    <div class='lg:mx-8 mx-6 mt-6'>
        <nav class="bg-grey-light w-full rounded-md">
            <ol class="list-reset flex gap-1 text-sm/[20px]">
                <li class="hover:text-yellow-500"><a href="<?= WebRootPath(); ?>index" class="text-primary transition duration-150 ease-in-out hover:text-primary-accent-300 focus:text-primary-accent-300 active:text-primary-accent-300 motion-reduce:transition-none dark:text-primary-400">Home</a></li>
                <li><span class="mx-2 text-neutral-400">></span></li>
                <li><a href="javascript:void(0)" class="text-primary transition duration-150 ease-in-out hover:text-primary-accent-300 focus:text-primary-accent-300 active:text-primary-accent-300 motion-reduce:transition-none dark:text-primary-400">About</a></li>
            </ol>
        </nav>

        <div class='mt-6 mb-12 text-justify'>
            <h2 class='font-bold'>About PT. Dinamika Utama Saka</h2>
            <div class='w-12/12 mx-6 mt-6'>
                <?php foreach ($SettingsLogo->fetchAboutUs() as $row) : ?>
                    <p class='mt-3'><?= $row['SettingsValue']; ?></p>
                <?php endforeach; ?>
                <div class='mt-5'>
                    <ul>
                        <?php foreach ($SettingsLogo->fetchHeaderJakarta() as $row) : ?>
                            <li class="font-semibold"><?= $row['SettingsValue']; ?></li>
                        <?php endforeach; ?>
                        <?php foreach ($SettingsLogo->fetchAddressJakarta() as $row) : ?>
                            <li><?= $row['SettingsValue']; ?></li>
                        <?php endforeach; ?>
                        <?php foreach ($SettingsLogo->fetchEmailJakarta() as $row) : ?>
                            <li class="font-medium"><a href="mailto:<?= $row['SettingsValue']; ?>" target="_blank" rel="nofollow"><?= $row['SettingsValue']; ?></a></li>
                        <?php endforeach; ?>
                        <?php foreach ($SettingsLogo->fetchEmailSales() as $row) : ?>
                            <li class="font-medium"><a href="mailto:<?= $row['SettingsValue']; ?>" target="_blank" rel="nofollow"><?= $row['SettingsValue']; ?></a></li>
                        <?php endforeach; ?>
                        <?php foreach ($SettingsLogo->fetchHuntingNumber() as $row) : ?>
                            <li class="font-medium"><a href="tel:<?= $row['SettingsValue']; ?>"><?= $row['SettingsValue']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class='mt-5'>
                    <ul>
                        <?php foreach ($SettingsLogo->fetchHeaderBekasi() as $row) : ?>
                            <li class="font-semibold"><?= $row['SettingsValue']; ?></li>
                        <?php endforeach; ?>
                        <?php foreach ($SettingsLogo->fetchAddressBekasi() as $row) : ?>
                            <li><?= $row['SettingsValue']; ?></li>
                        <?php endforeach; ?>
                        <?php foreach ($SettingsLogo->fetchEmailBekasi() as $row) : ?>
                            <li class="font-medium"><a href="mailto:<?= $row['SettingsValue']; ?>" target="_blank" rel="nofollow"><?= $row['SettingsValue']; ?></a></li>
                        <?php endforeach; ?>
                        <?php foreach ($SettingsLogo->fetchEmailSales() as $row) : ?>
                            <li class="font-medium"><a href="mailto:<?= $row['SettingsValue']; ?>" target="_blank" rel="nofollow"><?= $row['SettingsValue']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class='mt-7 grid lg:grid-cols-6 grid-cols-2 gap-3'>
                <?php foreach ($Team->fetchTeam() as $row) : ?>
                    <div data-aos="flip-right" class='grid justify-center'>
                        <img class='w-36 h-36' src="<?= WebRootPath(); ?>admin/assets/img/teamphoto/<?= $row['TeamPhoto']; ?>" alt="<?= $row['TeamPhoto']; ?>">
                        <h3 class='text-center mt-2 font-semibold'><?= $row['FullName']; ?></h3>
                        <h3 class='text-center mt-1 font-medium'><?= $row['Position']; ?></h3>
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