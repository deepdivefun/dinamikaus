<Footer class='bg-slate-100'>
    <div class='grid place-items-center pt-12'>
        <h3>Tentang Kami</h3>
        <a class='button border p-3 mt-3 rounded-md' href="<?= WebRootPath(); ?>about.php">Selengkapnya</a>
    </div>
    <div class='grid lg:grid-cols-4 grid-cols-2 lg:gap-3 gap-1 bg-zinc-800 text-white mt-12 lg:px-6 px-3 py-8'>
        <div class=''>
            <div class='flex gap-3'>
                <i class="fa fa-shield text-3xl" aria-hidden="true"></i>
                <div class=''>
                    <p class='font-semibold'>Garansi Resmi</p>
                    <p>Produk Bergaransi Resmi / Garansi TAM</p>
                </div>
            </div>
        </div>
        <div>
            <div class='flex   gap-3'>
                <i class="fa fa-headphones text-3xl" aria-hidden="true"></i>
                <div class=' gap-6 '>
                    <p class='font-semibold'>Layanan Pelanggan</p>
                    <p>Team kami dapat membantu seputar Produk</p>
                </div>
            </div>
        </div>
        <div>
            <div class='flex gap-3'>
                <i class="fa fa-archive text-3xl" aria-hidden="true"></i>
                <div class=''>
                    <p class='font-semibold'>Jasa Pengiriman</p>
                    <p>Pengiriman Dan Keamanan Terpercaya</p>
                </div>
            </div>
        </div>
        <div>
            <div class='flex gap-3'>
                <i class="fa-solid fa-tag text-3xl"></i>
                <div class=''>
                    <p class='font-semibold'>Keuntungan Belanja</p>
                    <p>Promo Dan Info Terkini Produk</p>
                </div>
            </div>
        </div>
    </div>
    <div class='grid lg:grid-cols-4 grid-cols-1 gap-4 px-6 py-6'>
        <div class=''>
            <div class='grid justify-items-center'>
                <!-- <span>Dinamika</span> -->
                <div class='grid lg:gap-3'>
                    <img src="./assets/img/logo/logo_1.png" alt="">
                    <?php foreach ($SettingsLogo->fetchAboutUs() as $row) : ?>
                        <p class='text-xs mt-3' style="text-align: justify;"><?= $row['SettingsValue']; ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div>
            <div class='flex gap-6'>
                <!-- <span>Icon</span> -->
                <div class=' gap-6 '>
                    <p class='font-semibold text-xl'>Layanan</p>
                    <ul class="grid gap-6 mt-3">
                        <li>layanan 1</li>
                        <li>layanan 2</li>
                        <li>layanan 3</li>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <div class='flex gap-6'>
                <div class=' gap-6 '>
                    <p class='font-semibold text-xl'>Layanan</p>
                    <ul class="grid gap-6 mt-3">
                        <li>layanan 1</li>
                        <li>layanan 2</li>
                        <li>layanan 3</li>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <div class='grid'>
                <!-- <span>Icon</span> -->
                <div class=''>
                    <p class='font-semibold'>Payment Method</p>
                    <div class="grid grid-cols-3">
                        <?php foreach ($PaymentLogo->fetchPaymentLogo() as $row) : ?>
                            <img class="w-12 h-12" src="<?= WebRootPath(); ?>admin/assets/img/paymentlogo/<?= $row['PaymentPhoto']; ?>" class='w-20 h-20 mr-3' alt="<?= $row['PaymentPhoto']; ?>">
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class=''>
                    <p class='font-semibold'>Shipping</p>
                    <div class="grid grid-cols-3">
                        <?php foreach ($ShippingLogo->fetchShippingLogo() as $row) : ?>
                            <img class="w-12 h-12" src="<?= WebRootPath(); ?>admin/assets/img/shippinglogo/<?= $row['ShippingPhoto']; ?>" class='w-20 h-20 mr-3' alt="<?= $row['ShippingPhoto']; ?>">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Footer>