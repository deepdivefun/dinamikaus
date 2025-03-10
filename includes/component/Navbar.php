<div class='bg-black' style="position: relative;">
    <div class='mx-6 hidden lg:block'>
        <div class="flex justify-between">
            <a href="<?= WebRootPath(); ?>index">
                <?php foreach ($SettingsLogo->fetchLogoHeaderorNavbar() as $row) : ?>
                    <img src="<?= WebRootPath(); ?>admin/assets/img/settingslogo/<?= $row['SettingsLogoValue']; ?>" class='w-38 h-20 mr-3' alt="<?= $row['SettingsLogoValue']; ?>">
                <?php endforeach; ?>
            </a>
            <ul class='text-white flex -m-y-6 py-9 space-x-16 text-normal font-normal mr-3 hidden lg:flex'>
                <li><a href="<?= WebRootPath(); ?>index">Home</a></li>
                <li><button onmouseover="mouseOver()" onmouseout="mouseOut()">
                        <a href="javascript:void(0)">Products</a>
                        <div class="dropdown-content" id="dropdown-content">
                            <div class="flex gap-12 justify-center my-6">
                                <?php foreach ($Product->fetchProductNavbar() as $row) : ?>
                                    <div class='grid'>
                                        <a href="<?= WebRootPath(); ?>products/<?= Encryptor('encrypt', $row['ProductCategoryID']); ?>">
                                            <img class='w-32' src="<?= WebRootPath(); ?>admin/assets/img/productcategoryphoto/<?= $row['ProductCategoryPhoto']; ?>" alt="<?= $row['ProductCategoryPhoto']; ?>">
                                            <p class="text-sm mt-5"><?= $row['ProductCategoryName']; ?></p>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </button>
                </li>
                <li><a href="<?= WebRootPath(); ?>about">About</a></li>
                <li><a href="<?= WebRootPath(); ?>contact">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="mx-6 flex block lg:hidden justify-between">
        <button id="menuButton" class='block lg:hidden text-white'>
            <i class="fa-solid fa-bars" id="openIcon"></i>
            <i class="fa-solid fa-x" id="closeIcon" style="display: none;"></i>
        </button>
        <a href="<?= WebRootPath(); ?>index"><img src="<?= WebRootPath(); ?>assets/img/logo/logo.png" class='w-20 h-20 mr-3' alt="logo"></a>
    </div>
</div>