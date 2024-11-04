<div class='min-h-[406px] mx-6'>
  <div class='grid bg-slate-100 place-items-center min-h-[406px] '>
    <h1 class='text-3xl font-semibold'>Your Premium Store</h1>
    <h2 class='text-xl'>Coming Soon</h2>
    <?php foreach ($SettingsLogo->fetchCarouselPhoto() as $row) : ?>
      <img class='w-64' src="<?= WebRootPath(); ?>admin/assets/img/settingslogo/<?= $row['SettingsLogoValue']; ?>" alt="<?= $row['SettingsLogoValue']; ?>">
    <?php endforeach; ?>
  </div>
  <div class='columns-2 gap-4 mt-4 hidden lg:block'>
    <?php foreach ($Product->fetchProductECatalogue() as $row) : ?>
      <a href="">
        <div class='flex rounded-md gap-6 p-3 bg-slate-100'>
          <img class='w-52 h-52' src="<?= WebRootPath(); ?>admin/assets/img/productcategoryphoto/<?= $row['ProductCategoryPhoto']; ?>" alt="<?= $row['ProductCategoryPhoto']; ?>">
          <span class='text-xl font-semibold'>E-Catalogue</span>
          <span class='text-xl font-semibold'><?= $row['ProductCategoryName']; ?></span>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</div>