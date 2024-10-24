<?php
$Title  = "Product";
require_once('includes/helpers/WebRootPath.php');
require_once('includes/component/Header.php');
require_once('includes/component/Navbar.php');
?>

<div class='mx-8 mt-6'>
    <ul class='flex gap-3'>
        <li>Home /</li>
        <li>Product</li>
    </ul>
    <div class='grid lg:grid-cols-4 grid-cols-2 gap-6 my-6'>
        <div class="flex flex-col gap-6 items-center justify-center text-center">
            <img class="w-32 h-32" src="<?= WebRootPath(); ?>assets/img/image1.jpg" alt="">
            <h2>PREDATOR X34</h2>
            <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</span>
            <a class='p-3 border-2 border-green-400' href="#">Selengkapnya</a>
        </div>
        <div class="flex flex-col gap-6 items-center justify-center text-center">
            <img class="w-32 h-32" src="<?= WebRootPath(); ?>assets/img/image1.jpg" alt="">
            <h2>PREDATOR X34</h2>
            <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</span>
            <a class='p-3 border-2 border-green-400' href="#">Selengkapnya</a>
        </div>
        <div class="flex flex-col gap-6 items-center justify-center text-center">
            <img class="w-32 h-32" src="<?= WebRootPath(); ?>assets/img/image1.jpg" alt="">
            <h2>PREDATOR X34</h2>
            <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</span>
            <a class='p-3 border-2 border-green-400' href="#">Selengkapnya</a>
        </div>
        <div class="flex flex-col gap-6 items-center justify-center text-center">
            <img class="w-32 h-32" src="<?= WebRootPath(); ?>assets/img/image1.jpg" alt="">
            <h2>PREDATOR X34</h2>
            <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</span>
            <a class='p-3 border-2 border-green-400' href="#">Selengkapnya</a>
        </div>
    </div>
</div>

<?php
require_once('includes/component/Footer.php');
require_once('includes/component/GRecaptcha.php');
require_once('includes/component/Script.php');
require_once('includes/component/EndFooter.php');
?>