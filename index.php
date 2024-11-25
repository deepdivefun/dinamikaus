<?php
$Title          = "Home";
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
require_once('includes/class/OurClientClass.php');
$OurClient      = new OurClient();
require_once('includes/class/TestimonialClass.php');
$Testimonial    = new Testimonial();
require_once('includes/class/PaymentLogoClass.php');
$PaymentLogo    = new PaymentLogo();
require_once('includes/class/ShippingLogoClass.php');
$ShippingLogo   = new ShippingLogo();
require_once('includes/component/SidebarMenu.php');
?>

<!-- Hero -->
<section>
    <div class='min-h-[406px] mx-6'>
        <div class='grid bg-[#e9e9e9] pb-3 place-items-center min-h-[406px] '>
            <h1 class='text-3xl font-semibold'>Your Premium Store</h1>
            <!-- <h2 class='text-xl'>Coming Soon</h2> -->
            <?php foreach ($SettingsLogo->fetchCarouselPhoto() as $row) : ?>
                <img class='lg:w-1/2 w-64' src="<?= WebRootPath(); ?>admin/assets/img/settingslogo/<?= $row['SettingsLogoValue']; ?>" alt="<?= $row['SettingsLogoValue']; ?>">
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div class="swiper swipper mx-6">
    <div class="swiper-wrapper">
        <?php foreach ($Product->fetchProductECatalogue() as $row) : ?>
            <div class="swiper-slide">
                <div class='lg:columns-2 gap-3 mt-6 bg-[#e9e9e9]'>
                    <div class='grid justify-items-center p-3 rounded-md gap-6'>
                        <a href="<?= WebRootPath(); ?>e-catalogue.php?page=<?= Encryptor('encrypt', $row['ProductCategoryID']); ?>">
                            <img class='pb-3' src="<?= WebRootPath(); ?>admin/assets/img/productcategoryphoto/<?= $row['ProductCategoryPhoto']; ?>" alt="<?= $row['ProductCategoryPhoto']; ?>">
                            <div class="grid lg:pt-20 lg:text-left text-center">
                                <span class='lg:text-xl text-xs font-semibold'>E-Catalogue</span>
                                <span class='lg:text-xl text-xs'><?= $row['ProductCategoryName']; ?></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<section data-aos="fade-up">
    <div class="my-6 mx-6">
        <h2 class="font-semibold text-2xl text-center">Explore Popular Categories</h2>
        <div class="mt-6">
            <div class="grid grid-cols-3 lg:grid-cols-6 gap-6 justify-items-center">
                <?php foreach ($Product->fetchProductCategory() as $row) : ?>
                    <div class="border rounded-lg p-3 text-center shadow-md hover:shadow-lg transition">
                        <a href="<?= WebRootPath(); ?>products.php?page=<?= Encryptor('encrypt', $row['ProductCategoryID']); ?>">
                            <img
                                class="w-1/2 h-ful mx-auto mb-3"
                                src="<?= WebRootPath(); ?>admin/assets/img/productcategoryphoto/<?= $row['ProductCategoryPhoto']; ?>"
                                alt="<?= $row['ProductCategoryPhoto']; ?>">
                            <p class="text-center font-bold text-sm"><?= $row['ProductCategoryName']; ?></p>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


<section class='mt-12 custom-bg'>
    <div class='min-h-[600px] grid place-items-center'>
        <h1 class='text-xl lg:text-3xl'>Are You Looking For Professional Advice</h1>
        <a class='button border-2 px-3 rounded-lg bg-[#e9e9e9] hover:border-yellow-500' href="<?= WebRootPath(); ?>contact.php">Contact Us</a>
    </div>
</section>

<section class='our client mt-6' data-aos="fade-up">
    <div class='mt-8 mx-6'>
        <h2 class='font-semibold text-2xl text-center mb-3'>Our Client</h2>
        <div class="swiper swipper2 mx-6">
            <div class="swiper-wrapper">
                <?php foreach ($OurClient->fetchOurClient() as $row) : ?>
                    <div class="swiper-slide">
                        <div class="border mb-3">
                            <img class='w-32 h-32' src="<?= WebRootPath(); ?>admin/assets/img/ourclientphoto/<?= $row['OurClientPhoto']; ?>" alt="<?= $row['OurClientPhoto']; ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<div id="myModal" class="modal z-30">
    <div class="modal-content grid bg-[#e9e9e9]">
        <button id="closeModal" class="close-btn">&times;</button>
        <h2 class="mb-3">Give Testimonial</h2>
        <form action="<?= WebRootPath(); ?>utilities/6000.Testimonial/6010.TestimonialCreate.php" method="POST" class="grid gap-1" id="descriptionForm">
            <div class="mb-1">
                <label for="FullName" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input
                    type="text"
                    name="FullName"
                    id="FullName"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
            </div>

            <div class="mb-1">
                <label for="Company" class="block text-sm font-medium text-gray-700">Company</label>
                <input
                    type="text"
                    name="Company"
                    id="Company"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="mb-1">
                <label for="TestimonialRating" class="block text-sm font-medium text-gray-700">Testimonial Rating</label>
                <input
                    type="number"
                    name="TestimonialRating"
                    id="TestimonialRating"
                    min="1"
                    max="5"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
            </div>

            <div class="mb-1">
                <label for="TestimonialDescription" class="block text-sm font-medium text-gray-700">Testimonial Description</label>
                <textarea
                    name="TestimonialDescription"
                    id="TestimonialDescription"
                    rows="4"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required></textarea>
            </div>

            <div>
                <input type="hidden" name="GToken" id="GToken" readonly required>
            </div>

            <div>
                <button
                    type="submit"
                    name="createTestimonial"
                    class="w-full inline-flex justify-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Send
                </button>
            </div>
        </form>

    </div>
</div>

<section class='mt-6 mx-3 lg:mx-6' data-aos="fade-up">
    <div class=''>
        <h2 class='font-semibold text-2xl text-center'>Testimonial</h2>
        <button class="border lg:px-3 p-1 bg-gray-200 rounded-md text-black hover:bg-gray-400" id="openModal">Give Testimonial</button>
        <div class='mt-5'>
            <div class="swiper swipper3">
                <div class="swiper-wrapper">
                    <?php foreach ($Testimonial->fetchTestimonial() as $row) : ?>
                        <div class="swiper-slide">
                            <div class='rounded-md grid gap-3 p-3'>
                                <div class='lg:flex'>
                                    <img class='w-16 h-16 rounded-full' src=" https://eu.ui-avatars.com/api/?name=<?= $row['FullName'] ?>">
                                    <!-- <img class='w-16 h-16 rounded-full' src="<?= WebRootPath(); ?>assets/img/sundar_pichay.jpg" alt=""> -->
                                    <div class="grid">
                                        <h3 class='m-3'><?= $row['FullName']; ?></h3>
                                        <h3 class='m-3'><?= $row['Company']; ?></h3>
                                    </div>
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
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once('includes/component/Footer.php');
require_once('includes/component/GRecaptcha.php');
require_once('includes/component/Script.php');
require_once('includes/component/EndFooter.php');
?>