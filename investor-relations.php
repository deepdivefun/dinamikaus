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
                <li><a href="javascript:void(0)" class="text-primary transition duration-150 ease-in-out hover:text-primary-accent-300 focus:text-primary-accent-300 active:text-primary-accent-300 motion-reduce:transition-none dark:text-primary-400">Investor Relations</a></li>
            </ol>
        </nav>

        <div class='mt-6 mb-12 text-justify'>
            <div class='w-12/12 mx-6 mt-6'>
                <h2 class='font-bold'>Company Name</h2>
                <p class='mt-3 mb-3'>PT Dinamika Utama Saka</p>

                <h2 class='font-bold mb-3'>Industry Type</h2>
                <p class='mb-3'>Computer and Peripheral Equipment</p>

                <h2 class='font-bold mb-3'>Chairman</h2>
                <p class='mb-3'>Y. N Bastian (a.k.a Mr Bastian)</p>

                <h2 class='font-bold mb-3'>Corporate Headquarters</h2>
                <a href="https://maps.app.goo.gl/YXNq49b3PXMSAaUS9" target="_blank" rel="nofollow">
                    <p class='mb-3'>Jl. Dr. Kusuma Atmaja, S.H No. 83. Menteng. Jakarta Pusat. Indonesia</p>
                </a>

                <h2 class='font-bold mb-3'>Date of Establishment</h2>
                <p class='mb-3'>May 05, 2019</p>
            </div>
        </div>
    </div>
</section>

<section data-aos="fade-up">
    <div class="lg:min-h-[600px] min-h-[300px] custom-bg-investor flex flex-col justify-center items-center text-center">
        <h1 class="text-xl lg:text-3xl mb-4 font-semibold">
            Investor
        </h1>
    </div>
</section>
<?php
require_once('includes/component/GRecaptcha.php');
require_once('includes/component/Footer.php');
require_once('includes/component/Script.php');
require_once('includes/component/EndFooter.php');
?>