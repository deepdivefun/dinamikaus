<?php
$Title          = "About Us";
require_once('includes/helpers/WebRootPath.php');
require_once('includes/class/MetaClass.php');
$Meta           = new Meta();
require_once('includes/component/Header.php');
require_once('includes/class/ProductClass.php');
$Product        = new Product();
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
<div class='lg:mx-8 mx-6 mt-6'>
    <ul class='flex gap-3'>
        <li>Home /</li>
        <li>About</li>
    </ul>
    <div class='mt-6 mb-12 text-justify'>
        <h2 class='font-bold'>About Dinamika Utama Saka</h2>
        <div class='w-12/12 mx-6 mt-6'>
            <?php foreach ($SettingsLogo->fetchAboutUs() as $row) : ?>
                <p class='mt-3'><?= $row['SettingsValue']; ?></p>
            <?php endforeach; ?>
            <div class='mt-3'>
                <!-- <span>PT Dinamika US</span> -->
                <ul>
                    <?php foreach ($SettingsLogo->fetchAddress() as $row) : ?>
                        <li><?= $row['SettingsValue']; ?></li>
                    <?php endforeach; ?>
                    <?php foreach ($SettingsLogo->fetchHuntingNumber() as $row) : ?>
                        <li><a href="tel:<?= $row['SettingsValue']; ?>"><?= $row['SettingsValue']; ?></a></li>
                    <?php endforeach; ?>
                    <!-- <?php foreach ($SettingsLogo->fetchWhatsappNumber() as $row) : ?>
                        <li><a href="tel:<?= $row['SettingsValue']; ?>"><?= $row['SettingsValue']; ?></a></li>
                    <?php endforeach; ?> -->
                    <?php foreach ($SettingsLogo->fetchEmailSales() as $row) : ?>
                        <li><a href="mailto:<?= $row['SettingsValue']; ?>" target="_blank" rel="nofollow"><?= $row['SettingsValue']; ?></a></li>
                    <?php endforeach; ?>
                    <?php foreach ($SettingsLogo->fetchEmailJakarta() as $row) : ?>
                        <li><a href="mailto:<?= $row['SettingsValue']; ?>" target="_blank" rel="nofollow"><?= $row['SettingsValue']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>


        <div class='mt-6 grid lg:grid-cols-6 grid-cols-2 gap-3'>
            <?php foreach ($Team->fetchTeam() as $row) : ?>
                <div class='grid justify-center'>
                    <img class='w-36 h-36' src="<?= WebRootPath(); ?>admin/assets/img/teamphoto/<?= $row['TeamPhoto']; ?>" alt="<?= $row['TeamPhoto']; ?>">
                    <h3 class='text-center'><?= $row['FullName']; ?></h3>
                </div>
            <?php endforeach; ?>
            <!-- <div class='grid'>
                <img class='w-36 h-36' src="./assets/img/sundar_pichay.jpg" alt="">
                <h3 class='text-center'>Keps</h3>
            </div>
            <div class='grid'>
                <img class='w-36 h-36' src="./assets/img/sundar_pichay.jpg" alt="">
                <h3 class='text-center'>Keps</h3>
            </div>
            <div class='grid'>
                <img class='w-36 h-36' src="./assets/img/sundar_pichay.jpg" alt="">
                <h3 class='text-center'>Keps</h3>
            </div>
            <div class='grid'>
                <img class='w-36 h-36' src="./assets/img/sundar_pichay.jpg" alt="">
                <h3 class='text-center'>Keps</h3>
            </div>
            <div class='grid'>
                <img class='w-36 h-36' src="./assets/img/sundar_pichay.jpg" alt="">
                <h3 class='text-center'>Keps</h3>
            </div> -->
        </div>
    </div>
</div>

<?php
require_once('includes/component/Footer.php');
require_once('includes/component/GRecaptcha.php');
require_once('includes/component/Script.php');
require_once('includes/component/EndFooter.php');
?>