<?php
$Title          = "Home";
require_once('includes/helpers/WebRootPath.php');
require_once('includes/class/MetaClass.php');
$Meta           = new Meta();
require_once('includes/component/Header.php');
require_once('includes/class/ProductClass.php');
$Product        = new Product();
require_once('includes/class/SettingsClass.php');
$SettingsLogo   = new Settings();
require_once('includes/component/Navbar.php');
require_once('includes/component/Hero.php');
require_once('includes/class/OurClientClass.php');
$OurClient      = new OurClient();
require_once('includes/class/TestimonialClass.php');
$Testimonial    = new Testimonial();
require_once('includes/component/SidebarMenu.php');
?>

<section>
    <div class='mt-8 mx-6'>
        <h2 class='font-semibold text-2xl text-center'>Explore Popular Categories</h2>
        <div class='mt-6 relative'>
            <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-gray-100 text-black p-2">
                &#10094;
            </button>
            <div class="overflow-hidden">
                <div id="slider" style="overflow:hidden;" class='slider slider-custom flex space-x-4 overflow-x-auto scroll-smooth'>
                    <?php foreach ($Product->fetchProductCategory() as $row) : ?>
                        <div class='w-32 h-32 flex-shrink-0'>
                            <img class='w-full h-full' src="<?= WebRootPath(); ?>admin/assets/img/productcategoryphoto/<?= $row['ProductCategoryPhoto']; ?>" alt="<?= $row['ProductCategoryPhoto']; ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
                <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-gray-100 text-black p-2">
                    &#10095;
                </button>
            </div>
        </div>
    </div>
</section>

<section class='mt-6'>
    <div class='min-h-[300px] bg-slate-100 grid place-items-center'>
        <h1 class='text-xl lg:text-3xl'>Are You Looking For Professional Advice</h1>
        <a class='button bg-white p-3 rounded-md' href="<?= WebRootPath(); ?>contact.php">Contact Us</a>
    </div>
</section>

<section class='our client mt-6'>
    <div class='mt-8 mx-6'>
        <h2 class='font-semibold text-2xl text-center'>Our Client</h2>
        <div class='grid grid-cols-2 lg:flex mt-6 gap-3'>
            <?php foreach ($OurClient->fetchOurClient() as $row) : ?>
                <div>
                    <img class='w-32 h-32' src="<?= WebRootPath(); ?>admin/assets/img/ourclientphoto/<?= $row['OurClientPhoto']; ?>" alt="<?= $row['OurClientPhoto']; ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class='mt-6 mx-3 lg:mx-6'>
    <div class='min-h-[300px]'>
        <h2 class='font-semibold text-2xl text-center'>Testimonial</h2>
        <div class='grid grid-cols-2 gap-1 lg:gap-6 mt-3'>
            <?php foreach ($Testimonial->fetchTestimonial() as $row) : ?>
                <div class='rounded-md grid gap-3 p-3'>
                    <div class='flex'>
                        <img class='w-16 h-16 rounded-full' src="https://eu.ui-avatars.com/api/?name=<?= $row['FullName'] ?>">
                        <!-- <img class='w-16 h-16 rounded-full' src="<?= WebRootPath(); ?>assets/img/sundar_pichay.jpg" alt=""> -->
                        <h3 class='m-3'><?= $row['FullName']; ?></h3>
                        <h3 class='m-3'><?= $row['Company']; ?></h3>
                    </div>
                    <span>
                        <?php
                        if ($row['TestimonialRating'] == 5) {
                            echo    '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>';
                        } elseif ($row['TestimonialRating'] == 4) {
                            echo    '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>';
                        } elseif ($row['TestimonialRating'] == 3) {
                            echo    '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>';
                        } elseif ($row['TestimonialRating'] == 2) {
                            echo    '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>';
                        } else {
                            echo    '<i class="fa-solid fa-star"></i>';
                        }
                        ?>
                    </span>
                    <span class=''>"<?= $row['TestimonialDescription']; ?>"</span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
require_once('includes/component/Footer.php');
require_once('includes/component/GRecaptcha.php');
require_once('includes/component/Script.php');
require_once('includes/component/EndFooter.php');
?>