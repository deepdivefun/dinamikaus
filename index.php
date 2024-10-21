
<?php 
require_once'includes/helpers/WebRootPath.php';
require_once'includes/component/Header.php';
require_once'includes/component/Navbar.php';
require_once'includes/component/Hero.php';
require_once'includes/component/Category.php';
?>

<section class='mt-6' >
    <div class='min-h-[300px] bg-slate-100 grid place-items-center' >
        <h1 class='text-xl lg:text-3xl'>Are You Looking For Professional Advice</h1>
        <a class='button bg-white p-3 rounded-md' href="">Contact Us</a>
    </div>
</section>

<section class='our client mt-6'>
   <div class='mt-8 mx-6' >
    <h2 class='font-semibold text-2xl text-center' >Our Client</h2>
    <div class='grid grid-cols-2 lg:flex mt-6 gap-3' >
        <div>
            <img class='w-32 h-32' src="./assets/img/ibox_logo.jpg" alt="">  
        </div>
        <div>
            <img class='w-32 h-32' src="./assets/img/ibox_logo.jpg" alt="">  
        </div>
        <div>
            <img class='w-32 h-32' src="./assets/img/ibox_logo.jpg" alt="">  
        </div>
        <div>
            <img class='w-32 h-32' src="./assets/img/ibox_logo.jpg" alt="">  
        </div>
        <div>
            <img class='w-32 h-32' src="./assets/img/ibox_logo.jpg" alt="">  
        </div>
        <div>
            <img class='w-32 h-32' src="./assets/img/ibox_logo.jpg" alt="">  
        </div>
        <div>
            <img class='w-32 h-32' src="./assets/img/ibox_logo.jpg" alt="">  
        </div>
        <div>
            <img class='w-32 h-32' src="./assets/img/ibox_logo.jpg" alt="">  
        </div>
        <div>
            <img class='w-32 h-32' src="./assets/img/ibox_logo.jpg" alt="">  
        </div>
    </div>
</div>
</section>

<section class='mt-6 mx-3 lg:mx-6'>
    <div class='min-h-[300px]' >
        <h2 class='font-semibold text-2xl text-center' >Testimonial</h2>
         <div class='grid grid-cols-2 gap-1 lg:gap-6 mt-3' >
            <div class='rounded-md grid gap-3 p-3' >   
                <span class='' >"Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Accusantium itaque harum temporibus" </span>
                    <div class='flex'>
                         <img class='w-16 h-16 rounded-full' src="./assets/img/sundar_pichay.jpg" alt="">  
                        <h3 class='m-3'>Keps</h3>
                    </div>
            </div>
                  <div class='rounded-md grid gap-3 p-3' >   
                <span class='' >"Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Accusantium itaque harum temporibus" </span>
                     <div class='flex'>
                         <img class='w-16 h-16 rounded-full' src="./assets/img/sundar_pichay.jpg" alt="">  
                        <h3 class='m-3'>Keps</h3>
                    </div>
            </div>
        </div>
    </div>
</section>

<?php   
require_once'includes/component/Footer.php';
require_once'includes/component/Script.php';
require_once'includes/component/EndFooter.php';
?>



