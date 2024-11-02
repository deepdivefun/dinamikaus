<?php
$Title  = "About";
require_once('includes/helpers/WebRootPath.php');
require_once('includes/component/Header.php');
require_once('includes/class/ProductClass.php');
$Product    = new Product();
require_once('includes/component/Navbar.php');
require_once('includes/component/SidebarMenu.php');
?>
<div class='lg:mx-8 mx-6 mt-6'>
    <ul class='flex gap-3'>
        <li>Home /</li>
        <li>About</li>
    </ul>
    <div class='mt-6 mb-12 text-justify'>
        <h2 class='font-bold'>Tentang Dinamika US</h2>
        <div class='w-12/12 mx-6 mt-6'>
            <p class='mt-3'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi quo ratione repellendus asperiores, hic tenetur cumque vero blanditiis maiores accusantium labore sequi, unde sapiente velit possimus delectus, sunt inventore a?</p>
            <p class='mt-3'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consequatur delectus quibusdam et ut nobis consectetur quas, quasi provident! Ad explicabo ipsum eius veritatis fuga ducimus iste dolorum possimus mollitia.</p>

            <div class='mt-3'>
                <span>PT Dinamika US</span>
                <ul>
                    <li>Bekasi</li>
                    <li>Jl Raya Galaxy</li>
                    <li>Tlp 0812</li>
                    <li>Email : dinamika@gmail.com</li>
                </ul>
            </div>

        </div>


        <div class='mt-6 grid lg:grid-cols-6 grid-cols-2 gap-3'>
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
            </div>
            <div class='grid'>
                <img class='w-36 h-36' src="./assets/img/sundar_pichay.jpg" alt="">
                <h3 class='text-center'>Keps</h3>
            </div>
            <div class='grid'>
                <img class='w-36 h-36' src="./assets/img/sundar_pichay.jpg" alt="">
                <h3 class='text-center'>Keps</h3>
            </div>
        </div>
    </div>
</div>

<?php
require_once('includes/component/Footer.php');
require_once('includes/component/GRecaptcha.php');
require_once('includes/component/Script.php');
require_once('includes/component/EndFooter.php');
?>