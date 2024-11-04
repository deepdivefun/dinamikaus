<div class='bg-black' style="position: relative;">
    <div class='mx-6 hidden lg:block '>
        <div class="flex justify-between">
            <a href="<?= WebRootPath(); ?>index.php">
                <?php foreach ($SettingsLogo->fetchLogoHeaderorNavbar() as $row) : ?>
                    <img src="<?= WebRootPath(); ?>admin/assets/img/settingslogo/<?= $row['SettingsLogoValue']; ?>" class='w-20 h-20 mr-3' alt="<?= $row['SettingsLogoValue']; ?>">
                <?php endforeach; ?>
            </a>
            <ul class='text-white flex -m-y-6 py-6 space-x-16 text-normal font-normal mr-3 hidden lg:flex'>
                <!-- <li class='cursor-pointer'><span class='hover:underline underline-offset-1' >Mac</span></li> -->
                <li><a href="<?= WebRootPath(); ?>index.php">Home</a></li>
                <li><button onmouseover="mouseOver()" onmouseout="mouseOut()">
                        <a href="javascript:void(0)">Product</a>
                        <div class="dropdown-content" id="dropdown-content">
                            <div class="dropdown-content-div">
                                <?php foreach ($Product->fetchProductNavbar() as $row) : ?>
                                    <div class='grid'>
                                        <a href="<?= WebRootPath(); ?>products.php?page=<?= $row['ProductCategoryID']; ?>">
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
    <div class="mx-6 flex block lg:hidden justify-between">
        <button id="menuButton" class='block lg:hidden text-white'>
            <i class="fa-solid fa-bars" id="openIcon"></i>
            <i class="fa-solid fa-x" id="closeIcon" style="display: none;"></i>
        </button>
        <a href="<?= WebRootPath(); ?>index.php"><img src="<?= WebRootPath(); ?>assets/img/logo/logo.png" class='w-20 h-20 mr-3' alt="logo"></a>
    </div>
</div>