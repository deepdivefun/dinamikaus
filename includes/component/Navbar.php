<div class='bg-black' style="position: relative;">
    <div class='mx-6 flex justify-between'>
        <button class='block lg:hidden text-white'>Button Menu</button>
        <a href="<?= WebRootPath(); ?>index.php"><img src="<?= WebRootPath(); ?>assets/img/logo/logo.png" class='w-20 h-20 mr-3' alt="logo"></a>
        <ul class='text-white flex -m-y-6 py-6 space-x-16 text-normal font-normal mr-3 hidden lg:flex'>
            <!-- <li class='cursor-pointer'><span class='hover:underline underline-offset-1' >Mac</span></li> -->
            <li><a href="<?= WebRootPath(); ?>index.php">Home</a></li>
            <li><button onmouseover="mouseOver()" onmouseout="mouseOut()">
                    <a href="<?= WebRootPath(); ?>products.php">Product</a>
                    <div class="dropdown-content" id="dropdown-content">
                        <div class="dropdown-content-div">
                            <?php foreach ($Product->fetchProductNavbar() as $row) : ?>
                                <div class='grid'>
                                    <a href="<?= WebRootPath(); ?>products.php?id=<?= $row['ProductCategoryID']; ?>">
                                        <img class='w-32 h-32' src="<?= WebRootPath(); ?>admin/assets/img/productcategoryphoto/<?= $row['ProductCategoryPhoto']; ?>" alt="<?= $row['ProductCategoryPhoto']; ?>">
                                        <p class="text-sm mt-5"><?= $row['ProductCategoryName']; ?></p>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </button></li>
            <li><a href="<?= WebRootPath(); ?>about.php">About</a></li>
            <li><a href="<?= WebRootPath(); ?>contact.php">Contact</a></li>
        </ul>
    </div>
</div>