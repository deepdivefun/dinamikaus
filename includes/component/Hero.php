<div class='min-h-[406px] mx-6'>
  <div class='grid bg-slate-100 place-items-center min-h-[406px] '>
    <h1 class='text-3xl font-semibold'>Your Premium Store</h1>
    <h2 class='text-xl'>Coming Soon</h2>
    <?php foreach ($SettingsLogo->fetchCarouselPhoto() as $row) : ?>
      <img class='w-64' src="<?= WebRootPath(); ?>admin/assets/img/settingslogo/<?= $row['SettingsLogoValue']; ?>" alt="<?= $row['SettingsLogoValue']; ?>">
    <?php endforeach; ?>
  </div>
  <div class='columns-2 gap-4 mt-4 hidden lg:block'>
    <div class='flex rounded-md gap-6 p-3 bg-slate-100'>
      <img class='w-52 h-52' src="<?= WebRootPath(); ?>assets/img/image1.jpg" alt="">
      <span class='text-xl font-semibold'>E-Catalog</span>
    </div>
    <div class='flex rounded-md gap-6 p-3 bg-slate-100'>
      <img class='w-52 h-52' src="<?= WebRootPath(); ?>assets/img/image1.jpg" alt="">
      <span class='text-xl font-semibold'>E-Catalog</span>
    </div>
  </div>
</div>